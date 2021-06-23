<ul class="nav nav-tabs cardnav">
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'planet' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-globe"></span> <span class="d-none d-xl-inline">Planet</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'bauen' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-wrench"></span> <span class="d-none d-xl-inline">Bauen</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'verteidigung' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-shield-alt"></span> <span class="d-none d-xl-inline">Verteidigung</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'schiffswerft' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-rocket"></span> <span class="d-none d-xl-inline">Schiffswerft</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'raumhafen' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-anchor"></span> <span class="d-none d-xl-inline">Raumhafen</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'flottenkommando' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-sitemap"></span> <span class="d-none d-xl-inline">Flottenkommando</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'handelsboerse' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-chart-bar"></span> <span class="d-none d-xl-inline">Handelsbörse</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link{{ $active == 'schiffsboerse' ? ' active' : '' }}" href="#">
            <span class="fas fa-fw fa-lg fa-dollar-sign"></span> <span class="d-none d-xl-inline">Schiffsbörse</span>
        </a>
    </li>
</ul>
