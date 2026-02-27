<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\SubscriptionMiddleWare;
use Illuminate\Support\Facades\Route;
use App\Livewire\TaxProfile;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LegalController;
use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\TaxScreener;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/faq', [FaqController::class, 'index']);
Route::get('pricing', [SubscriptionController::class, 'pricing'])->name('pricing');

Route::get('/subscribe', [SubscriptionController::class, 'index'])->middleware(SubscriptionMiddleWare::class)->name('subscribe');
Route::livewire('/tax-screener', TaxScreener::class)->name('taxt-screener');
Route::livewire('/tax-profile',TaxProfile::class)->name('tax-profile');
Route::livewire('/blog',Blog::class)->name('blog');
Route::get('contact', Contact::class)->name('contact');
Route::get('terms', [LegalController::class, 'terms'])->name('terms');
Route::get('privacy', [LegalController::class, 'privacy'])->name('privacy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
