<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffff;
                background: url("/img/alo1.jpg") no-repeat center center;
                -webkit-background-size:cover;
                -moz-background-size:cover;
                -moz-background-size:cover;
                background-size:cover;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100%;
                margin: 0;
                overflow: auto;
                width: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:aliceblue">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:aliceblue">Login</a>
                        <a href="{{ route('register') }}" style="color:aliceblue">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="font-weight:500; color:aliceblue">
                    FRESLA
                </div>
                <h6 style="color:aliceblue">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore aut facilis repudiandae eligendi iusto tempora cupiditate aspernatur inventore.</h6>
                <br>
                <button type="button" onclick="location.href='/threads'" class="btn btn-outline-light btn-md"> GET STARTED </button>

                <div class="links" style="">
                    {{-- <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>
            </div>
        </div>
    </body>


</html>
