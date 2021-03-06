<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {padding-bottom: 100px;}
        .level {display: flex; align-items: center;}
        .flex {flex: 1;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#00796B">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:aliceblue">
                    Forum
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        {{-- all threads --}}
                        <li class="nav-item dropdown">
                                <a style="color:aliceblue; font-weight:bold;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Browse
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color:aliceblue; font-weight:bold;">
                                    <a href="/threads" class="dropdown-item">All threads</a>
                                    @if(auth()->check())
                                    <a href="/threads?by={{auth()->user()->name}}" class="dropdown-item">My threads</a>
                                    @endif

                                    <a href="/threads?popular=1" class="dropdown-item">All popular threads</a>
                                </div>
                        </li>

                        {{-- new Thread --}}
                        <li>
                            <a class="nav-link" href="/threads/create" style="color:aliceblue; font-weight:bold;">Create Thread</a>
                        </li>

                        {{-- drop down channel --}}
                        <li class="nav-item dropdown">
                                <a style="color:aliceblue; font-weight:bold;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" overflow-y= scroll>
                                  Channels
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                 @foreach($channels as $channel)
                                        <a href="/threads/{{$channel->slug}}" class="dropdown-item">{{$channel->name}}</a>
                                 @endforeach
                                </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}" style="color:aliceblue">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}" style="color:aliceblue">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" style="color:aliceblue; font-weight:bold;" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
