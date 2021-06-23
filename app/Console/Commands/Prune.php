<?php

namespace App\Console\Commands;

use EternalVoid\User\UI\CLI\Handlers\PruneHandler;
use Illuminate\Console\Command;

class Prune extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge still disabled users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param PruneHandler $pruneHandler
     * @return int
     */
    public function handle(PruneHandler $pruneHandler): int
    {
        $pruneHandler();

        return 0;
    }
}
