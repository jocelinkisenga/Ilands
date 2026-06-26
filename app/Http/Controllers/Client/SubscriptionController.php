<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // <-- FIX: Importation manquante corrigée
use App\Enums\SubscriptionPlan;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
  public function subscribe()
  {
    dd("subscribed");
  }

  public function pricing(): View
  {
    return view("pages.pricing");
  }

  public function success(Request $request)
  {
    $user = $request->user();
    $subscription = $user->subscription("default");

    if (!$subscription) {
      return redirect()->route("dashboard");
    }

    $priceId = $subscription->stripe_price;

    if ($priceId === config("services.stripe.prices.pro")) {
      $user->update([
        "plan" => SubscriptionPlan::PRO->value,
      ]);
    } elseif ($priceId === config("services.stripe.prices.premium")) {
      $user->update([
        "plan" => SubscriptionPlan::PREMIUM->value,
      ]);
    }

    return view("subscription.success");
  }

  /**
   * Affiche l'état de l'abonnement de l'utilisateur, l'historique et la consommation.
   */
  public function subscription(Request $request): View
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Récupération de l'abonnement par défaut (Laravel Cashier)
    $subscription = $user->subscription("default");

    // Initialisation des variables du cycle de facturation
    $cycleProgress = 0;
    $daysUsed = 0;
    $totalDays = 30; // Valeur par défaut
    $daysRemaining = 0;
    $nextPaymentDate = null;

    if ($subscription && $subscription->valid()) {
      try {
        // Appel à l'API Stripe
        $stripeSubscription = $subscription->asStripeSubscription();

        // FIX PRO: Protection contre les valeurs nulles (abonnements incomplets, impayés ou webhooks en retard)
        $startTimestamp =
          $stripeSubscription->current_period_start ??
          $subscription->created_at->timestamp;
        $endTimestamp =
          $stripeSubscription->current_period_end ??
          $subscription->updated_at->addMonth()->timestamp;

        $start = Carbon::createFromTimestamp($startTimestamp);
        $end = Carbon::createFromTimestamp($endTimestamp);
      } catch (\Exception $e) {
        // Secours absolu en cas d'échec de l'API Stripe ou de crash d'infrastructure
        report($e);
        $start = $subscription->created_at ?? Carbon::now();
        $end = $subscription->ends_at ?? Carbon::now()->addMonth();
      }

      // Calculs de progression identiques et sécurisés contre les divisions par zéro
      $totalDays = max(1, $start->diffInDays($end));
      $daysUsed = max(0, $start->diffInDays(Carbon::now()));
      $daysRemaining = max(0, Carbon::now()->diffInDays($end));

      $cycleProgress = min(100, round(($daysUsed / $totalDays) * 100));
      $nextPaymentDate = $end->format("d/m/Y");
    }

    // Récupération paginée des factures Stripe
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

    return view("client.subscription.index", [
      "user" => $user,
      "subscription" => $subscription,
      "invoices" => $invoices,
      "cycleProgress" => $cycleProgress,
      "daysUsed" => $daysUsed,
      "totalDays" => $totalDays,
      "daysRemaining" => $daysRemaining,
      "nextPaymentDate" => $nextPaymentDate,
      "usageMetrics" => $usageMetrics,
    ]);
  }

  /**
   * Redirige de manière sécurisée vers le portail de facturation Stripe (Stripe Billing Portal).
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
}
