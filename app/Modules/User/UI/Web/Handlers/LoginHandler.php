<?php

namespace EternalVoid\User\UI\Web\Handlers;

use EternalVoid\User\Actions\LoginAction;
use EternalVoid\User\UI\Web\Requests\LoginRequest;

class LoginHandler
{
    private $loginAction;

    /**
     * LoginHandler constructor.
     * @param LoginAction $loginAction
     */
    public function __construct(LoginAction $loginAction)
    {
        $this->loginAction = $loginAction;
    }

    /**
     * @param LoginRequest $loginRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(LoginRequest $loginRequest)
    {
        return $this->loginAction->run($loginRequest) ? $loginRequest->success() : $loginRequest->failed();
    }
}
