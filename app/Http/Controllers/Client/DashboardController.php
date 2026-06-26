<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\TaxProfileService;
use Illuminate\Http\Request;
use App\Models\AiReport;
use App\Models\Chat;

class DashboardController extends Controller
{
        public function __construct(public TaxProfileService $tax_profile_service)
        {
                
        }
        public function index()
{
    $recentReports = AiReport::whereUser_id(auth()->user()->id)->latest()->take(5)->get();
    

    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('admin.dashboard');
    }

    return view('client.dashboard', [
        'taxProfiles' => $this->tax_profile_service->getAllTaxProfiles()
    , "recentReports" =>$recentReports,]);
}
}
