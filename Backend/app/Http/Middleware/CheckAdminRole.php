<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado y tiene el rol de admin (id_role igual a 2)
        if (auth()->check() && auth()->user()->id_role == 2) {
            return $next($request);
        }

        // Redirige a donde quieras si el usuario no tiene el rol adecuado.
        return redirect('/');
    }
}
