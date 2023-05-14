@extends('master.template')

@section('content')

<div class="container my-5">
    <article class="mt-5 border shadow app_card app_box_login">
        <header class="text-center mt-3">
            <h1 class="fw-light fs-1 app_login_title">Pedido Fácil</h1>
        </header>

        <form class="row mt-2 g-2 mt-3 mx-auto" action="{{ route('web.attempt') }}" method="post">
            @method('POST')
            <div class="form-floating my-3">
                <input type="text" class="form-control" id="floatingLogin" placeholder="002021432" name="login" required>
                <label for="floatingLogin">Matrícula</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="**********" name="password" required>
                <label for="floatingPassword">Senha de acesso</label>
            </div>

            <div class="col-12 text-center my-3">
                <button class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Entrar</button>
            </div>
        </form>

        <span class="app_login_disclaimer text-muted">Preencha as informações acima para realizar a gestão dos seus pedidos.</span>
    </article>
</div>

@endsection

@section('scripts')
    <script src="{{ url('js/login.js') }}"></script>
@endsection