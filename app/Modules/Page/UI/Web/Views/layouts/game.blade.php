<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Eternal Void :: @yield('pagetitle')</title>
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
        <style>
            {!! file_get_contents('css/bootstrap.min.css') !!}
            {!! file_get_contents('css/animate.min.css') !!}
            {!! file_get_contents('css/fontawesome.min.css') !!}
            {!! file_get_contents('storage/css/style.min.css') !!}
        </style>
        @yield('pagecss')
    </head>
    <body>
    @yield('content')
    <script>
        {!! file_get_contents(public_path('js/jquery.min.js')) !!}
        {!! file_get_contents(public_path('js/bootstrap.bundle.min.js')) !!}
        {!! file_get_contents(public_path('js/wow.min.js')) !!}
        @include('partials.game.resources-json')
        {!! file_get_contents(public_path('js/game.js')) !!}
        new WOW().init();
    </script>
    @yield('pagejs')
    </body>
</html>
