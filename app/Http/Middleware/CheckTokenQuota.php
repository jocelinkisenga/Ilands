<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Plan; 

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

    if (
      !$subscription->current_period_start ||
      !$subscription->current_period_end
    ) {
      return redirect()
        ->route("pricing")
        ->with("error", "Subscription period data is missing.");
    }

    $start = Carbon::parse($subscription->current_period_start);
    $end = Carbon::parse($subscription->current_period_end);

    
    $used = $user
      ->ailogs()
      ->whereBetween("created_at", [$start, $end])
      ->sum("tokens_used");

    
    $plan = Plan::find($user->plan_id);

    if (!$plan) {
      return redirect()
        ->route("pricing")
        ->with("error", "Subscription plan details not found.");
    }

    $quota = $plan->analysis_quota;

    if ($used >= $quota) {
      return redirect()
        ->route("pricing")
        ->with("error", "Token quota exceeded for this billing cycle.");
    }

    return $next($request);
  }
}
