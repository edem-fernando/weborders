<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta id="meta_url" content="{{ route('web.finalize') }}">
        
        <title>Pizzaria Online</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">

        <link rel="shortcut icon" href="{{ url("images/icon.png") }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ url('libs/bootstrap/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ url('libs/fontawesome/css/all.min.css') }}"/>
        <link rel="stylesheet" href="{{ url('css/main.css') }}"/>
    </head>

    <body>
        <!-- ajax load -->
        <div class="ajax_load">
            <div class="ajax_load_box">
                <div class="ajax_load_box_circle"></div>
                <p class="ajax_load_box_title">Aguarde, carregando...</p>
            </div>
        </div>

        <div class="ajax_response"></div>

        <!-- Header -->
        <nav class="navbar navbar-expand-lg app_header">
            <div class="container-fluid">
                <a class="navbar-brand " href="{{ route('web.index') }}">
                    <img src="{{ url("/images/icon.png") }}" alt="Pizzaria Online" title="Pizzaria Online" class="d-inline-block align-text-top" width="40" height="40"/>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-light"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active app_link" aria-current="page" href="{{ route('web.index') }}">Lanchonete</a></li>
                    </ul>

                    @if(auth()->check() && auth()->user())
                        <span class="navbar-text"><a class="nav-link app_link" href="{{ route('app.home') }}"><i class="fas fa-home"></i> Home</a></span>
                        <span class="navbar-text"><a class="nav-link app_link" href="{{ route('app.orders.index') }}"><i class="fas fa-pizza-slice"></i> Pedidos</a></span>
                        <span class="navbar-text"><a class="nav-link app_link" href="#"><i class="far fa-clipboard"></i> Cardápios</a></span>
                        <span class="navbar-text"><a class="nav-link app_link" href="#"><i class="fas fa-users"></i> Clientes</a></span>
                        <span class="navbar-text"><a class="nav-link app_link" href="{{ route('web.logout') }}"><i class="fas fa-sign-out-alt"></i> Sair</a></span>
                    @else
                        <span class="navbar-text"><a class="nav-link app_link" href="{{ route('web.login') }}"><i class="fas fa-user"></i> Acesso para funcionários</a></span>
                    @endif
                </div>
            </div>
        </nav>

        <main class="app_main">
            @yield('content')
        </main>

        @include('master.footer')

        <script src="{{ url('libs/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('libs/fontawesome/js/all.min.js') }}"></script>
        <script src="{{ url('js/libs/jquery.js') }}"></script>
        <script src="{{ url('js/libs/jquery-ui.js') }}"></script>
        <script src="{{ url('js/libs/mask.js') }}"></script>
        <script src="{{ url('js/main.js') }}"></script>
        <script src="{{ url('js/script.js') }}"></script>
        <script src="{{ url('js/masks.js') }}"></script>

        @yield('scripts')
    </body>
</html>
