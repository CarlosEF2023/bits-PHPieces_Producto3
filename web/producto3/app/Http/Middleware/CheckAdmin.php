<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        log::channel('mylog')->info('Pasando por CheckAdmin');
        // Verifica si el usuario está autenticado 
        if (!$request->session()->has('user')) {
            return redirect('/');
        }
        // Obtiene el usuario autenticado
        $user = $request->session()->get('user');
        log::channel('mylog')->info('Usuario autenticado: ' . $user->Id_tipo_usuario);
        // Verifica si el usuario es un administrador
        if ($user->Id_tipo_usuario != 3) {
            // El usuario no es un administrador, redirige a la página de inicio
            return redirect('/');
        }
        return $next($request);
    }
}