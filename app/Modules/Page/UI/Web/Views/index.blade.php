@extends('page::layouts.master')
@section('pagecss')
<style>
    h1 {
        font-size:4rem;
    }
</style>
@stop
@section('content')
    <div class="container-fluid bg-inherit">
        <header class="my-5 py-5 wow fadeInDown">
            <h1 class="text-uppercase text-center font-weight-bolder">Eternal Void</h1>
        </header>
        <div class="row justify-content-center h-100 bg-inherit">
            <div class="col-12 col-lg-6 col-xl-4 bg-inherit wow fadeIn slow">
                <form action="{{ route('user-login') }}" enctype="multipart/form-data" method="post" class="milky bordered round p-3">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="login_username" class="col-form-label required col-12">Benutzername</label>
                                <div class="col-12">
                                    <input name="username" id="login_username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="login_password" class="col-form-label required col-12">Passwort</label>
                                <div class="col-12">
                                    <input type="password" id="login_password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-primary btn-block">
                                <span class="fas fa-sign-in-alt pr-1"></span> Anmelden
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6 col-xl-4 bg-inherit wow fadeIn slow mt-5 mt-lg-0">
                <form action="{{ route('user-register') }}" enctype="multipart/form-data" method="post" class="milky bordered round p-3">
                    {!! csrf_field() !!}
                    <div class="form-row mb-3">
                        <input class="d-none" name="name" value="">
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="username" class="col-form-label required col-12">Benutzername</label>
                                <div class="col-12">
                                    <input name="username" id="username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="email" class="col-form-label required col-12">E-Mail Adresse</label>
                                <div class="col-12">
                                    <input name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="race" class="col-form-label required col-12">Rasse</label>
                                <div class="col-12 input-group">
                                    <select name="race" id="race" class="custom-select">
                                        @foreach($races as $race)
                                        <option value="{{ $race->uuid }}">{{ $race->racename }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="far fa-question-circle"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row">
                                <label for="planet" class="col-form-label col-12">Planetenname</label>
                                <div class="col-12">
                                    <input name="planet" id="planet" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-primary btn-block">
                                <span class="fas fa-user-plus pr-1"></span> Registrieren
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
