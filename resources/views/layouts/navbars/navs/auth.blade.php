<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Inventario</a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                   
                </li>
                <li class="dropdown nav-item">
                   
                </li>
                <li class="nav-item">
                    
                </li>
            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <span class="no-icon">Bienvenido, {{ AUth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                      
                      <li class="dropdown-item">
                          <form id="logout-form" class="m-0 p-0" action="{{ route('logout') }}" method="POST">
                              @csrf
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Salir') }} </a>
                          </form>
                      </li>
                    </ul>
                  </li>
            </ul>
        </div>
    </div>
</nav>