<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckViajero
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado 
        if (!$request->session()->has('user')) {
            return redirect('/');
        }
        // Obtiene el usuario autenticado
        $user = $request->session()->get('user');
        // Verifica si el usuario es un viajero
        if ($user->Id_tipo_usuario != 6) {
            // El usuario no es un viajero, redirige a la página de inicio
            return redirect('/');
        }
        return $next($request);
    }
}