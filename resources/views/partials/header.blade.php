<div id="header">
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg">

        <!-- Navbar brand -->
        <a class="navbar-brand" href=" {{ asset('/') }}">
            <img src="{{ asset('/img/logo.png') }}" alt="">
        </a>
    
        <!-- Collapse button -->
        <button class="navbar-toggler hamburger-btn" type="button" data-toggle="collapse" data-target="#hamburgerMenu"
        aria-controls="hamburgerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon3"><span></span><span></span><span></span></div>
        </button>
  
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="hamburgerMenu">
    
            <!-- Links -->
            <ul class="navbar-nav ml-auto text-right">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Entra</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('myWS')}}">Miei Desideri/Suggerimenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('explore')}}">Scopri Desideri</a>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('help')}}">Help</a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                   Esci
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
      <!-- Links -->
        </div>
    <!-- Collapsible content -->
    </nav>
  <!--/.Navbar-->
  
</div>
