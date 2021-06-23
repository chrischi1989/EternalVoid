<?php

namespace EternalVoid\Production\Tasks;

use EternalVoid\Planet\Models\Planet;
use EternalVoid\Production\Models\Production;

/**
 * Class SetStartProductionTask
 *
 * @package EternalVoid\Production\Tasks
 */
class SetStartProductionTask
{
    /**
     * @var Production
     */
    private $production;

    /**
     * SetStartProductionTask constructor.
     *
     * @param Production $production
     */
    public function __construct(Production $production)
    {
        $this->production = $production;
    }

    /**
     * @param Planet $planet
     * @param array $production
     * @return bool
     */
    public function run(Planet $planet, array $production): bool
    {
        $this->production->planet_uuid  = $planet->uuid;
        $this->production->created_uuid = $planet->settled_uuid;
        $this->production->updated_uuid = $planet->settled_uuid;
        $this->production->aluminium    = $production['aluminium'];
        $this->production->titan        = $production['titan'];
        $this->production->silizium     = $production['silizium'];
        $this->production->arsen        = $production['arsen'];
        $this->production->wasserstoff  = $production['wasserstoff'];
        $this->production->antimaterie  = $production['antimaterie'];

        return $this->production->save();
    }
}
