<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilikMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('id_pemilik') || session('role') !== 'Pemilik') {
            return redirect()->route('login')->with('error', 'Silakan login sebagai pemilik terlebih dahulu.');
        }

        return $next($request);
    }
}
