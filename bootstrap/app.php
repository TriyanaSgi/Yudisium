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
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([

            'superadmin' => \App\Http\Middleware\superadmin::class,
            'batch' => \App\Http\Middleware\batch::class,
            'mahasiswa' => \App\Http\Middleware\mahasiswa::class,
            'pt' => \App\Http\Middleware\pt::class,
            'prodi' => \App\Http\Middleware\prodi::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        
    })->create();
