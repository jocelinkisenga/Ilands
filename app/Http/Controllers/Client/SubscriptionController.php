<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Enums\SubscriptionPlan;
use Carbon\Carbon;
use App\Models\Plan;

class SubscriptionController extends Controller
{
  /**
   * Affiche la page des tarifs.
   */
  public function pricing(): View
  {
    return view("pages.pricing");
  }

  /**
   * Affiche l'interface de paiement Stripe Elements embarquée.
   */
  public function showPaymentPage(Request $request): View
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Génération du SetupIntent indispensable pour l'Iframe Stripe Elements
    $intent = $user->createSetupIntent();

    return view("subscription.subscribe", [
      "intent" => $intent,
    ]);
  }

  /**
   * Traite la création de l'abonnement de manière dynamique et sécurisée.
   */
  public function processSubscription(Request $request): RedirectResponse
  {
    // Validation stricte des intrants
    $request->validate([
      "payment_method" => "required|string",
      "plan" => "required|in:pro,premium",
    ]);

    /** @var \App\Models\User $user */
    $user = $request->user();
    $planChosen = $request->plan;

    
    $stripePriceId = config("services.stripe.prices.{$planChosen}");

    try {
      
      $user
        ->newSubscription("default", $stripePriceId)
        ->create($request->payment_method);

      $user->refresh();

      
      
      $this->syncLocalUserPlan($user, $stripePriceId);

      return redirect()->route("subscription.success");
    } catch (\Exception $e) {
      report($e); // Log l'erreur en interne
      return back()->withErrors([
        "error" => "Subscription failed: " . $e->getMessage(),
      ]);
    }
  }

  /**
   * Page de retour après succès (Mise à jour et sécurité).
   */
  public function success(Request $request): RedirectResponse|View
  {
    /** @var \App\Models\User $user */
    $user = $request->user();
    $subscription = $user->subscription("default");

    if (!$subscription || !$subscription->valid()) {
      return redirect()->route("dashboard");
    }

    // Filet de sécurité si le webhook ou le process d'achat a eu du lag
    $this->syncLocalUserPlan($user, $subscription->stripe_price);

    return view("subscription.success");
  }

  /**
   * Dashboard : Affiche l'état de l'abonnement, l'historique et la consommation.
   */
  public function subscription(Request $request): View
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    $subscription = $user->subscription("default");

    $cycleProgress = 0;
    $daysUsed = 0;
    $totalDays = 30;
    $daysRemaining = 0;
    $nextPaymentDate = null;

    if ($subscription && $subscription->valid()) {
      try {
        $stripeSubscription = $subscription->asStripeSubscription();

        $startTimestamp =
          $stripeSubscription->current_period_start ??
          $subscription->created_at->timestamp;
        $endTimestamp =
          $stripeSubscription->current_period_end ??
          $subscription->updated_at->addMonth()->timestamp;

        $start = Carbon::createFromTimestamp($startTimestamp);
        $end = Carbon::createFromTimestamp($endTimestamp);
      } catch (\Exception $e) {
        report($e);
        $start = $subscription->created_at ?? Carbon::now();
        $end = $subscription->ends_at ?? Carbon::now()->addMonth();
      }

      $totalDays = max(1, $start->diffInDays($end));
      $daysUsed = max(0, $start->diffInDays(Carbon::now()));
      $daysRemaining = max(0, Carbon::now()->diffInDays($end));

      $cycleProgress = min(100, round(($daysUsed / $totalDays) * 100));
      $nextPaymentDate = $end->format("d/m/Y");
    }

    $invoices = [];
    try {
      if ($user->hasStripeId()) {
        $invoices = $user->invoices();
      }
    } catch (\Exception $e) {
      report($e);
    }

    // Métriques de quotas
    $usageMetrics = [
      "label" => "Projets Ilands",
      "used" => $user->projects_count ?? 3,
      "total" => $subscription && $subscription->active() ? 50 : 5,
    ];
    $usageMetrics["percentage"] = min(
      100,
      round(($usageMetrics["used"] / $usageMetrics["total"]) * 100)
    );

    return view(
      "client.subscription.index",
      compact(
        "user",
        "subscription",
        "invoices",
        "cycleProgress",
        "daysUsed",
        "totalDays",
        "daysRemaining",
        "nextPaymentDate",
        "usageMetrics"
      )
    );
  }

  /**
   * Redirige vers le portail de facturation Stripe (Billing Portal).
   */
  public function billingPortal(Request $request): RedirectResponse
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    if (!$user->hasStripeId()) {
      return redirect()
        ->route("subscription.index")
        ->with("error", "Aucun profil de facturation trouvé.");
    }

    return $user->redirectToBillingPortal(route("pricing"));
  }

  /**
   * Centralisation : Met à jour le plan local de l'utilisateur (Pattern DRY)
   */

  private function syncLocalUserPlan($user, ?string $stripePriceId): void
  {
    if (!$stripePriceId) {
      return;
    }

    $subscription = $user->subscription("default");

    if (!$subscription) {
      return;
    }

    // Détermination du plan
    if ($stripePriceId === config("services.stripe.prices.pro")) {
      $plan = Plan::where("slug", "pro")->first();

      $user->update([
        "plan" => SubscriptionPlan::PRO->value,
        "plan_id" => optional($plan)->id,
      ]);
    } elseif ($stripePriceId === config("services.stripe.prices.premium")) {
      $plan = Plan::where("slug", "premium")->first();

      $user->update([
        "plan" => SubscriptionPlan::PREMIUM->value,
        "plan_id" => optional($plan)->id,
      ]);
    } else {
      return;
    }

    try {
      $stripeSubscription = $subscription->asStripeSubscription();

      $item = $stripeSubscription->items->data[0] ?? null;
$subscription->update([
    'current_period_start' => $item ? Carbon::createFromTimestamp($item->current_period_start) : null,
    'current_period_end'   => $item ? Carbon::createFromTimestamp($item->current_period_end)   : null,
    // ...
]);


    } catch (\Throwable $e) {
      report($e);

      // Valeurs de secours
      $subscription->update([
        "plan_id" => optional($plan)->id,
        "current_period_start" => now(),
        "current_period_end" => now()->addMonth(),
      ]);
    }
  }
  /**
   * Force le téléchargement d'une facture spécifique au format PDF.
   */
  public function downloadInvoice(
    Request $request,
    string $invoiceId
  ): \Symfony\Component\HttpFoundation\Response {
    try {
      // Sécurité : findInvoiceOrFail s'assure que la facture appartient bien à l'utilisateur connecté
      return $request->user()->downloadInvoice($invoiceId, [
        "vendor" => config("app.name", "Ilands Corp"),
        "product" => "Abonnement Plateforme",
      ]);
    } catch (\Exception $e) {
      report($e);
      return back()->withErrors([
        "error" => "Impossible de récupérer cette facture.",
      ]);
    }
  }
}
