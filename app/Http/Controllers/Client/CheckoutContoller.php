<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $plan = 'prod_U4ncjLG9fyJMma')
    {
        // 
    return $request->user()
        ->newSubscription('default', $plan)
        ->checkout([
            'success_url' => route('checkout-success'),
            'cancel_url' => route('dashboard'),
        ]);
    }
}
