<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $is_admin): mixed
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authis_admin = Auth::user()->is_admin;

        switch ($is_admin) {
            case 'admin':
                if ($authis_admin == 1) {
                    return $next($request);
                }
                break;
            case 'user':
                if ($authis_admin == 0) {
                    return $next($request);
                }
        }
        switch ($authis_admin) {
            case 1:
                return redirect('admin');
            case 2:
                return redirect('user');
        }

        return redirect()->route('login');
    }
}
