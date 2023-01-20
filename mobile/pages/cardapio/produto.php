<section class="sistema-cardapio-wrapper">
    <div class="sistema-info-wrapper">
        <div class="title-arrow-wrapper">
            <img id="product-redirect-menu" class="main-arrow-back" src="<?= DIR_IMG ?>/left.png" alt="">
            <h2 class="main-titulo-produto">Big Burguer</h2>
        </div>

        <div class="caixa-img-strong">
            <img class="img" src="<?= DIR_IMG ?>/cardapio/abuguie.jpg" alt="">
        </div>
        <div class="especificacoes-produto">
                <div class="texto-produto">
                    <img src="<?= DIR_IMG ?>/header/logo-responsivo.png" alt="" class="logo-especificacao"><h4>Pão caseiro com gergelim, dois hamburguer, arfacy, tomate, queijo, molho especial.</h4>
                </div>
                <div class="preco-produto">
                    <h5>R$ 32,99</h5>
                </div>
        </div>

        <h3 class="titulo-adicionais">Adicionais</h3>
        <div class="main-adicionais-wrapper">
            
            <ul>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Hamburguer</h5>
                        <small>R$ 4,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Queijo Prato</h5>
                        <small>R$ 2,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Queijo Cheddar</h5>
                        <small>R$ 3,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Cebola</h5>
                        <small>R$ 2,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Tomate</h5>
                        <small>R$ 2,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
                <li>
                    <div class="adicionais-info-wrapper">
                        <h5>Molho Barbie Kill</h5>
                        <small>R$ 2,00</small>
                    </div>
                    <div class="adicionais-quantidades" data-additional-id="1">
                        <button class="btn-additional-product" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                        <input id="input-additional-quantity" type="number" value="0" min="0" max="9">
                        <button class="btn-additional-product" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="quantidade-observacao">
            <div class="quantidade-grid">
                <div class="adicionais-quantidades" data-additional-id="1">
                    <button class="button-product-quantity btn-minus" data-action="diminuir"><i class="fa-solid fa-minus"></i></button>
                    <input id="input-product-quantity" type="number" value="1" min="1" max="99">
                    <button class="button-product-quantity btn-plus" data-action="adicionar"><i class="fa-solid fa-plus"></i></button>
                </div>
                <h5>Quantidade</h5>
            </div>
            <div class="quantidade-grid">
                <i class="fa-regular fa-2x fa-pen-to-square" id="button-modal-obs"></i>
                <h5>Adicionar Observação</h5>
            </div>
        </div>
        
        <div class="btn-adicionar-grid">
            <button id="adicionar-carrinho" class="btn-adicionar-carrinho">Adicionar ao carrinho  (R$ 39,90)</button>
        </div>
    </div>

    <!-- div modal -->

    <div id="main-modal-obs">
        <div id="modal-obs-close"></div>

        <div class="modal-obs-wrapper">
            <div class="obs-titulo">
                <h2>Adicionar Observação</h2>
            </div>

            <input type="text" class="input-modal-obs" placeholder="Qual a sua observação?">

            <div class="obs-button">
                <button class="obs-modal-cancelar" id="cancelar-modal-obs">Cancelar</button>
                <button class="obs-modal-enviar" id="enviar-modal-obs">Enviar</button>
            </div>
        </div>
    </div>
</section>