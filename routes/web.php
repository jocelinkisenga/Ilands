<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\CheckoutContoller;
use App\Http\Controllers\Client\SubscriptionController;
use App\Http\Controllers\Client\DocumentController;
use App\Http\Controllers\Client\VideoController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Auth\SocialController;

/*
|--------------------------------------------------------------------------
| LIVEWIRE COMPONENTS
|--------------------------------------------------------------------------
*/

use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\AiChatBot;
use App\Livewire\TaxScreener;
use App\Livewire\TaxProfile;

/*
|--------------------------------------------------------------------------
| LIBRARY (CONTENT SYSTEM)
|--------------------------------------------------------------------------
*/
use Laravel\Cashier\Http\Controllers\WebhookController;

use App\Livewire\User\Library\LibraryIndex;
use App\Livewire\User\Library\ContentShow;
use App\Livewire\User\Library\SavedContent;
use App\Livewire\User\Library\ContinueLearning;

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

use App\Livewire\Admin\Users\UsersIndex;
use App\Livewire\Admin\Content\ContentIndex;
use App\Livewire\Admin\Content\ContentCreate;
use App\Livewire\Admin\Content\ContentEdit;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/pricing', [SubscriptionController::class, 'pricing'])->name('pricing');

Route::get('/terms', [LegalController::class, 'terms'])->name('terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');

Route::livewire('/blog', Blog::class)->name('blog');
Route::get('/contact', Contact::class)->name('contact');

/*
|--------------------------------------------------------------------------
| SOCIAL AUTH
|--------------------------------------------------------------------------
*/

Route::get('auth/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);
Route::middleware('auth')->group(function () {

    /*
    |------------------------------
    | PROFILE
    |------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |------------------------------
    | BASIC AUTH FEATURES
    |------------------------------
    */

    Route::get('/chat', AiChatBot::class)->name('chat');
    Route::get('/checkout-success', [SubscriptionController::class, 'success'])->name('checkout-success');

    /*
    |------------------------------
    | LIBRARY (CONTENT SYSTEM)
    |------------------------------
    */

    Route::get('/library', LibraryIndex::class)->name('library.index');
    Route::get('/library/{slug}', ContentShow::class)->name('library.show');
    Route::get('/library/saved', SavedContent::class)->name('library.saved');

    /*
    |------------------------------
    | USER RESOURCES
    |------------------------------
    */

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos');
    Route::get('/hystory', [DocumentController::class, 'hystory'])->name('hystory');

    /*
    |------------------------------
    | VERIFIED USERS ONLY
    |------------------------------
    */

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::livewire('/tax-screener', TaxScreener::class)
            ->name('tax-screener');

        Route::get('/checkout/{plan?}', CheckoutContoller::class)
            ->name('checkout');

        Route::get('/subscribe', [SubscriptionController::class, 'index'])
            ->name('subscribe');

        /*
        |--------------------------
        | SUBSCRIPTION REQUIRED
        |--------------------------
        */

        Route::middleware('subscribed')->group(function () {

            Route::livewire('/tax-profile', TaxProfile::class)
                ->name('tax-profile');
        });
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')->group(function () {
Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/users', UsersIndex::class)
            ->name('users.index');

        Route::get('/content', ContentIndex::class)
            ->name('content.index');

        Route::get('/content/create', ContentCreate::class)
            ->name('content.create');

        Route::get('/content/{content}/edit', ContentEdit::class)
            ->name('content.edit');
    });

/*
|--------------------------------------------------------------------------
| AUTH SYSTEM
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';