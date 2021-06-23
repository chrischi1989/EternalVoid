<?php

namespace EternalVoid\Production\Tasks;

use EternalVoid\Planet\Models\Planet;
use EternalVoid\User\Models\User;
use Helper;

class CalculateProductionTask
{
    private $game;
    private $user;
    private $planet;
    private $buildings;

    public function __construct()
    {
        $this->game      = config('game');
        $this->buildings = config('game.buildings');
    }

    public function run(Planet $planet, $nextLevel = false)
    {
        $this->planet = $planet;
        $this->user   = $planet->user;

        return [
            'aluminium'   => $this->calculate('aluminiummine', $nextLevel),
            'titan'       => $this->calculate('titanfertigung', $nextLevel),
            'silizium'    => $this->calculate('siliziummine', $nextLevel),
            'arsen'       => $this->calculate('arsenfertigung', $nextLevel),
            'wasserstoff' => $this->calculate('wasserstofffabrik', $nextLevel),
            'antimaterie' => $this->calculate('antimateriefabrik', $nextLevel)
        ];
    }

    private function calculate($building, $nextLevel = false)
    {

        $production = $this->buildings[$building]['production'][0];
        $exponent   = $this->buildings[$building]['production'][1];
        $level      = $this->planet->buildings[$building] + ($nextLevel ? 1 : 0);
        $data       = [
            'aluminiummine'     => [
                'base'       => $this->game['aluminium'],
                'multiplier' => $this->user->research->geologie
            ],
            'titanfertigung'    => [
                'base'       => $this->game['titan'],
                'multiplier' => $this->user->research->speziallegierungen
            ],
            'siliziummine'      => [
                'base'       => $this->game['silizium'],
                'multiplier' => $this->user->research->geologie
            ],
            'arsenfertigung'    => [
                'multiplier' => $this->user->research->speziallegierungen
            ],
            'wasserstofffabrik' => [
                'multiplier' => $this->user->research->materiestabilisierung
            ],
            'antimateriefabrik' => [
                'multiplier' => $this->user->research->materiestabilisierung
            ]
        ];

        return ((floor($production * pow($level, $exponent)) * Helper::getMultiplier($this->planet->bonus, $data[$building]['multiplier'])) + ($data[$building]['base'] ?? 0)) * $this->game['speed'];
    }
}
