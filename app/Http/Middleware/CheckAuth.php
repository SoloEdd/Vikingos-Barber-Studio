<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $role  El rol requerido para acceder a esta ruta (ej. 'barbero', 'admin').
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        // 1. VERIFICACIÓN DE SESIÓN (La lógica original)
        if (!session()->has('usuario_id')) {
            // Si no hay sesión, redirige al login.
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        // 2. VERIFICACIÓN DE ROL (Nueva lógica)
        // Solo ejecuta esta verificación si se especificó un rol en la ruta.
        if ($role) {
            $currentRole = session('usuario_rol');
            
            // Si el rol actual del usuario no coincide con el rol requerido
            if ($currentRole !== $role) {
                // Redirige a una página de inicio o muestra un error 403 (Acceso Denegado)
                // Para este proyecto, redirigiremos al sitio principal.
                return redirect()->route('mainsite')->with('error', 'No tienes permiso para acceder a este panel.');
            }
        }

        return $next($request);
    }
}