<?php

namespace App\Console\Commands;

use EternalVoid\Resources\UI\CLI\Handlers\TickHandler;
use Illuminate\Console\Command;

class Resources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resources:tick';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Game Resource tick';

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
     * @param TickHandler $tickHandler
     * @return int
     */
    public function handle(TickHandler $tickHandler): int
    {
        while (true) {
            $tickHandler();
            sleep(1);
            $this->info('Tick');
        }

        return 0;
    }
}
