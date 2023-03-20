<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Astreet') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="album.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67fc42cf07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/67fc42cf07.css" crossorigin="anonymous">
    <script src="{{ asset('js/bookmark.js') }}" defer></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <nav>
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        <strong>Astreet</strong>
                    </a>
                </div>
                <div class="my-navbar-control">
                    @if(Auth::check())
                    <span class="my-navbar-item">{{Auth::user()->name}}</span>
                    /
                    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click',function(event){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                    </script>
                    @else
                    <a class="may-navbar-item" href="{{route('login')}}">ログイン</a>
                    /
                    <a class="my-navbar-item" href="{{route('register')}}">会員情報</a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
        @yield('content')
</body>
</html>

