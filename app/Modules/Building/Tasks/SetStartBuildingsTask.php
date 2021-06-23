<?php

namespace EternalVoid\Building\Tasks;

use EternalVoid\Building\Models\Building;
use EternalVoid\Planet\Models\Planet;

/**
 * Class SetStartBuildingsTask
 *
 * @package EternalVoid\Building\Tasks
 */
class SetStartBuildingsTask
{
    /**
     * @var Building
     */
    private $building;

    /**
     * SetStartBuildingsTask constructor.
     *
     * @param Building $building
     */
    public function __construct(Building $building)
    {
        $this->building = $building;
    }

    /**
     * @param Planet $planet
     *
     * @return bool
     */
    public function run(Planet $planet): bool
    {
        $this->building->planet_uuid  = $planet->uuid;
        $this->building->created_uuid = $planet->settled_uuid;
        $this->building->updated_uuid = $planet->settled_uuid;

        return $this->building->save();
    }
}
