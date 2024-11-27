<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil IP dan user-agent pengunjung
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');

        // Simpan kunjungan ke database
        DB::table('pengunjung')->insert([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'visited_at' => now(),
        ]);

        return $next($request);;
    }
}
