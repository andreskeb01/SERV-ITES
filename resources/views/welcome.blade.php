<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Servicios ITES</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
        <br>
        <br>
        <br>
        <div class="full-height">
            <div class="content">
                @if(session()->has('unautenticated'))
                    <div style="color: #6f000f; font-size: 15px; font-weight: 600; ">{{session('unautenticated')}}</div>
                @endif
                <h1>Servicios del Instituto de Estudios Superiores <br> Rene Descartes</h1>

                <br>
                <br>
                <div class="links">
                    <a href="{{ route('login_index') }}">Servicios Bibliotecarios</a>
                    <a href="{{ route('login_index') }}">Servicios Centro de Cómputo</a>
                </div>
            </div>
        </div>
    </body>
</html>
