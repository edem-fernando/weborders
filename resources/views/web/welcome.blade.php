@extends('master.template')

@section('content')

    @include('master.modal')

    <article class="home_featured">
        <div class="home_featured_content container content">
            <header class="home_featured_header" >
                <h1>Bateu aquela fome?</h1>
                <h2>Peça já a sua pizza!</h2>
                <p data-bs-toggle="modal" data-bs-target="#modal_order"><span class="home_featured_btn">Realizar o meu pedido</span></p>
            </header>
        </div>
    </article>

    <!-- Section Card Content -->
    <section class="container">
        <header class="app_text_center">
            <h1 class="app_title">Confira os principais alimentos do nosso cardápio</h1>
            <p class="app_paragraph">São três categorias que abragem diversos tipos de alimentos, confira abaixo:</p>
        </header>

        <div class="app_flex">
            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-bebidas.jpg") }}" class="app_card_img" alt="Bebidas" title="Bebidas"/>
                    <h2 class="app_subtitle">Bebidas</h2>
                    <p class="app_paragraph">Escolha a sua bebida favorita, dispomos de: refrigerante, chá, suco, detox e limonada entre outros.</p>
                </header>
            </article>

            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-lanches.jpg") }}" class="app_card_img" alt="Sanduíches" title="Sanduíches"/>
                    <h2 class="app_subtitle">Sanduíches</h2>
                    <p class="app_paragraph">Escolha a seu sanduíches favorito, dispomos de deliciósos: 
                        hambúrgueres, cachorro-quente, sanduíches, mistos entre outros.</p>
                </header>
            </article>

            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-sobremesa.jpg") }}" class="app_card_img" alt="Sobremesas" title="Sobremesas"/>
                    <h2 class="app_subtitle">Sobremesas</h2>
                    <p class="app_paragraph">Escolha a sua Sobremesas favorita, dispomos de: bolos, tortas, mousse entre outros.</p>
                </header>
            </article>
        </div>
    </section>

    <!-- Call to Action -->
    <article class="app_call_to_action">
        <header>
            <h1>Cupom de desconto!!!</h1>
            <p class="app_call_to_action_nomobile">Está com vontande de experimentar um de nossos deliciosos lanches, mas no momento está duro? Calma nós podemos de ajudar.</p>
            <p>Preencha o formulário abaixo que nós te enviaremos um cupom de desconto.</p>
        </header>

        <div class="app_call_to_action_form">
            <input type="text" id="inputName" name="name" placeholder="Informe o seu nome completo" />
            <input type="email" id="inputEmail" name="email" placeholder="Informe o seu e-mail"/>
            <button>Solicitar Cupom</button>
        </div>
    </article>

    <!-- Depoiments -->
    <section class="container">
        <header class="app_text_center">
            <h1 class="app_title">Confira abaixo o depoimento de alguns de nossos clientes</h1>
            <p class="app_paragraph">Esse são nossos clientes mais fies e recorrentemente realizam pedido em nossa pizzaria.</p>
        </header>

        <div class="app_flex">
            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-depoiment1.jpg") }}" class="app_card_img_rounded" alt="Tiago Barbosa" title="Tiago Barbosa"/>
                    <h2 class="app_subtitle">Tiago Barbosa</h2>
                    <p class="app_paragraph">Na Pizzaria online, eu encontro sempre um lanche super delicioso e saboroso.</p>
                </header>
            </article>

            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-depoiment2.jpg") }}" class="app_card_img_rounded" alt="Fábio Martins" title="Fábio Martins"/>
                    <h2 class="app_subtitle">Fábio Martins</h2>
                    <p class="app_paragraph">Na Pizzaria online, eu encontro sempre um lanche super delicioso e saboroso.</p>
                </header>
            </article>

            <article class="app_flex_item_3 app_card">
                <header>
                    <img src="{{ url("images/thumb-depoiment3.jpg") }}" class="app_card_img_rounded" alt="Bruna Santos" title="Bruna Santos"/>
                    <h2 class="app_subtitle">Bruna Santos</h2>
                    <p class="app_paragraph">Na Pizzaria online, eu encontro sempre um lanche super delicioso e saboroso.</p>
                </header>
            </article>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // elements
        const divModal = document.querySelector('.modal');
        const divAccordions = document.querySelectorAll('.modal_accordion');
        const spanTotal = document.querySelector('.order_total');
        const url = document.querySelector('#meta_url').getAttribute('content');
        const btn_finalize_order = document.querySelector('.btn_finalize_order');
        
        const formatNumber = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL',
            minimumFractionDigits: 2,
            maximumFractionDigits: 3 
        });

        var itens = [
            {
                id: 1,
                category: 1,
                name: 'Refri Coca-Cola 1.5L',
                image: 'images/thumb-bebidas.jpg',
                quant: 0,
                price_sale: 08.45,
                price_cost: 4.00,
                description: 'Refrigerante Coca-Cola 1.5L'
            }, {
                id: 2,
                category: 2,
                name: 'Hamburger da casa',
                image: 'images/thumb-lanches.jpg',
                quant: 0,
                price_sale: 12.00,
                price_cost: 6.00,
                description: 'Pão caseiro, blend 500g, ovo frito, queijo e presunto'
            }, {
                id: 3,
                category: 3,
                name: 'Mousse',
                image: 'images/thumb-sobremesa.jpg',
                quant: 0,
                price_sale: 17.00,
                price_cost: 9.00,
                description: 'Mousse de baunilha com cobertura de morango'
            },
        ];

        // functions
        const updateTotal = () => {
            let total = 0;
            
            itens.forEach((item) => {
                total += item.quant * item.price_sale;
            });
            
            spanTotal.innerText = formatNumber.format(total);
        };
        
        const addItem = (item, targetId) => {
            let span = document.getElementById(targetId);
            item.quant++;
            span.innerText = item.quant;
            updateTotal();
        };

        const rmvItem = (item, targetId) => {
            if (item.quant == 0)
                return;
            
            let span = document.getElementById(targetId);
            item.quant--;
            span.innerText = item.quant;
            updateTotal();
        };
        
        const getProduct = (id) => {
            let product;
            itens.forEach((item) => {
                if (item.id == id) {
                    product = item;
                    return;
                }
            });
            
            return product;
        };
        
        const finalizeOrder = () => {
            let object = {
                client: {
                    name: document.querySelector('#client_name').value,
                    phone:document.querySelector('#client_phone').value 
                },
                address: {
                    zip_code: document.querySelector('#zip_code').value,
                    city: document.querySelector('#city').value,
                    district: document.querySelector('#district').value,
                    street: document.querySelector('#street').value,
                    number: document.querySelector('#number').value
                },
                list_itens: itens
            };
            
            requestJq('POST', url, object, (response) => {
                if (response.object_response.alert_success) {
                    window.alert(response.object_response.alert_success);
                }
            });
        }

        const fillMenu = () => {
            itens.forEach((item) => {
                var divTarget = document.querySelector(`div[data-category="${item.category}"]`);
                var divThumb = document.createElement('div');
                var divDescr = document.createElement('div');
                var divItens = document.createElement('div');

                divThumb.setAttribute('class', 'item_thumb');
                divItens.setAttribute('class', 'item_actions');
                divDescr.setAttribute('class', 'item_description');

                var elTxt = document.createElement('span');
                var elSpn = document.createElement('span');
                var elImg = document.createElement('img');
                var elBRW = document.createElement('br');

                elImg.setAttribute('src', item.image);
                elImg.setAttribute('alt', item.name);
                elImg.setAttribute('title', item.name);
                elTxt.innerText = item.name + ' Preço R$: ' + formatNumber.format(item.price_sale);
                elSpn.innerText = `Descrição: ${item.description}`;

                var btnAdd = document.createElement('button');
                var btnRmv = document.createElement('button');
                var btnQtd = document.createElement('span');

                btnAdd.setAttribute('class', 'btnAdd');
                btnRmv.setAttribute('class', 'btnRmv');
                btnQtd.setAttribute('class', 'total');
                btnQtd.id = `span-total-${item.id}`;

                btnAdd.innerText = '+';
                btnRmv.innerText = '-';
                btnQtd.innerText = '0';

                divThumb.appendChild(elImg);
                divDescr.appendChild(elTxt);
                divDescr.appendChild(elBRW);
                divDescr.appendChild(elSpn);

                divItens.appendChild(btnAdd);
                divItens.appendChild(btnQtd);
                divItens.appendChild(btnRmv);

                divTarget.appendChild(divThumb);
                divTarget.appendChild(divDescr);
                divTarget.appendChild(divItens);

                btnAdd.addEventListener('click', () => addItem(item, btnQtd.id));
                btnRmv.addEventListener('click', () => rmvItem(item, btnQtd.id));
            });
        };

        divAccordions.forEach((accordion) => {
            accordion.addEventListener('click', () => {
                let target = document.querySelector(accordion.getAttribute('data-target'));
                let hasClass = target.classList.contains('hidden');

                if (hasClass) {
                    target.classList.add('flex');
                    target.classList.remove('hidden');
                } else {
                    target.classList.add('hidden');
                    target.classList.remove('flex');
                }
            });
        });
        
        fillMenu();
        
//        document.querySelector('#zip_code').addEventListener('change', (e) => {
//            var zipcode = e.target.value.replace(/\D/g, '');
//            var url_zipcode = 'https://viacep.com.br/ws/' + zipcode + '/json/';
//            if (zipcode.length != 8) {
//                return;
//            }
//            
//            requestJq('GET', url_zipcode, {}, (response) => {
//                if (response.cep) {
//                    document.querySelector('#city').value = response.localidade;
//                    document.querySelector('#district').value = response.bairro;
//                    document.querySelector('#street').value = response.logradouro;
//                }
//            });
//        });
        
        btn_finalize_order.addEventListener('click', () => finalizeOrder());        
    </script>
@endsection