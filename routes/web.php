<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\CheckoutContoller;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Client\SubscriptionController;
use App\Http\Middleware\SubscriptionMiddleWare;
use Illuminate\Support\Facades\Route;
use App\Livewire\TaxProfile;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LegalController;
use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\TaxScreener;
use App\Http\Controllers\Client\DashboardController;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/faq', [FaqController::class, 'index']);
Route::get('pricing', [SubscriptionController::class, 'pricing'])->name('pricing');

Route::get('/subscribe', [SubscriptionController::class, 'index'])->middleware(SubscriptionMiddleWare::class)->name('subscribe');
Route::livewire('/tax-screener', TaxScreener::class)->name('tax-screener');
Route::livewire('/tax-profile',TaxProfile::class)->name('tax-profile');
Route::livewire('/blog',Blog::class)->name('blog');
Route::get('contact', Contact::class)->name('contact');
Route::get('terms', [LegalController::class, 'terms'])->name('terms');
Route::get('privacy', [LegalController::class, 'privacy'])->name('privacy');

Route::get('/dashboard/{plan?}',[DashboardController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/checkout',CheckoutContoller::class)->middleware(['auth', 'verified'])->name('checkout');
Route::get('checkout-success', [SubscriptionController::class, 'success'])->name('checkout-success');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
