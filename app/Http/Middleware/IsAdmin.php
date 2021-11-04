<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifier si l'utilisateur connecté est administrateur (admin == 0)

        if(auth()->user()->admin == 1){
            // Si oui alors continuer jusqu'a la prochaine requete
            return $next($request);
        }
        else{
            // Sinon renvoyer une requete (403)
            abort(403);
        }
    }
}
