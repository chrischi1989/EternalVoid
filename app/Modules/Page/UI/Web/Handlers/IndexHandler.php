<?php

namespace EternalVoid\Page\UI\Web\Handlers;

use EternalVoid\Race\Tasks\GetAllRaces;

class IndexHandler
{
    private $getAllRacesTask;

    public function __construct(GetAllRaces $getAllRaces)
    {
        $this->getAllRacesTask = $getAllRaces;
    }

    public function __invoke()
    {
        $races = $this->getAllRacesTask->run();

        return view('page::index', [
            'races' => $races,
        ]);
    }
}
