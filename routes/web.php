<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Client\ChatController;
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
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/pricing', [SubscriptionController::class, 'pricing'])->name('pricing');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::livewire('/blog', Blog::class)->name('blog');
Route::get('/contact', Contact::class)->name('contact');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout-success', [SubscriptionController::class, 'success'])->name('checkout-success');

    // Routes requiring Email Verification
    Route::middleware('verified')->group(function () {
        Route::get('/checkout/{plan?}', CheckoutContoller::class)->name('checkout');
        Route::get('/dashboard/', [DashboardController::class, 'index'])->name('dashboard');
        Route::livewire('/tax-screener', TaxScreener::class)->name('tax-screener');
       Route::get('/library', [UserController::class, 'library'])->name('library');
       Route::get('documents', [DocumentController::class, 'index'])->name('documents');

        Route::get('/subscribe', [SubscriptionController::class, 'index'])
            ->middleware('auth')
            ->name('subscribe');

        Route::get('chat', [ChatController::class, 'index'])->name('chat');

        // Routes requiring an Active Subscription
        Route::middleware('subscribed')->group(function () {
             Route::livewire('/tax-profile', TaxProfile::class)->name('tax-profile');
        
            
        });
    });
});

require __DIR__.'/auth.php';