<?php

namespace EternalVoid\Modules\Planet\Tasks;

use EternalVoid\Modules\Planet\Models\Planet;

/**
 * Class GetSettledPlanetsTask
 * @package EternalVoid\Modules\Planet\Tasks
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
     * @param  array  $with
     * @return Planet[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function run($with = [])
    {
        return $this->planet->with($with)->where('settled_at', '<>', null)->get();
    }
}
