<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="storage/logo.png">

        <title>Lucas Vitorino @yield('title')</title>

        <!-- Styles -->
        <style>
            html, body {
                overflow-x: hidden;
                max-width: 100%;
            }
        </style>

        @yield('style')

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- BOOTSTRAP VALIDATE -->
        <script>
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>

        @yield('scriptTop')

    </head>
    <body>
        <div class="container-fluid my-3">
            <img src="storage/logo-full-no-bg.png" onclick="window.location.href='/'" alt="logo-full" style="height:20vh;margin:auto;cursor: pointer;" class="d-none d-md-block">
            <div class="d-md-none text-center">
                <img src="storage/selo.png" onclick="window.location.href='/'" alt="selo" style="height:20vh;cursor: pointer;">
            </div>
            
            <span data-bs-target="#offcanvasNavbar" data-bs-toggle="offcanvas" role="button" style="position:fixed;top:10px;left:10px;"><img src="storage/menu-bars.svg" alt="menu-bars"></span>
            
            <div class="offcanvas offcanvas-start"s id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <span class="fs-3">Lucas Vitorino Barbearia</span>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <hr/>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('Início') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                                </li>
                            @endif
                        @else
                            <p class="fs-4">Bem-vindo {{Auth()->user()->name}}</p>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        
        <main class="my-4">
            @yield('content')
        </main>

        <footer style="background-color: rgba(0, 0, 0, .5);">
            <div class="container">
                footer
            </div>
            <div class="text-center">
                {{date('Y')}} by EVTU.
            </div>
        </footer>

        @yield('scriptEnd')
    </body>
</html>
