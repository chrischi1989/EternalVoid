<?php

namespace EternalVoid\Unit\Tasks;

use EternalVoid\Planet\Models\Planet;
use EternalVoid\Unit\Models\Unit;

/**
 * Class SetStartUnitsTask
 *
 * @package EternalVoid\Unit\Tasks
 */
class SetStartUnitsTask
{
    /**
     * @var Unit
     */
    private $unit;

    /**
     * SetStartUnitsTask constructor.
     *
     * @param Unit $unit
     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     * @param Planet $planet
     *
     * @return bool
     */
    public function run(Planet $planet): bool
    {
        $this->unit->planet_uuid  = $planet->uuid;
        $this->unit->created_uuid = $planet->settled_uuid;
        $this->unit->updated_uuid = $planet->settled_uuid;

        return $this->unit->save();
    }
}
