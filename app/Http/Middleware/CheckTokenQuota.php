<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Plan; // N'oublie pas d'importer le modèle Plan

class CheckTokenQuota
{
  public function handle($request, Closure $next)
  {
    $user = $request->user();

    if (!$user->subscribed("default")) {
      return redirect()
        ->route("pricing")
        ->with("error", "You must have an active subscription.");
    }

    $subscription = $user->subscription("default");

    // Vérification basée STRICTEMENT sur la base de données locale
    // Assure-toi que ces champs sont castés en datetime dans ton modèle Subscription
    if (
      !$subscription->current_period_start ||
      !$subscription->current_period_end
    ) {
      return redirect()
        ->route("subscribe")
        ->with("error", "Subscription period data is missing.");
    }

    $start = Carbon::parse($subscription->current_period_start);
    $end = Carbon::parse($subscription->current_period_end);

    // 🔥 ONLY TOKENS INSIDE CURRENT BILLING CYCLE
    $used = $user
      ->ailogs()
      ->whereBetween("created_at", [$start, $end])
      ->sum("tokens_used");

    // Utilisation du plan_id pour une requête plus performante (Index primaire vs String)
    $plan = Plan::find($user->plan_id);

    if (!$plan) {
      return redirect()
        ->route("pricing")
        ->with("error", "Subscription plan details not found.");
    }

    $quota = $plan->analysis_quota;

    if ($used >= $quota) {
      return redirect()
        ->route("subscribe")
        ->with("error", "Token quota exceeded for this billing cycle.");
    }

    return $next($request);
  }
}
