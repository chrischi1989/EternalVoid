<?php

namespace EternalVoid\Planet\Tasks;

use Illuminate\Http\Request;

class GetCurrentPlanetTask
{
    public function __construct()
    {

    }

    public function run(Request $request)
    {
        $request->user()->load('profile', 'research', 'planets');
        $request->user()->currentPlanet = $request->user()->planets->sortByDesc('updated_at')->first();
        $request->user()->currentPlanet->load('resources', 'production', 'buildings', 'events');
    }
}
