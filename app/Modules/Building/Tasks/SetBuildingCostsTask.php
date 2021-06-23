<?php

namespace EternalVoid\Building\Tasks;

use Illuminate\Http\Request;

class SetBuildingCostsTask
{
    public function __construct()
    {

    }

    public function run(Request $request)
    {
        $buildings = $request->user()->currentPlanet->buildings;

        foreach(config('game.buildings') as $building => $values) {
            if($values['available']) {
                $values['costs'] = [
                    'aluminium'   => isset($values['aluminium']) ? floor($values['aluminium'] * pow(($buildings[$building] + 1), 1.65)) : null,
                    'titan'       => isset($values['titan']) ? floor($values['titan'] * pow(($buildings[$building] + 1), 1.65)) : null,
                    'silizium'    => isset($values['silizium']) ? floor($values['silizium'] * pow(($buildings[$building] + 1), 1.65)) : null,
                    'arsen'       => isset($values['arsen']) ? floor($values['arsen'] * pow(($buildings[$building] + 1), 1.65)) : null,
                    'wasserstoff' => isset($values['wasserstoff']) ? floor($values['wasserstoff'] * pow(($buildings[$building] + 1), 1.65)) : null,
                    'antimaterie' => isset($values['antimaterie']) ? floor($values['antimaterie'] * pow(($buildings[$building] + 1), 1.65)) : null
                ];
            }

            config(['game.buildings.' . $building => $values]);
        }
    }
}
