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
     */
    public function handle(Request $request, Closure $next)
    {
    // Vous devez utiliser la session pour vérifier si l'utilisateur est connecté.
    // $request->session()->has('user') par exemple

    if (!($request->session()->has('user'))) {
        return redirect('/login');
    }
    return $next($request);
    }
}
