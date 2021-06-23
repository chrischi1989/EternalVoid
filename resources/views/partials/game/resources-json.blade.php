let $data = {
    "resources" : {
        "aluminium" : {{ $resources->aluminium }},
        "titan" : {{ $resources->titan }},
        "silizium" : {{ $resources->silizium }},
        "arsen" : {{ $resources->arsen }},
        "wasserstoff" : {{ $resources->wasserstoff }},
        "antimaterie" : {{ $resources->antimaterie }},
    },
    "production" : {
        "aluminium" : {{ $production->aluminium }},
        "titan" : {{ $production->titan }},
        "silizium" : {{ $production->silizium }},
        "arsen" : {{ $production->arsen }},
        "wasserstoff" : {{ $production->wasserstoff }},
        "antimaterie" : {{ $production->antimaterie }},
    },
    "capacity": {
        "lager" : {{ $resources->lager_cap }},
        "speziallager" : {{ $resources->speziallager_cap }},
        "tanks" : {{ $resources->tanks_cap }}
    },
    "filled": {
        "lager" : {{ $resources->lager_int }},
        "speziallager" : {{ $resources->speziallager_int }},
        "tanks" : {{ $resources->tanks_int }},
    }
}
