<div class="modal fade" id="modal_order" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">Realizar Meu pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                Montar Pedido
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="modal_accordion" data-target="#accordion-drinks"><div>Bebidas</div></div>
                                <div class="modal_accordion_panel hidden" data-category="1" id="accordion-drinks"></div>

                                <div class="modal_accordion" data-target="#accordion-lanches"><div>Sanduíches</div> </div>
                                <div class="modal_accordion_panel hidden" data-category="2" id="accordion-lanches"></div>

                                <div class="modal_accordion" data-target="#accordion-desserts"><div>Sobremesas</div></div>
                                <div class="modal_accordion_panel hidden" data-category="3" id="accordion-desserts"></div>

                                <div class='mt-2'>
                                    <div class=''><i class="fas fa-shopping-cart"></i> Total: <span class='order_total'>0,00</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Informar Endereço
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="p-2 row">
                                    <div class="col-md-6 col-12">
                                        <label for='client_name' class="form-label app_font_td">Nome: (*)</label>
                                        <input type="text" class="form-control form-control-sm app_font_td" id="client_name" value='' required>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for='client_phone' class="form-label app_font_td">Contato: (*)</label>
                                        <input type="text" class="form-control form-control-sm phone app_font_td" id="client_phone" value='' required>
                                    </div>

                                    <div class="col-md-4 col-12 mt-2">
                                        <label for='zip_code' class="form-label app_font_td">Cep:</label>
                                        <input type="text" class="form-control form-control-sm zipCode app_font_td" id="zip_code" value=''>
                                    </div>
                                    
                                    <div class="col-md-4 col-12 mt-2">
                                        <label for='city' class="form-label app_font_td">Cidade: (*)</label>
                                        <input type="text" class="form-control form-control-sm app_font_td" id="city" value='' required>
                                    </div>
                                    
                                    <div class="col-md-4 col-12 mt-2">
                                        <label for='district' class="form-label app_font_td">Bairro: (*)</label>
                                        <input type="text" class="form-control form-control-sm app_font_td" id="district" value='' required>
                                    </div>
                                    
                                    <div class="col-md-10 col-12 mt-2">
                                        <label for='street' class="form-label app_font_td">Endereço: (*)</label>
                                        <input type="text" class="form-control form-control-sm app_font_td" id="street" value='' required>
                                    </div>
                                    
                                    <div class="col-md-2 col-12 mt-2">
                                        <label for='number' class="form-label app_font_td">Número: (*)</label>
                                        <input type="text" class="form-control form-control-sm app_font_td" id="number" value='' required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm btn_finalize_order">Finalizar pedido</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>