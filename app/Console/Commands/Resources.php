<?php

namespace EternalVoid\Console\Commands;

use EternalVoid\Modules\Resources\UI\CLI\Controllers\TickController;
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
     * Execute the console command.
     *
     * @return boolean
     */
    public function handle(TickController $tickController)
    {
        while (true) {
            $tickController();
            sleep(1);
        }

        return true;
    }
}
