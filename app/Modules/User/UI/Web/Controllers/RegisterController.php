<?php

namespace EternalVoid\Modules\User\UI\Web\Controllers;

use EternalVoid\Modules\User\Actions\RegisterAction;
use EternalVoid\Modules\User\UI\Web\Requests\RegisterRequest;

/**
 * Class RegisterController
 *
 * @package EternalVoid\Modules\User\UI\Web\Controllers
 */
class RegisterController
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