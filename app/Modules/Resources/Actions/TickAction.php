<?php

namespace EternalVoid\Modules\Resources\Actions;

use EternalVoid\Modules\Planet\Models\Planet;
use EternalVoid\Modules\Planet\Tasks\GetSettledPlanetsTask;

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
        $planetsCollection = $this->getSettledPlanetsTask->run(['user.research', 'resources', 'production']);

        /** @var Planet $planet */
        foreach ($planetsCollection as $planet) {
            $research   = $planet->user->research;
            $production = $planet->production;
            $resources  = $planet->resources;

            if ($resources->aluminium + $resources->titan + $resources->silizium <= $resources->lager_cap) {
                $resources->aluminium += $production->aluminium * $this->getMultiplier($planet->bonus, $research->geologie) + $this->game['aluminium'];
                $resources->titan     += $production->titan * $this->getMultiplier($planet->bonus, $research->speziallegierungen) + $this->game['titan'];
                $resources->silizium  += $production->silizium * $this->getMultiplier($planet->bonus, $research->geologie) + $this->game['silizium'];
                $resources->lager_int  = ($resources->aluminium + $resources->titan + $resources->silizium) / $resources->lager_cap;
            }

            if ($resources->arsen + $resources->wasserstoff <= $resources->speziallager_cap) {
                $resources->arsen           += $production->arsen * $this->getMultiplier($planet->bonus, $research->speziallegierungen);
                $resources->wasserstoff     += $production->wasserstoff * $this->getMultiplier($planet->bonus, $research->materiestabilisierung);
                $resources->speziallager_int = ($resources->arsen + $resources->Wasserstoff) / $resources->speziallager_cap;
            }

            if ($resources->antimaterie <= $resources->tanks_cap) {
                $resources->antimaterie += $production->antimaterie * $this->getMultiplier($planet->bonus, $research->materiestabilisierung);
                $resources->tanks_int    = $resources->antimaterie / $resources->tanks_cap;
            }

            $resources->save();
        }
    }

    /**
     * @param int $bonus
     * @param int $researchLevel
     * @return float|int
     */
    private function getMultiplier(int $bonus, int $researchLevel) {
        return 1 + (($bonus + ($researchLevel * 5)) / 100);
    }
}
