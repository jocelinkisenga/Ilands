<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Events\WebhookReceived;
use App\Listeners\StripeEventListener;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    if (!App::environment("local")) {
      URL::forceScheme("https");
    }
    Blade::component('layouts.client', 'app-client');
    Event::listen(WebhookReceived::class, StripeEventListener::class);
  }
}
