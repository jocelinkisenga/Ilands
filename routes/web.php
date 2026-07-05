<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Client\CheckoutContoller;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\DocumentController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\SubscriptionController;
use App\Http\Controllers\Client\UpgradePlanController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\VideoController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Admin\Content\ContentCreate;
use App\Livewire\Admin\Content\ContentEdit;
use App\Livewire\Admin\Content\ContentIndex;
use App\Livewire\Admin\Plans\CreatePlan;
use App\Livewire\Admin\Plans\EditPlan;
use App\Livewire\Admin\Plans\Plan;
use App\Livewire\Admin\Tokens\CreateToken;
use App\Livewire\Admin\Tokens\EditToken;
use App\Livewire\Admin\Tokens\Token;
use App\Livewire\Admin\Users\UsersIndex;
use App\Livewire\AiChatBot;
use App\Livewire\Contact;
use App\Livewire\Report\ReportAi;
use App\Livewire\TaxProfile;
use App\Livewire\TaxScreener;
use App\Livewire\User\Library\ContentShow;
use App\Livewire\User\Library\ContinueLearning;
use App\Livewire\User\Library\LibraryIndex;
use App\Livewire\User\Library\SavedContent;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::view("/", "home")->name("home");

Route::get("/about", [AboutController::class, "index"])->name("about");
Route::get("/services", [ServiceController::class, "index"])->name("services");
Route::get("/faq", [FaqController::class, "index"])->name("faq");
Route::get("/terms", [LegalController::class, "terms"])->name("terms");
Route::get("/privacy", [LegalController::class, "privacy"])->name("privacy");
Route::get("/blog", [BlogController::class, "index"])->name("blog");
Route::get("/blog/{slug}", [BlogController::class, "show"])->name("blog.show");
Route::get("/contact", Contact::class)->name("contact");

Route::post("/stripe/webhook", [WebhookController::class, "handleWebhook"]);

/*
|--------------------------------------------------------------------------
| AUTHENTICATION FLOW & SOCIAL AUTH (GUESTS)
|--------------------------------------------------------------------------
*/

Route::get("auth/{provider}", [SocialController::class, "redirect"])->name("social.redirect");
Route::get("auth/{provider}/callback", [SocialController::class, "callback"])->name("social.callback");

require __DIR__ . "/auth.php";

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (USER)
|--------------------------------------------------------------------------
*/

Route::middleware(["auth"])->group(function () {

    // 1. Dashboard & Core Features
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
    Route::get("/chat/{chatId?}", AiChatBot::class)->middleware("checkTokenQuota")->name("chat");
    Route::livewire("/tax-screener", TaxScreener::class)->name("tax-screener");
    Route::livewire("/reports", ReportAi::class)->name("reports");
    
    // 2. Profile Management
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");

    // 3. User Resources
    Route::get("/documents", [DocumentController::class, "index"])->name("documents");
    Route::get("/videos", [VideoController::class, "index"])->name("videos");
    Route::get("/hystory", [DocumentController::class, "hystory"])->name("hystory"); // Note: faute de frappe "history" conservée depuis l'original

    // 4. Library (Content System)
    Route::prefix("library")->group(function () {
        Route::get("/", LibraryIndex::class)->name("library.index");
        Route::get("/saved", SavedContent::class)->name("library.saved");
        Route::get("/{slug}", ContentShow::class)->name("library.show");
    });
    Route::get("report/{reportId}", [ReportController::class, "show"])->name("report.show");

    // 5. Subscription & Billing
    Route::get("/pricing", [SubscriptionController::class, "pricing"])->name("pricing"); // Placé ici pour refléter l'intention (généralement on s'abonne après login)
    Route::get("/checkout/{plan?}", CheckoutContoller::class)->name("checkout");
    Route::get("/checkout-success", [SubscriptionController::class, "success"])->name("checkout-success");
    
    Route::get("/subscription", [SubscriptionController::class, "subscription"])->name("subscription.index");
    Route::get("/subscription/billing", [SubscriptionController::class, "billingPortal"])->name("subscription.billing");
    Route::get("/subscribe", [SubscriptionController::class, "showPaymentPage"])->name("subscription.page");
    Route::post("/subscription/process", [SubscriptionController::class, "processSubscription"])->name("subscription.process");
    Route::get("/subscription/invoice/{invoice}", [SubscriptionController::class, "downloadInvoice"])->name("subscription.invoice");
    
    Route::get("/subscription/upgrade", [UpgradePlanController::class, "index"])->middleware("freePlan")->name("subscription.upgrade");
    Route::post("/subscription/upgrade", [UpgradePlanController::class, "upgrade"]);

    // 6. Subscribed Users Only
    Route::middleware("subscribed")->group(function () {
        Route::livewire("/tax-profile", TaxProfile::class)->name("tax-profile");
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(["auth", "admin"])
    ->prefix("admin")
    ->group(function () {
        
        // Dashboard
        Route::get("/dashboard", [AdminController::class, "index"])->name("admin.dashboard");

        // Users
        Route::get("/users", UsersIndex::class)->name("users.index");

        // Content
        Route::get("/content", ContentIndex::class)->name("content.index");
        Route::get("/content/create", ContentCreate::class)->name("content.create");
        Route::get("/content/{content}/edit", ContentEdit::class)->name("content.edit");
        Route::livewire("/content/edit/{contentId}", ContentEdit::class)->name("content.edit.livewire"); // Différencié pour éviter l'écrasement de nom

        // Plans
        Route::livewire("/plans", Plan::class)->name("admin.plans");
        Route::livewire("/plan", CreatePlan::class)->name("admin.create.plan");
        Route::livewire("/plan/edit/{planId}", EditPlan::class)->name("admin.create.plan.edit");

        // Tokens
        Route::livewire("/tokens", Token::class)->name("admin.tokens");
        Route::livewire("/token", CreateToken::class)->name("admin.create.token");
        Route::livewire("/token/edit/{tokenId}", EditToken::class)->name("admin.create.token.edit");

        // CKEditor Upload
        Route::post("/ckeditor", [BlogController::class, "ckeditor"])->name("ckeditor.upload");
    });