<?php

namespace EternalVoid\Modules\Production\Tasks;

use EternalVoid\Modules\Planet\Models\Planet;
use EternalVoid\Modules\Production\Models\Production;

/**
 * Class SetStartProductionTask
 *
 * @package EternalVoid\Modules\Production\Tasks
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
     *
     * @return bool
     */
    public function run(Planet $planet): bool
    {
        $this->production->planet_uuid  = $planet->uuid;
        $this->production->created_uuid = $planet->settled_uuid;
        $this->production->updated_uuid = $planet->settled_uuid;

        return $this->production->save();
    }
}