<?php

namespace EternalVoid\Modules\User\UI\Web\Controllers;

use EternalVoid\Modules\User\Actions\LoginAction;
use EternalVoid\Modules\User\UI\Web\Requests\LoginRequest;

class LoginController
{
    private $loginAction;

    public function __construct(LoginAction $loginAction)
    {
        $this->loginAction = $loginAction;
    }

    public function __invoke(LoginRequest $loginRequest)
    {
        return $this->loginAction->run($loginRequest) ? $loginRequest->success() : $loginRequest->failed();
    }
}