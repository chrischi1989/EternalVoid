<?php

namespace EternalVoid\Modules\User\Actions;

use EternalVoid\Modules\User\UI\Web\Requests\RegisterRequest;
use Exception;

/**
 * Class RegisterAction
 *
 * @package EternalVoid\Modules\User\Actions
 */
class RegisterAction
{
    private $createUserSubAction;
    private $createGameDataSubAction;

    public function __construct(
        CreateUserSubAction $createUserSubAction,
        CreateGameDataSubAction $createGameDataSubAction
    ) {
        $this->createUserSubAction     = $createUserSubAction;
        $this->createGameDataSubAction = $createGameDataSubAction;
    }

    /**
     * @param RegisterRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function run(RegisterRequest $request): bool
    {
        $createdUserData = $this->createUserSubAction->run($request);
        if (!is_array($createdUserData)) {
            return false;
        }

        return $this->createGameDataSubAction->run($request, $createdUserData);
    }
}