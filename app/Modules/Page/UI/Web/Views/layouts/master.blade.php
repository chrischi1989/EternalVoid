<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eternal Void :: @yield('pagetitle')</title>
    <style>
        {!! file_get_contents('css/bootstrap.min.css') !!}
        {!! file_get_contents('css/animate.min.css') !!}
        {!! file_get_contents('css/fontawesome.min.css') !!}
        {!! file_get_contents('css/style.min.css') !!}
        {!! file_get_contents('https://fonts.googleapis.com/css?family=Exo+2:200,300,400,500,600,700&display=swap') !!}
        @yield('pagecss')
    </style>
</head>
<body>
@yield('content')
<script>
    {!! file_get_contents(public_path('js/jquery.min.js')) !!}
    {!! file_get_contents(public_path('js/bootstrap.bundle.min.js')) !!}
    {!! file_get_contents(public_path('js/wow.min.js')) !!}
    new WOW().init();
    @yield('pagejs')
</script>
</body>
</html>