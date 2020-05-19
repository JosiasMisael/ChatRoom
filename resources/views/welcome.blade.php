<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Chat') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);
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
                font-size: 13px;
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
        @if (Route::has('login'))
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="/">{{config('app.name')}}</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item active">
                        <a class="nav-link"href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                      </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                      </li>
                      @if (Route::has('register'))

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                      </li>
                      @endif
                    @endauth
                </ul>
              </div>
            </nav>
        </header>
        @endif
        <main>
            <div class="container">
                <div class="row justify-content-center">
                   <div class="col=12 mt-3">
                       <div class="jumbotron ">
                         <h1 class="display-4">Bienvenido a la sala de chat</h1>
                         <p class="lead">Este es un ejemplo que contiene realtime, vujs, bouncer, slug, para el uso de asistentes</p>
                         <hr class="my-4">
                         <p>Para Accdeder a la sala de chatda click en el siguiente enlace</p>
                         <p class="lead">
                         <a class="btn btn-primary btn-lg" href="{{route('home')}}" role="button">INGRESAR SALA</a>
                         </p>
                   </div>
                </div>
               </div>
            </div>
             <div class="container">
              <div class="row">
                 <div class="col-sm-6">
                   <div class="card">
                     <div class="card-body">
                       <h5 class="card-title">Enlace al canal de Facebook</h5>
                       <p class="card-text">Conoce al mero pro</p>
                       <a href="https://www.facebook.com/josiasmisaelsb" class="btn btn-primary">Conocelo</a>
                     </div>
                   </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="card">
                     <div class="card-body">
                       <h5 class="card-title">Enlace al proyecto en GIT</h5>
                       <p class="card-text">Directorio del proyecto</p>
                       <a href="https://github.com/JosiasMisael/ChatRoom" class="btn btn-primary">Go somewhere</a>
                     </div>
                   </div>
                 </div>
               </div>
            </div>
           </main>
    </body>
</html>
