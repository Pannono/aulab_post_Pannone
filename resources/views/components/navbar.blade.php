<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">The Aulab Post</a>
      <nav class="navbar bg-p">
        <div class="container-fluid">
          <form class="d-flex" role="search" action="{{route('article.search')}}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Cerca tra gli articoli..." aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menù</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
            <li class="nav-item dropdown">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('careers')}}">Lavora con noi</a>
            <li class="nav-item dropdown">
            @auth
                
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao {{auth()->user()->name}}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                @if (Auth::user()->is_admin)
                    <li><a href="{{route('admin.dashboard')}}" class="dropdown-item" aria-current="page">Dashboard Admin</a></li>
                @endif
                @if (Auth::user()->is_revisor)
                    <li><a href="{{route('revisor.dashboard')}}" class="dropdown-item" aria-current="page">Dashboard Revisore</a></li>
                @endif
                @if (Auth::user()->is_writer)
                    <li><a href="{{route('writer.dashboard')}}" class="dropdown-item" aria-current="page">Dashboard Redattore</a></li>
                @endif
                <li class="dropdown-item">
                  <a href="{{route('article.create')}}" class="nav-link">Inserisci un articolo</a>
                </li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                </li>
                <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
                    @csrf
                </form>
              </ul>
            </li>
          </ul>
          @endauth
          @guest
            
              <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Benvenuto Ospite
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
              </ul>
            </li>
              
          @endguest
        </div>
      </div>
    </div>
  </nav>