<?php

namespace EternalVoid\Modules\User\Actions;

use EternalVoid\Modules\User\Tasks\FindUserTask;
use EternalVoid\Modules\User\Tasks\LoginUserTask;
use EternalVoid\Modules\User\UI\Web\Requests\LoginRequest;

/**
 * Class LoginAction
 *
 * @package EternalVoid\Modules\User\Actions
 */
class LoginAction
{
    /**
     * @var FindUserTask
     */
    private $findUserTask;
    /**
     * @var LoginUserTask
     */
    private $loginUserTask;

    /**
     * LoginAction constructor.
     *
     * @param FindUserTask $findUserTask
     * @param LoginUserTask $loginUserTask
     */
    public function __construct(FindUserTask $findUserTask, LoginUserTask $loginUserTask)
    {
        $this->findUserTask  = $findUserTask;
        $this->loginUserTask = $loginUserTask;
    }

    /**
     * @param LoginRequest $request
     *
     * @return bool
     */
    public function run(LoginRequest $request): bool
    {
        $credentials = [
            'username' => $request->post('username'),
            'password' => $request->post('password'),
        ];

        return $this->loginUserTask->run($credentials);
    }
}