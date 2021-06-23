<?php

namespace EternalVoid\Building\Tasks;

use EternalVoid\Building\Models\Building;
use EternalVoid\Research\Models\Research;
use Illuminate\Http\Request;

class SetBuildingAvailabilityTask
{
    public function __construct()
    {

    }

    public function run(Request $request)
    {
        /** @var Building $buildings */
        $buildings = $request->user()->currentPlanet->buildings;

        /** @var Research $research */
        $research  = $request->user()->research;

        config(['game.buildings.speziallager.available' => ($buildings->wasserstofffabrik >= 1)]);
        config(['game.buildings.tanks.available' => ($buildings->antimateriefabrik >= 1)]);
        config(['game.buildings.flottenkommando.available' => ($buildings->sternenbasis >= 1)]);
        config(['game.buildings.planetarer_schild.available' => (
            $research->schildtechnologie >= 1 &&
            $buildings->sternenbasis >= 10
        )]);
        config(['game.buildings.handelsboerse.available' => ($buildings->flottenkommando >= 1)]);
        config(['game.buildings.schiffsboerse.available' => ($buildings->flottenkommando >= 1)]);
    }
}
