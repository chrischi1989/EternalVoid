<?php

namespace App\Http\Middleware;

use Closure;
use EternalVoid\Building\Models\Building;
use EternalVoid\Research\Models\Research;

class Game
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    private function setGlobalRequirements(Research $research, Building $building)
    {
        // Forschungen
        config(['game.research.pulsantrieb.available' => ($building->forschungszentrum >= 1)]);
        config(['game.research.antimaterieantrieb.available' => ($building->forschungszentrum >= 4)]);
        config(['game.research.projektilwaffen.available' => ($building->forschungszentrum >= 1)]);
        config(['game.research.laserwaffen.available' => ($building->forschungszentrum >= 2)]);
        config(['game.research.plasmawaffen.available' => ($building->forschungszentrum >= 4)]);
        config(['game.research.phasenwaffen.available' => ($building->forschungszentrum >= 8)]);
        config(['game.research.phasenwaffen.available' => ($building->forschungszentrum >= 8)]);
        config(['game.research.strukturelle_integritaet.available' => ($building->forschungszentrum >= 1)]);
        config(['game.research.mikroarchitektur.available' => ($building->forschungszentrum >= 2)]);
        config(['game.research.orbitalkonstruktion.available' => (
            $building->forschungszentrum >= 5 &&
            $research->strukturelle_integritaet >=5 &&
            $research->mikroarchitektur >= 2
        )]);
        config(['game.research.lagererweiterung.available' => ($research->strukturelle_integritaet >= 2)]);
        config(['game.research.schiffskapazitaet.available' => (
            $research->strukturelle_integritaet >= 2 &&
            $research->orbitalkonstruktion >= 4
        )]);
        config(['game.research.rumpfstatik.available' => (
            $building->forschungszentrum >= 10 &&
            $research->schiffskapazitaet >= 10
        )]);
        config(['game.research.werftarchitektur.available' => (
            $building->forschungszentrum >= 10 &&
            $research->strukturelle_integritaet >= 4 &&
            $research->mikroarchitektur >= 5
        )]);
        config(['game.research.schildtechnologie.available' => (
            $building->forschungszentrum >= 3 &&
            $research->strukturelle_integritaet >= 3
        )]);
        config(['game.research.kommunikation.available' => (
            $building->forschungszentrum >=1 &&
            $building->sternenbasis >= 10
        )]);
        config(['game.research.imperiale_verwaltung.available' => ($building->forschungszentrum >= 3)]);
        config(['game.research.spionage.available' => ($building->forschungszentrum >= 1)]);
        config(['game.research.recycling.available' => (
            $building->forschungszentrum >= 3 &&
            $building->lager >= 3 &&
            $research->lagererweiterung >= 2 &&
            $research->mikroarchitektur >= 3
        )]);
        config(['game.research.geologie.available' => (
            $building->forschungszentrum >= 1 &&
            $building->aluminiummine >= 10 &&
            $building->siliziummine >= 10
        )]);
        config(['game.research.speziallegierungen.available' => (
            $building->forschungszentrum >= 4 &&
            $building->titanfertigung >= 10
        )]);
        config(['game.research.materiestabilisierung.available' => (
            $building->forschungszentrum >= 1 &&
            $building->wasserstofffabrik >= 10 &&
            $building->antimateriefabrik >= 10
        )]);
    }
}
