<?php

namespace EternalVoid\Planet\UI\Web\Handlers;

use EternalVoid\Planet\Actions\ShowCurrentPlanetAction;
use Illuminate\Http\Request;

class PlanetHandler
{
    private $showCurrentPlanetAction;

    public function __construct(ShowCurrentPlanetAction $showCurrentPlanetAction)
    {
        $this->showCurrentPlanetAction = $showCurrentPlanetAction;
    }

    public function __invoke(Request $request)
    {
        $this->showCurrentPlanetAction->run($request);

        return view('planet::index', [
            'planet'     => $request->user()->currentPlanet,
            'resources'  => $request->user()->currentPlanet->resources,
            'production' => $request->user()->currentPlanet->production
        ]);
    }
}
