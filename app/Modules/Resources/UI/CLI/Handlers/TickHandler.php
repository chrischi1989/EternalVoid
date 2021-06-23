<?php

namespace EternalVoid\Resources\UI\CLI\Handlers;

use EternalVoid\Resources\Actions\TickAction;

/**
 * Class TickHandler
 * @package EternalVoid\Resources\UI\CLI\Controllers
 */
class TickHandler
{
    /**
     * @var TickAction
     */
    private $tickAction;

    /**
     * TickHandler constructor.
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
