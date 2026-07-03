<?php 
namespace App\Services;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Mcp\Request;

class TokenService {

	protected $user;

	public static function getTotalUserTokens(){
			$user = Auth::user();
			if ($user->role == "client") {
							$subscription = $user->subscription("default");
			    $start = Carbon::parse($subscription->current_period_start);
    			$end = Carbon::parse($subscription->current_period_end);

  		return  $user->ailogs()
      ->whereBetween("created_at", [$start, $end])
      ->sum("tokens_used");
			}

	}

public static function totalPlanTokens() {
	return Plan::where("id",auth()->user()->plan_id)->first();

}

}