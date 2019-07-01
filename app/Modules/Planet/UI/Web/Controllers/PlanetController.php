<?php

namespace EternalVoid\Modules\Planet\UI\Web\Controllers;

use Illuminate\Http\Request;

class PlanetController
{
    public function __construct()
    {

    }

    public function __invoke(Request $request)
    {
        return view('Planet.UI.Web.Views.index', [
            'planet' => $request->user()->currentPlanet
        ]);
    }
}