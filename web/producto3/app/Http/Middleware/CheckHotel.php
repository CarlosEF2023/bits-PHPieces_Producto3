<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
class CheckHotel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        log::channel('mylog')->info('Pasando por CheckHotel');
        // Verifica si el usuario está autenticado
        if (!$request->session()->has('user')) {
            return redirect('/');
        }
        // Obtiene el usuario autenticado
        $user = $request->session()->get('user');
        log::channel('mylog')->info('Usuario autenticado: ' . $user->Id_tipo_usuario);
        // Verifica si el usuario es un hotel
        if ($user->Id_tipo_usuario != 5) {
            // El usuario no es un hotel, redirige a la página de inicio
            return redirect('/');
        }        
        return $next($request);
    }
}