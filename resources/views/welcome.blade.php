<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

          <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        
        <title>Natale a casa Curtaz</title>


    </head>
    {{-- lo sfondo è qua in modo da non dover creare un css ad hoc per uno sfondo di una pagina --}}
    <body style=" background: radial-gradient(circle, rgba(252,246,186,1) 50%, rgba(191,149,63,1) 100%);
    ">
        <div id="welcome"> 
            <div class="container">
                <div class="row pt-3">
                    <div class="col-md-8 offset-md-2">
                        <div class="title-wrapper">
                            <img src="{{ asset('/img/title.png')}}" alt="">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="img-wrapper">
                            <img src="{{ asset('/img/welcome.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row pt-3 pb-5">
                    <div class="col-12">
                        <div class="links text-center">
                            @auth
                                <a href=" {{ route('home') }} ">Home</a> 
                                <a href="{{ route('myWS')}}">Desideri/Suggerimenti</a>
                                <a href="{{route('help')}}">Help</a>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
    </body>
</html>
