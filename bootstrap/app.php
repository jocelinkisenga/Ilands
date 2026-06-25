<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Http\Middleware\App\Http\Middleware\SubscriptionMiddleWare;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
     //   $middleware->append(AdminMiddleware::class);
     $middleware->validateCsrfTokens(except: [
        'stripe/webhook',
    ]);
        $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'subscribed'=>
        \App\Http\Middleware\SubscriptionMiddleWare::class,
        'content.access' => \App\Http\Middleware\ContentAccessMiddleware::class,
        \App\Http\Middleware\SetLocale::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
