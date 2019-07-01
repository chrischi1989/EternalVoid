<?php

namespace EternalVoid\Modules\Unit\Tasks;

use EternalVoid\Modules\Planet\Models\Planet;
use EternalVoid\Modules\Unit\Models\Unit;

/**
 * Class SetStartUnitsTask
 *
 * @package EternalVoid\Modules\Unit\Tasks
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