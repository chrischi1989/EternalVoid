<?php

namespace EternalVoid\Modules\Page\UI\Web\Controllers;

use EternalVoid\Controller;
use EternalVoid\Modules\Race\Tasks\GetAllRaces;

class IndexController extends Controller
{
    private $getAllRacesTask;

    public function __construct(GetAllRaces $getAllRaces)
    {
        $this->getAllRacesTask = $getAllRaces;
    }

    public function __invoke()
    {
        $races = $this->getAllRacesTask->run();

        return view('Page.UI.Web.Views.index', [
            'races' => $races,
        ]);
    }
}