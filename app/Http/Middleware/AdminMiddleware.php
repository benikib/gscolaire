<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Vérifier si l'utilisateur est un administrateur
        $user = auth()->user();

        // Vérifier si l'utilisateur a le type 'administrateur'
        if ($user->type !== 'administrateur') {
            abort(403, 'Accès refusé. Seuls les administrateurs peuvent accéder à cette section.');
        }

        return $next($request);
    }
}
