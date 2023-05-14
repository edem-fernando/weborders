<div class="app_wrapper" id="sidebar">
    <nav class="app_menu">
        <ul class="nav flex-column app_menu_version">
            <li class="nav-item">
                <div class="nav-link link-light">
                    <i class="fas fa-code-branch"></i> Versão <span>1.0</span>
                </div>
            </li>
        </ul>

        <ul class="nav flex-column mt-5 app_menu_options">
            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-home"></i> Home</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-chart-pie"></i> Dashboard</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-wallet"></i> Carteiras</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-calendar-minus"></i> Despesas</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-calendar-check"></i> Receitas</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-chart-line"></i> Gestão de Metas</a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link link-light app_font_menu" href="#">
                    <i class="fas fa-cogs"></i> Configurações </a>
            </li>

            <!-- Logout And Notifications Only Mobile -->
            <li class="nav-item my-1 app_hidden">
                <a href="#" class="nav-link link-light"><i class="fas fa-user"></i> Perfil</a>
            </li>
            <li class="nav-item my-1 app_hidden">
                <a href="#" class="nav-link link-light"><i class="fas fa-bell"></i> <sup>2</sup> Notificação</a>
            </li>
            <li class="nav-item my-1 app_hidden">
                <a href="#" class="nav-link link-light"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </li>
        </ul>
    </nav>

    <ul class="nav flex-column app_menu_area_user">
        <li class="nav-item app_flex_nowrap">
            <div class="row app_margin_y_min">
                <a href="#" class="nav-link link-light fs-6 app_text_bold">
                    <span>Edem Fernando Bastos</span>
                    <span>ecastro@ceapema.org.br</span>
                </a>
            </div>
            <img src="{{ url('images/avatar.jpg') }}" alt="Usuario" title="Usuario" class="app_image_menu my-2 mx-2"/>
        </li>
        <li class="nav-item">
            <div class="nav-link">
                <div class="link-light app_font_min">
                    <span>Status </span>
                    <i class="fas fa-circle link-success ms-2"></i>
                    <span class="me-md-3">Ativo</span>
                </div>
            </div>
        </li>
    </ul>
</div>
