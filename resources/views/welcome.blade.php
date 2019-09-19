<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Pinterest Clone</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #efefef;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .width{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height welcome-bg">
            @if (Route::has('login'))
                <div class="top-left links">
                    @auth
                        <a  class="btn btn-light btn-lg" href="{{ url('/home') }}">Home</a>
                    @else
                        <a  class="btn btn-light btn-lg" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a  class="btn btn-light btn-lg" href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div class="content width">
                <div class="m-b-md">
                    @yield('content')
                </div>
            </div>
            
        </div>
    </body>
</html>
