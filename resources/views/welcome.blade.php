<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

          <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        
        <title>Natale a casa Curtaz</title>


    </head>
    <body>
        <div id="welcome">
            <div class="flex-center position-ref full-height">       

                <div class="content">
                    <div class="title m-b-md">
                        Natale a casa Curtaz
                    </div>
                    
                    
                    <div class="links">
                        @auth
                            <a href=" {{ route('home') }} ">My Home</a> 
                            <a href="#">Link</a>
                            <a href="#">Link</a>
                            <a href="#">Link</a>
                            <a href="#">Link</a>
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
    </body>
</html>
