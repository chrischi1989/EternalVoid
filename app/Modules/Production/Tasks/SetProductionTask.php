<?php

namespace EternalVoid\Production\Tasks;

use EternalVoid\Production\Models\Production;

class SetProductionTask
{
    private $production;

    public function __construct(Production $production)
    {
        $this->production = $production;
    }

    public function run($production)
    {
        $production->aluminium   = $production['aluminium'];
        $production->titan       = $production['titan'];
        $production->silizium    = $production['silizium'];
        $production->arsen       = $production['arsen'];
        $production->wasserstoff = $production['wasserstoff'];
        $production->antimaterie = $production['antimaterie'];

        return $production->save();
    }
}
