<?php 
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class TokenService {
	protected $user;
	public function getTotalUserTokens(){
		$this->user = Auth::user();
	}
}