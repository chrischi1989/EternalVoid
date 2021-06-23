<?php

namespace EternalVoid\Building\Tasks;

use EternalVoid\Resources\Models\Resource;
use Illuminate\Http\Request;

class SetBuildingBuildableTask
{
    public function __construct()
    {

    }

    public function run(Request $request)
    {
        /** @var Resource $resources */
        $resources = $request->user()->currentPlanet->resources;

        foreach(config('game.buildings') as $building => $values) {
            if($values['available']) {
                $values['buildable'] = true;
                foreach($values['costs'] as $resource => $amount) {
                    if(!is_null($amount) && $amount > $resources[$resource]) {
                        $values['buildable'] = false;
                        break;
                    }
                }
            }


            config(['game.buildings.' . $building => $values]);
        }
    }
}
