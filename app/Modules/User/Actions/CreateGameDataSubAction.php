<?php

namespace EternalVoid\Modules\User\Actions;

use EternalVoid\Modules\Building\Tasks\SetStartBuildingsTask;
use EternalVoid\Modules\Defense\Tasks\SetStartDefenseTask;
use EternalVoid\Modules\Planet\Tasks\FindStartPlanetTask;
use EternalVoid\Modules\Planet\Tasks\SetStartPlanetTask;
use EternalVoid\Modules\Production\Tasks\SetStartProductionTask;
use EternalVoid\Modules\Research\Tasks\SetStartResearchTask;
use EternalVoid\Modules\Resources\Tasks\SetStartResourcesTask;
use EternalVoid\Modules\Unit\Tasks\SetStartUnitsTask;
use EternalVoid\Modules\User\UI\Web\Requests\RegisterRequest;

class CreateGameDataSubAction
{
    /**
     * @var FindStartPlanetTask
     */
    private $findStartPlanetTask;

    /**
     * @var SetStartPlanetTask
     */
    private $setStartPlanetTask;
    /**
     * @var SetStartResearchTask
     */
    private $setStartResearchTask;
    /**
     * @var SetStartBuildingsTask
     */
    private $setStartBuildingsTask;
    /**
     * @var SetStartDefenseTask
     */
    private $setStartDefenseTask;
    /**
     * @var SetStartProductionTask
     */
    private $setStartProductionTask;
    /**
     * @var SetStartResourcesTask
     */
    private $setStartResourcesTask;
    /**
     * @var SetStartUnitsTask
     */
    private $setStartUnitsTask;

    /**
     * CreateGameDataSubAction constructor.
     * @param FindStartPlanetTask $findStartPlanetTask
     * @param SetStartPlanetTask $setStartPlanetTask
     * @param SetStartResearchTask $setStartResearchTask
     * @param SetStartBuildingsTask $setStartBuildingsTask
     * @param SetStartDefenseTask $setStartDefenseTask
     * @param SetStartProductionTask $setStartProductionTask
     * @param SetStartResourcesTask $setStartResourcesTask
     * @param SetStartUnitsTask $setStartUnitsTask
     */
    public function __construct(
        FindStartPlanetTask $findStartPlanetTask,
        SetStartPlanetTask $setStartPlanetTask,
        SetStartResearchTask $setStartResearchTask,
        SetStartBuildingsTask $setStartBuildingsTask,
        SetStartDefenseTask $setStartDefenseTask,
        SetStartProductionTask $setStartProductionTask,
        SetStartResourcesTask $setStartResourcesTask,
        SetStartUnitsTask $setStartUnitsTask
    ) {
        $this->findStartPlanetTask    = $findStartPlanetTask;
        $this->setStartPlanetTask     = $setStartPlanetTask;
        $this->setStartResearchTask   = $setStartResearchTask;
        $this->setStartBuildingsTask  = $setStartBuildingsTask;
        $this->setStartDefenseTask    = $setStartDefenseTask;
        $this->setStartProductionTask = $setStartProductionTask;
        $this->setStartResourcesTask  = $setStartResourcesTask;
        $this->setStartUnitsTask      = $setStartUnitsTask;
    }

    public function run(RegisterRequest $request, array $createdUserData)
    {
        $planetProperties = $this->newPlanet($request, $createdUserData['user']['uuid']);
        $planet           = $this->findStartPlanetTask->run();

        return $this->setStartPlanetTask->run($planet, $planetProperties) &&
            $this->setStartResearchTask->run($createdUserData['user']) &&
            $this->setStartBuildingsTask->run($planet) &&
            $this->setStartProductionTask->run($planet) &&
            $this->setStartResourcesTask->run($planet) &&
            $this->setStartDefenseTask->run($planet) &&
            $this->setStartUnitsTask->run($planet);
    }

    /**
     * @param RegisterRequest $request
     * @param $userUuid
     *
     * @return array
     */
    private function newPlanet(RegisterRequest $request, $userUuid)
    {
        return [
            'created_uuid' => $userUuid,
            'updated_uuid' => $userUuid,
            'settled_at'   => now(),
            'settled_uuid' => $userUuid,
            'planetname'   => $request->post('planet'),
        ];
    }
}