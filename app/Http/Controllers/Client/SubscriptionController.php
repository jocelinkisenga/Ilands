<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Enums\SubscriptionPlan;
class SubscriptionController extends Controller
{
    public function subscribe(){
        dd('subscribed');
    }

    public function pricing() : View
    {
        return view('pages.pricing');
    }

    public function success (Request $request) {

    $user = $request->user();

    $subscription = $user->subscription('default');

    if (!$subscription) {
        return redirect()->route('dashboard');
    }

    $priceId = $subscription->stripe_price;

    if ($priceId === config('services.stripe.prices.pro')) {

        $user->update([
            'plan' => SubscriptionPlan::PRO->value,
        ]);

    } elseif ($priceId === config('services.stripe.prices.premium')) {

        $user->update([
            'plan' => SubscriptionPlan::PREMIUM->value,
        ]);
    }

    
        return view("subscription.success");
    }
    
}
