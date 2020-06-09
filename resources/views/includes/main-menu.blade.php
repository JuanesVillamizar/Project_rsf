<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-white" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('start') }}">Club Social de Trabajo</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                @guest()
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('start') }}#about">Quienes somos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('start') }}#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('start') }}#contact">Contactenos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    @endif
                @endguest
                @auth()
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('start') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('my-albums.index') }}">Mis albumes</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('my-photos.index') }}">Mis fotos</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nickName }}
                            <span class="caret">
                                <img src="{{ asset('storage/avatars') }}/{{ Auth::user()->avatar }}.png" alt="img avatar" style="border-radius: 70px; width: 25px">
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a id="" class="nav-link pl-4" href="{{ route('my-data.index') }}" role="button" >
                                Mi datos
                            </a>
                            <a id="" class="nav-link disabled text-muted pl-4" href="#" role="button" >
                                Configuracion
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
