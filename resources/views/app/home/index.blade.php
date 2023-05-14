@extends('master.template')

@section('content')

<div class="container my-5">
    <h1 class="fs-4 text-gray-200">Bem-vindo(a) ao Pedido Fácil</h1>
    
    <article class='mt-3'>
        <header>
            <h2 class="fs-6 fw-normal">Estatítiscas da sua lanchonete</h2>
        </header>
        
        <section class='d-flex row justify-content-around mt-4'>
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="fas fa-user-plus"></i></div>
                    <h3 class='fs-5 fw-light'>Quantidade de clientes cadastrados</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>20</p>
            </article>
            
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="far fa-thumbs-up"></i></div>
                    <h3 class='fs-5 fw-light'>Quantidade de pedidos finalizados</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>20</p>
            </article>
            
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="far fa-thumbs-down"></i></div>
                    <h3 class='fs-5 fw-light'>Quantidade de pedidos pendentes</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>12</p>
            </article>
        </section>
        
        <section class='d-flex row justify-content-around mt-2 mb-5'>
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="fas fa-hand-holding-usd"></i></div>
                    <h3 class='fs-5 fw-light'>Total em pedidos finalizados</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>R$ 7000,00</p>
            </article>
            
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="fas fa-search-dollar"></i></div>
                    <h3 class='fs-5 fw-light'>Total em pedidos pendentes</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>R$ 5000,00</p>
            </article>
            
            <article class='card border mt-2 app_border_top shadow-sm p-3 col-md-3 col-12'>
                <header class='text-center'>
                    <div class='rounded-circle text-light app_rounded mb-3'><i class="fas fa-hand-holding-usd"></i></div>
                    <h3 class='fs-5 fw-light'>Lucro Previsto</h3>
                </header>
                
                <p class='mt-3 text-center text-muted fs-2'>R$ 8000,00</p>
            </article>
        </section>
    </article>
</div>


@endsection()