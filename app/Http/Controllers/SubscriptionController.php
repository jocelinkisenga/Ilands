<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class SubscriptionController extends Controller
{
    public function subscribe(){
        dd('subscribed');
    }

    public function pricing() : View
    {
        return view('pages.pricing');
    }
}
