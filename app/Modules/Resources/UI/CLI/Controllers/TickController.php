<?php

namespace EternalVoid\Resources\UI\CLI\Controllers;

use EternalVoid\Resources\Actions\TickAction;

/**
 * Class TickController
 * @package EternalVoid\Resources\UI\CLI\Controllers
 */
class TickController
{
    /**
     * @var TickAction
     */
    private $tickAction;

    /**
     * TickController constructor.
     * @param  TickAction  $tickAction
     */
    public function __construct(TickAction $tickAction)
    {
        $this->tickAction = $tickAction;
    }

    /**
     *
     */
    public function __invoke()
    {
        $this->tickAction->run();
    }
}
