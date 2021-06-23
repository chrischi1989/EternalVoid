<?php

namespace EternalVoid\User\Actions;

use EternalVoid\Building\Tasks\SetStartBuildingsTask;
use EternalVoid\Defense\Tasks\SetStartDefenseTask;
use EternalVoid\Planet\Tasks\FindStartPlanetTask;
use EternalVoid\Planet\Tasks\SetStartPlanetTask;
use EternalVoid\Production\Tasks\CalculateProductionTask;
use EternalVoid\Production\Tasks\SetStartProductionTask;
use EternalVoid\Research\Tasks\SetStartResearchTask;
use EternalVoid\Resources\Tasks\SetStartResourcesTask;
use EternalVoid\Unit\Tasks\SetStartUnitsTask;
use EternalVoid\User\UI\Web\Requests\RegisterRequest;

class CreateGameDataSubAction
{
    /**
     * @var CalculateProductionTask
     */
    private $calculateProductionTask;
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
     * @param CalculateProductionTask $calculateProductionTask
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
        CalculateProductionTask $calculateProductionTask,
        FindStartPlanetTask $findStartPlanetTask,
        SetStartPlanetTask $setStartPlanetTask,
        SetStartResearchTask $setStartResearchTask,
        SetStartBuildingsTask $setStartBuildingsTask,
        SetStartDefenseTask $setStartDefenseTask,
        SetStartProductionTask $setStartProductionTask,
        SetStartResourcesTask $setStartResourcesTask,
        SetStartUnitsTask $setStartUnitsTask
    ) {
        $this->calculateProductionTask = $calculateProductionTask;
        $this->findStartPlanetTask    = $findStartPlanetTask;
        $this->setStartPlanetTask     = $setStartPlanetTask;
        $this->setStartResearchTask   = $setStartResearchTask;
        $this->setStartBuildingsTask  = $setStartBuildingsTask;
        $this->setStartDefenseTask    = $setStartDefenseTask;
        $this->setStartProductionTask = $setStartProductionTask;
        $this->setStartResourcesTask  = $setStartResourcesTask;
        $this->setStartUnitsTask      = $setStartUnitsTask;
    }

    /**
     * @param RegisterRequest $request
     * @param array $createdUserData
     * @return bool
     */
    public function run(RegisterRequest $request, array $createdUserData)
    {
        $planetProperties = $this->newPlanet($request, $createdUserData['user']['uuid']);
        $planet           = $this->findStartPlanetTask->run();

        $this->setStartPlanetTask->run($planet, $planetProperties);
        $this->setStartResearchTask->run($createdUserData['user']);
        $this->setStartBuildingsTask->run($planet);
        $this->setStartResourcesTask->run($planet);
        $this->setStartDefenseTask->run($planet);
        $this->setStartUnitsTask->run($planet);

        $planetProduction = $this->calculateProductionTask->run($planet);
        return $this->setStartProductionTask->run($planet, $planetProduction);
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
