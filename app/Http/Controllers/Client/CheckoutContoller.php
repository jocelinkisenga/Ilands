<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $plan = "price_1T7jXLIr46jOY2dWdjhaShLd")
    {
    return $request->user()
        ->newSubscription('prod_U4ncjLG9fyJMma', $plan)
        ->checkout([
            'success_url' => route('checkout-success'),
            'cancel_url' => route('dashboard'),
        ]);
    }
}
