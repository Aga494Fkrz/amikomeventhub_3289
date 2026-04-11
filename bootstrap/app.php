<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
<<<<<<< HEAD
<<<<<<< HEAD
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
=======
=======
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
<<<<<<< HEAD
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
=======
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
        //
    })->create();
