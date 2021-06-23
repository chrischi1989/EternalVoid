<?php

namespace EternalVoid\Resources\Actions;

use EternalVoid\Planet\Models\Planet;
use EternalVoid\Planet\Tasks\GetSettledPlanetsTask;

class TickAction
{
    private $game;
    private $getSettledPlanetsTask;

    public function __construct(GetSettledPlanetsTask $getSettledPlanetsTask)
    {
        $this->game                  = config('game');
        $this->getSettledPlanetsTask = $getSettledPlanetsTask;
    }

    public function run()
    {
        $planetsCollection = $this->getSettledPlanetsTask->run(['resources', 'production']);

        /** @var Planet $planet */
        foreach ($planetsCollection as $planet) {
            $production = $planet->production;
            $resources  = $planet->resources;

            if ($resources->aluminium + $resources->titan + $resources->silizium <= $resources->lager_cap) {
                $resources->aluminium += $production->aluminium;
                $resources->titan     += $production->titan;
                $resources->silizium  += $production->silizium;
                $resources->lager_int  = (($resources->aluminium + $resources->titan + $resources->silizium) / $resources->lager_cap) * 100;
            }

            if ($resources->arsen + $resources->wasserstoff <= $resources->speziallager_cap) {
                $resources->arsen           += $production->arsen;
                $resources->wasserstoff     += $production->wasserstoff;
                $resources->speziallager_int = (($resources->arsen + $resources->Wasserstoff) / $resources->speziallager_cap) * 100;
            }

            if ($resources->antimaterie <= $resources->tanks_cap) {
                $resources->antimaterie += $production->antimaterie;
                $resources->tanks_int    = ($resources->antimaterie / $resources->tanks_cap) * 100;
            }

            $resources->save();
        }
    }
    
}
