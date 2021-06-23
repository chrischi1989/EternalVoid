@extends('page::layouts.game')
@section('pagetitle')Planet @stop
@section('content')
<div class="wrapper bg-inherit">
    @include('partials.game.topbar')
    <div class="container-fluid pt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-lg-3">
                <div class="p-3 milky bordered rounded h-100">
                    <img src="/img/game/planets/{{ config('game.planets.' . $planet->image) }}" class="planetimage" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="p-3 milky bordered rounded h-100">
                    <h4>Baureihe</h4>
                    <p>Es wird derzeit nicht gebaut.</p>
                </div>
            </div>
            <div class="col-12 col-lg-3 p-3 milky bordered rounded h-100">
                <h4 class="mb-3">Gebäude</h4>
                <div class="row no-gutters">
                    @foreach(config('game.buildings') as $building => $values)
                        @if($values['available'])
                        <div class="col-6 col-lg-2 mx-1 my-1 text-center building">
                            @if($values['buildable'])
                            <a href="{{ route('building-up', [$building]) }}" data-toggle="tooltip" data-placement="left" data-html="true" title="@include('building::partials.tooltip', ['building' => $values])">
                                <span class="fas fa-fw fa-xs fa-level-up-alt"></span>
                            </a>
                            @else
                            <span><span class="fas fa-fw fa-xs fa-arrow-up"></span></span>
                            @endif
                            <img src="{{ $values['image'] }}" class="bordered rounded">
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="p-3 milky bordered rounded h-100">
                    <h4 class="mb-3">Outliner</h4>
                    <h5>Planeten</h5>
                    <nav class="my-3">
                    @foreach(auth()->user()->planets as $planet)
                        <div>
                            <img src="/img/game/planets/small/{{ config('game.planets.' . $planet->image) }}" class="planetimage" width="24" height="24">
                            <a href="#">
                                {{ $planet->planetname }} [{{ $planet->galaxy . ':' . $planet->system . ':' . $planet->position }}]
                            </a>
                        </div>
                    @endforeach
                    </nav>
                    <h5>Flotten</h5>
                </div>
                <div class="btn-group w-100 mb-3">
                    <a href="#" class="btn btn-primary"><span class="fas fa-fw fa-flask"></span> Forschen</a>
                    <a href="#" class="btn btn-primary"><span class="fas fa-fw fa-handshake"></span> Allianz</a>
                    <a href="#" class="btn btn-primary"><span class="fas fa-fw fa-sun"></span> Galaxie</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="wow fadeIn bg-inherit">
    <div class="d-flex justify-content-between p-2 milky bordered-top">
        <nav>
            <a href="#" class="nav-item"><span class="fas fa-fw fa-list-ol"></span> <span class="d-none d-lg-inline">Toplist</span></a>
            <a href="#" class="nav-item"><span class="fas fa-fw fa-search"></span> <span class="d-none d-lg-inline">Suche</span></a>
            <a href="#" class="nav-item"><span class="fas fa-fw fa-gamepad"></span> <span class="d-none d-lg-inline">Simulator</span></a>
        </nav>
        <nav>
            <a href="#" class="nav-item"><span class="fas fa-fw fa-user"></span> <span class="d-none d-lg-inline">Account</span></a>
            <a href="#" class="nav-item"><span class="far fa-fw fa-list-alt"></span> <span class="d-none d-lg-inline">Forum</span></a>
            <a href="#" class="nav-item"><span class="fas fa-fw fa-sign-out-alt"></span> <span class="d-none d-lg-inline">Abmelden</span></a>
        </nav>
    </div>
</footer>
@stop
@section('pagejs')

@stop
