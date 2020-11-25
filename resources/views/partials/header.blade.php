<div id="header">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg">

        <!-- Navbar brand -->
        <a class="navbar-brand" href=" {{ asset('/') }}">Natale a Casa Curtaz</a>
    
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
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Presente</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('myWS')}}">Desideri/Suggerimenti</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    Logout
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
