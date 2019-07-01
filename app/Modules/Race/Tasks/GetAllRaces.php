<?php

namespace EternalVoid\Modules\Race\Tasks;

use EternalVoid\Modules\Race\Models\Race;
use Illuminate\Support\Collection;

/**
 * Class GetAllRaces
 *
 * @package EternalVoid\Modules\Race\Tasks
 */
class GetAllRaces
{
    private $race;

    /**
     * GetAllRaces constructor.
     *
     * @param Race $race
     */
    public function __construct(Race $race)
    {
        $this->race = $race;
    }

    /**
     * @return Collection
     */
    public function run(): Collection
    {
        return $this->race->all();
    }
}