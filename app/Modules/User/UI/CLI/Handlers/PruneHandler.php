<?php

namespace EternalVoid\User\UI\CLI\Handlers;

use EternalVoid\User\Actions\PruneAction;

/**
 * Class PruneHandler
 * @package EternalVoid\User\UI\CLI\Handlers
 */
class PruneHandler
{
    /**
     * @var PruneAction
     */
    private $pruneAction;

    /**
     * PruneHandler constructor.
     * @param PruneAction $pruneAction
     */
    public function __construct(PruneAction $pruneAction)
    {
        $this->pruneAction = $pruneAction;
    }

    /**
     *
     */
    public function __invoke()
    {
        $this->pruneAction->run();
    }
}