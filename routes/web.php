<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\SubscriptionMiddleWare;
use Illuminate\Support\Facades\Route;
use App\Livewire\TaxProfile;

Route::get('/', function () {
    return view('home');
});

Route::get('pricing', [SubscriptionController::class, 'pricing'])->name('pricing');

Route::get('/subscribe', [SubscriptionController::class, 'index'])->middleware(SubscriptionMiddleWare::class)->name('subscribe');

Route::livewire('/tax-profile',TaxProfile::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
