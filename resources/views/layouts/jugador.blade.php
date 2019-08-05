<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark text-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
                <img src="{{session("player")->avatar->route}}" class="img-fluid avatar rounded-circle" alt="">
                    {{ session("player")->first_name }}
                </a>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @auth
        @include('firebase')
        @yield('scripts')
    @endauth
</body>
</html>
