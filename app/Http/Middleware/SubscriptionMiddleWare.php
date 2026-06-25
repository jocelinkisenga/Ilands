<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SubscriptionMiddleWare
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (! $user->subscribed('default')) {
        return redirect()->route('pricing');
    }

        return $next($request);
    }
}