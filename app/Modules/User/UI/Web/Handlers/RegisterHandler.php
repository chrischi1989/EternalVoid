<?php

namespace EternalVoid\User\UI\Web\Handlers;

use EternalVoid\User\Actions\RegisterAction;
use EternalVoid\User\UI\Web\Requests\RegisterRequest;

/**
 * Class RegisterController
 *
 * @package EternalVoid\User\UI\Web\Handlers
 */
class RegisterHandler
{
    /**
     * @var RegisterAction
     */
    private $registerAction;

    /**
     * RegisterController constructor.
     *
     * @param RegisterAction $registerAction
     */
    public function __construct(RegisterAction $registerAction)
    {
        $this->registerAction = $registerAction;
    }

    /**
     * @param RegisterRequest $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(RegisterRequest $request)
    {
        return $this->registerAction->run($request) ? $request->success() : $request->failed();
    }
}
