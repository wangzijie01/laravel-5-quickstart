<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{ url('favicon.png') }}">
        <title>Laravel</title>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                        @role('administrator')
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('admin.dashboard') }}">Admin</a>
                        @else
                            <a href="{{ route('home') }}">Home</a>
                        @endrole
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel 5.6 Boilerplate
                </div>

                <div class="links">
                    <a href="https://laravel-china.org/docs/laravel/5.6">Documentation</a>
                    <a href="https://github.com/tymondesigns/jwt-auth">jwt-auth</a>
                    <a href="https://github.com/spatie/laravel-permission">laravel-permission</a>
                    <a href="https://github.com/andersao/l5-repository">l5-repository</a>
                    <a href="https://github.com/niugengyun/laravel-5-quickstart">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
