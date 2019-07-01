@extends('Page.UI.Web.Views.layouts.master')
@section('pagetitle')Planet @stop
@section('pagecss')
    .navigation {
        display:flex;
        flex-wrap:wrap;
    }

    .navigation li {
        flex:1;
        text-align:center;
        margin-bottom:.8rem;
    }

    .navigation .btn {
        padding:.75rem;
    }
@stop
@section('content')
    <div class="container-fluid bg-inherit">
        <div class="row bg-inherit">
            <header class="col-12 bg-inherit">
                <div class="milky">
                    Aluminium: {{ Helper::nf($resources->aluminium) }}
                    <p class="h1 text-center text-uppercase">Eternal Void</p>
                </div>
            </header>
        </div>
        <div class="row bg-inherit">
            <div class="col">
                <ul class="fa-ul m-0 p-0 navigation">
                    {{-- Planet --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-globe"></span>
                        </a>
                    </li>
                    {{-- Account --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-user"></span>
                        </a>
                    </li>
                    {{-- Allianz --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-users"></span>
                        </a>
                    </li>
                    {{-- Bauen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-wrench"></span>
                        </a>
                    </li>
                    {{-- Forschen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-flask"></span>
                        </a>
                    </li>
                    {{-- Schiffswerft --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-rocket"></span>
                        </a>
                    </li>
                    {{-- Raumhafen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-anchor"></span>
                        </a>
                    </li>
                    {{-- Verteidigung --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-shield-alt"></span>
                        </a>
                    </li>
                    {{-- Handelsboerse --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-chart-bar"></span>
                        </a>
                    </li>
                    {{-- Schiffsboerse --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-dollar-sign"></span>
                        </a>
                    </li>
                    {{-- Flottenkommando --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-sitemap"></span>
                        </a>
                    </li>
                    {{-- Flotten --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-plane"></span>
                        </a>
                    </li>
                    {{-- Galaxie --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-globe-africa"></span>
                        </a>
                    </li>
                    {{-- Ressourcen --}}
                     <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-industry"></span>
                        </a>
                    </li>
                    {{-- Technologie --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-code-branch"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-11 bg-inherit">
                <div class="milky">
                    &nbsp;
                </div>
            </div>
            <div class="col">
                <ul class="fa-ul m-0 p-0 navigation">
                    {{-- Missionen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-flag"></span>
                        </a>
                    </li>
                    {{-- Nachrichten --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-envelope"></span>
                        </a>
                    </li>
                    {{-- Berichte --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-file-alt"></span>
                        </a>
                    </li>
                    {{-- Notizen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-sticky-note"></span>
                        </a>
                    </li>
                    {{-- Toplist --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-list-ol"></span>
                        </a>
                    </li>
                    {{-- Suchen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-search"></span>
                        </a>
                    </li>
                    {{-- Einstellungen --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-cogs"></span>
                        </a>
                    </li>
                    {{-- Simulator --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-gamepad"></span>
                        </a>
                    </li>
                    {{-- Forum --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="far fa-fw fa-2x fa-list-alt"></span>
                        </a>
                    </li>
                    {{-- Abmelden --}}
                    <li>
                        <a href="#" class="btn btn-primary">
                            <span class="fas fa-fw fa-2x fa-sign-out-alt"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop