<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.toodle')
        <main >
            <nav>
                <div class="feed-container">
                    <div class="feed-header">
                        <div class="left">
                            <a href="/" class="logo">
                                <div class="img"><img src="/brand/icon.svg"></div>
                                Pull<br>request
                            </a>
                            <div class="left-menu">
                                <li><a href="">Feed</a></li>
                                <li><a href="">Discover</a></li>
                            </div>
                        </div>
                    </div>
                    <div class="feed-sidebar-header">
                        <div class="right">
                            @auth
                                <div class="user">
                                    <a href="/posts/create" class="create"></a>
                                    <a class="settings"></a>
                                    <a href="/{{ Auth::user()->username }}" class="name">{{ Auth::user()->name }}</a>
                                    <a href="/{{ Auth::user()->username }}" class="avatar">{{ Auth::user()->inititals }}</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>
</body>
</html>
