<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleStaff
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!session()->has('id_staff')) {
            return redirect()->route('login.staff');
        }


        if (session('role_staff') !== $role) {

            return redirect()->route('login.staff')
                ->with('error', 'Anda tidak memiliki akses.');

        }


        return $next($request);
    }
}