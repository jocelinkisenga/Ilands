<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\TaxProfileService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function __construct(public TaxProfileService $tax_profile_service)
        {
                
        }
        public function index()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('admin.dashboard');
    }

    return view('profile.dashboard', [
        'taxProfiles' => $this->tax_profile_service->getAllTaxProfiles()
    ]);
}
}
