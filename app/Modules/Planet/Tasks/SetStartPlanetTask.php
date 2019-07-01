<?php

namespace EternalVoid\Modules\Planet\Tasks;

use EternalVoid\Modules\Planet\Models\Planet;

/**
 * Class SetStartPlanetTask
 *
 * @package EternalVoid\Modules\Planet\Tasks
 */
class SetStartPlanetTask
{
    /**
     * @param Planet $planet
     * @param array $properties
     *
     * @return bool
     */
    public function run(Planet $planet, array $properties): bool
    {
        $planet->created_uuid = $properties['created_uuid'];
        $planet->updated_uuid = $properties['updated_uuid'];
        $planet->settled_at   = $properties['settled_at'];
        $planet->settled_uuid = $properties['settled_uuid'];
        $planet->planetname   = $properties['planetname'];

        return $planet->save();
    }
}