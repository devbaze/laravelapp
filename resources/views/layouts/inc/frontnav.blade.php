<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
       <a href="{{ url('/') }}"> <img class="logo" src="{{ asset('assets/img/logo.svg') }}" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Početna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kategorije') ? 'active' : '' }}" href="{{ url('/kategorije') }}">Kategorije</a>
          </li>
        </ul>        
        
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('login') }}">Prijava</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Registracija</a>
                </div>
            </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      
                      <i class="fa fa-user"></i>
                       {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      @if(Auth::user()->role_as == '1')
                      <a class="dropdown-item" href="{{ url('/') }}/dashboard">
                        <i class="fa fa-dashboard"></i>
                          Admin panel
                        </a>
                      @elseif(Auth::user()->role_as == '0')
                      <a class="dropdown-item" href="{{ route('home') }}">
                      <i class="fa fa-dashboard"></i>
                        Uredi profil
                      </a>

                      @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            {{ __('Odjavi se') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

                </li>
            @endguest
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/korpa') }}">
                <i class="fa fa-shopping-cart"></i>
                Korpa
                {{-- <span class="badge badge-pill badge-danger">{{ Korpa::count() }}</span> --}}
              </a>
            </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>