<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // Middleware lain...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}