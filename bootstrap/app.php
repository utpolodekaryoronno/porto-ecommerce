<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\IsAuthenticate;
use App\Http\Middleware\AdminLoggedinMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsNotAuthenticateMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'Admin.loggedin' => AdminLoggedinMiddleware::class,
            'isAuthenticateMiddleware' => IsAuthenticate::class,
            'IsNotAuthenticate.All.lUser' => IsNotAuthenticateMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
