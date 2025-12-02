<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si la variable de sesión 'usuario_id' existe
        if (!session()->has('usuario_id')) {
            // Si no existe, redirige al usuario a la página de login
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para reservar.');
        }

        return $next($request);
    }
}