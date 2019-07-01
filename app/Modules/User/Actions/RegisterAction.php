<?php

namespace EternalVoid\Modules\User\Actions;

use EternalVoid\Modules\Building\Tasks\SetStartBuildingsTask;
use EternalVoid\Modules\Defense\Tasks\SetStartDefenseTask;
use EternalVoid\Modules\Planet\Tasks\SetStartPlanetTask;
use EternalVoid\Modules\Planet\Tasks\FindStartPlanetTask;
use EternalVoid\Modules\Production\Tasks\SetStartProductionTask;
use EternalVoid\Modules\Research\Tasks\SetStartResearchTask;
use EternalVoid\Modules\Resources\Tasks\SetStartResourcesTask;
use EternalVoid\Modules\Unit\Tasks\SetStartUnitsTask;
use EternalVoid\Modules\User\Tasks\CreateProfileTask;
use EternalVoid\Modules\User\Tasks\CreateUserTask;
use EternalVoid\Modules\User\Tasks\SendActivationEmailTask;
use EternalVoid\Modules\User\UI\Web\Requests\RegisterRequest;
use Exception;
use Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * Class RegisterAction
 *
 * @package EternalVoid\Modules\User\Actions
 */
class RegisterAction
{
    /**
     * @var FindStartPlanetTask
     */
    private $findStartPlanetTask;
    /**
     * @var CreateUserTask
     */
    private $createUserTask;
    /**
     * @var CreateProfileTask
     */
    private $createProfileTask;
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
     * @var SendActivationEmailTask
     */
    private $sendActivationEmailTask;

    /**
     * RegisterAction constructor.
     *
     * @param FindStartPlanetTask $findStartPlanetTask
     * @param CreateUserTask $createUserTask
     * @param CreateProfileTask $createProfileTask
     * @param SetStartPlanetTask $setStartPlanetTask
     * @param SetStartResearchTask $setStartResearchTask
     * @param SetStartBuildingsTask $setStartBuildingsTask
     * @param SetStartDefenseTask $setStartDefenseTask
     * @param SetStartProductionTask $setStartProductionTask
     * @param SetStartResourcesTask $setStartResourcesTask
     * @param SetStartUnitsTask $setStartUnitsTask
     * @param SendActivationEmailTask $sendActivationEmailTask
     */
    public function __construct(
        FindStartPlanetTask $findStartPlanetTask,
        CreateUserTask $createUserTask,
        CreateProfileTask $createProfileTask,
        SetStartPlanetTask $setStartPlanetTask,
        SetStartResearchTask $setStartResearchTask,
        SetStartBuildingsTask $setStartBuildingsTask,
        SetStartDefenseTask $setStartDefenseTask,
        SetStartProductionTask $setStartProductionTask,
        SetStartResourcesTask $setStartResourcesTask,
        SetStartUnitsTask $setStartUnitsTask,
        SendActivationEmailTask $sendActivationEmailTask
    ) {
        $this->findStartPlanetTask     = $findStartPlanetTask;
        $this->createUserTask          = $createUserTask;
        $this->createProfileTask       = $createProfileTask;
        $this->setStartPlanetTask      = $setStartPlanetTask;
        $this->setStartResearchTask    = $setStartResearchTask;
        $this->setStartBuildingsTask   = $setStartBuildingsTask;
        $this->setStartDefenseTask     = $setStartDefenseTask;
        $this->setStartProductionTask  = $setStartProductionTask;
        $this->setStartResourcesTask   = $setStartResourcesTask;
        $this->setStartUnitsTask       = $setStartUnitsTask;
        $this->sendActivationEmailTask = $sendActivationEmailTask;
    }

    /**
     * @param RegisterRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function run(RegisterRequest $request): bool
    {
        $userUuid         = Uuid::uuid4();
        $userPassword     = Str::random();

        $user             = $this->newUser($request, $userUuid, $userPassword);
        $profile          = $this->newProfile($request, $userUuid);
        $planetProperties = $this->newPlanet($request, $userUuid);
        $planet           = $this->findStartPlanetTask->run();

        if(!$this->createUserTask->run($user)) return false;
        if(!$this->createProfileTask->run($profile)) return false;
        if(!$this->setStartPlanetTask->run($planet, $planetProperties)) return false;
        if(!$this->setStartResearchTask->run($user)) return false;
        if(!$this->setStartBuildingsTask->run($planet)) return false;
        if(!$this->setStartProductionTask->run($planet)) return false;
        if(!$this->setStartResourcesTask->run($planet)) return false;
        if(!$this->setStartDefenseTask->run($planet)) return false;
        if(!$this->setStartUnitsTask->run($planet)) return false;
        if(!$this->sendActivationEmailTask->run($user, $profile, $userPassword)) return false;

        return true;
    }

    /**
     * @param RegisterRequest $request
     * @param $userUuid
     * @param $userPassword
     *
     * @return array
     */
    private function newUser(RegisterRequest $request, $userUuid, $userPassword): array
    {
        return [
            'uuid'             => $userUuid,
            'created_uuid'     => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'updated_uuid'     => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'disabled_at'      => now(),
            'disabled_uuid'    => $request->has('disabled') ? $request->user()->uuid : $userUuid,
            'username'         => $request->post('username'),
            'password'         => Hash::make($userPassword),
            'activation_token' => Str::random(20),
            'regip'            => $request->ip(),
            'lastip'           => $request->ip(),
        ];
    }

    /**
     * @param RegisterRequest $request
     * @param $userUuid
     *
     * @return array
     * @throws Exception
     */
    private function newProfile(RegisterRequest $request, $userUuid): array
    {
        return [
            'uuid'            => Uuid::uuid4(),
            'created_uuid'    => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'updated_uuid'    => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'race_uuid'       => $request->post('race'),
            'email_hashed'    => hash('sha512', $request->post('email')),
            'email_encrypted' => encrypt($request->post('email')),
        ];
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