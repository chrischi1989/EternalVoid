<?php

namespace EternalVoid\Planet\Tasks;

use EternalVoid\Planet\Models\Planet;

/**
 * Class GetSettledPlanetsTask
 * @package EternalVoid\Planet\Tasks
 */
class GetSettledPlanetsTask
{
    /**
     * @var Planet
     */
    private $planet;

    /**
     * GetSettledPlanetsTask constructor.
     * @param  Planet  $planet
     */
    public function __construct(Planet $planet)
    {
        $this->planet = $planet;
    }

    /**
     * @param  string[]  $with
     * @return Planet[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function run($with = [])
    {
        return $this->planet->with($with)->where('settled_at', '<>', null)->get();
    }
}
