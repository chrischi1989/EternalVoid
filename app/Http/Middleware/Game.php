<?php

namespace EternalVoid\Http\Middleware;

use Closure;

class Game
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $user->load('profile', 'research', 'planets');

        $user->currentPlanet = $user->planets->sortByDesc('updated_at')->first();
        $user->currentPlanet->load('resources', 'production');

        view()->share([
            'planet'     => $user->currentPlanet,
            'resources'  => $user->currentPlanet->resources,
            'production' => $user->currentPlanet->production
        ]);

        return $next($request);
    }
}