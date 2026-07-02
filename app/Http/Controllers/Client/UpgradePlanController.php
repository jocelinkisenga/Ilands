<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubscriptionService;

class UpgradePlanController extends Controller
{
  public function index(Request $request)
  {
    $user = $request->user();

    return view("client.subscription.upgrade", [
      "user" => $user,
      "currentPlan" => $user->plan,
    ]);
  }

  public function upgrade(Request $request, SubscriptionService $service)
  {
    $request->validate([
      "plan" => "required|in:pro,premium",
      "payment_method" => "required|string",
    ]);

    $user = $request->user();

    $priceId = $service->getStripePriceId($request->plan);

    // si déjà abonné → swap plan
    if ($user->subscribed("default")) {
      $user->subscription("default")->swap($priceId);
    } else {
      $user
        ->newSubscription("default", $priceId)
        ->create($request->payment_method);
    }

    $service->syncPlan($user, $priceId);

    return redirect()
      ->route("subscription.upgrade")
      ->with("success", "Plan upgraded successfully!");
  }
}
