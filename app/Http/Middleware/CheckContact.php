<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckContact
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request -> titre == "" || $request -> texte == "" || $request -> email == ""){
            return redirect()->back()->with('error', "Erreur : Votre demande de contact n'a pas pu être traitée.");        
        }
        else{
            return redirect()->back()->with('success', "Votre demande de contact a bien été traitée.");
        }
        return $next($request);
    }
}
