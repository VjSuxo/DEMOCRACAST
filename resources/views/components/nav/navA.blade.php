<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route("inicio") }}">DEMOCRACAST</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('inicio') ? 'active' : '' }}" aria-current="page" href="{{ route("inicio") }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('listaElecciones') ? 'active' : '' }}" href="{{ route("listaElecciones") }}">Elecciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Tutorial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">Inicio Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin.gElecciones') ? 'active' : '' }}" href="{{ route('admin.gElecciones') }}">Gestion Elecciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin.gUsuarios') ? 'active' : '' }}" href="{{ route('admin.gUsuarios') }}">Gestion Usuarios</a>
          </li>

        </ul>

        <div class="d-flex">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @if(auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->username }} <!-- Muestra el nombre del usuario autenticado -->
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar Secion</a>
                </li>
                @endif
            </ul>
        <div>
      </div>
    </div>
  </nav>

