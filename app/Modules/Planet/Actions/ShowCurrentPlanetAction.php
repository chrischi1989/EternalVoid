<?php

namespace EternalVoid\Planet\Actions;

use EternalVoid\Building\Tasks\SetBuildingAvailabilityTask;
use EternalVoid\Building\Tasks\SetBuildingBuildableTask;
use EternalVoid\Building\Tasks\SetBuildingCostsTask;
use EternalVoid\Planet\Tasks\GetCurrentPlanetTask;
use Illuminate\Http\Request;

class ShowCurrentPlanetAction
{
    private $getCurrentPlanetTask;
    private $setBuildingCostsTask;
    private $setBuildingBuildableTask;
    private $setBuildingAvailabilityTask;

    public function __construct(
        GetCurrentPlanetTask $getCurrentPlanetTask,
        SetBuildingAvailabilityTask $setBuildingAvailabilityTask,
        SetBuildingCostsTask $setBuildingCostsTask,
        SetBuildingBuildableTask $setBuildingBuildableTask
    ) {
        $this->getCurrentPlanetTask        = $getCurrentPlanetTask;
        $this->setBuildingAvailabilityTask = $setBuildingAvailabilityTask;
        $this->setBuildingCostsTask        = $setBuildingCostsTask;
        $this->setBuildingBuildableTask    = $setBuildingBuildableTask;
    }

    public function run(Request $request)
    {
        $this->getCurrentPlanetTask->run($request);
        $this->setBuildingAvailabilityTask->run($request);
        $this->setBuildingCostsTask->run($request);
        $this->setBuildingBuildableTask->run($request);
    }
}
