$(document).ready(function() {

    $('#menu-search').keyup(function(event) {
        
        delay(function() {
            var search = event.target.value.toLowerCase();
    
            readProducts(search);
        }, 500);

    });

    // Show Orders Modal
    $('.show-modal-product').click(function() {

        let productId = $(this).data('product-id');

        $.ajax({
            url: API_URL + 'api/?api=products&action=listProductById',
            type: 'POST',
            data: {productId},
            dataType: 'json',
            success: function (data) {

                let additionals = data.additionals.map(function(additional) {
                    return (`<li>
                            <input type="checkbox" name="checkboxAdditional" data-additional-id="${additional.additional_id}">
                            <label>${additional.name}</label>
                        </li>`)
                })

                $('#modal-orders .main-modal-wrapper').html('');

                $('#modal-orders .main-modal-wrapper').append(`

                    <div class="header">
                        <img src="${API_URL}assets/images/products/${data.banner}" alt="">
                        <i class="fa-solid fa-xmark icon-exit"></i>
                    </div>

                    <div class="main-item-modal -orders">
                        <div class="modal-orders-items-wrapper">
                            <h2>${data.name}</h2>
                            <small>${data.description}</small>
                            ${data.additionals.length ? `
                                <div>
                                    <h4>Adicionais</h4>
                                    
                                    <ul>
                                        ${additionals.join('')}
                                    </ul>
                                </div>`
                            : ''}
                        </div>

                        <button class="button-order success" id="button-add-cart" data-product-id="${data.product_id}">Adicionar ao Carrinho</button>
                    </div>

                `)

                $('#modal-orders').show();

            },
            error: function (jqXhr, textStatus, errorMessage) {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Um problema inesperado aconteceu. Avise os administradores o mais rápido possível!',
                    icon: 'error'
                })
            }
        });

    });

    $('body').on('click', '#button-add-cart', (function() {
        
        let productId = $(this).data('product-id');

        let additionals = []

        let checkbox = $('input[name=checkboxAdditional]:checked');

        if (checkbox.length) {
            checkbox.map(function(_, additional) {

                additionals = [...additionals, additional.dataset.additionalId]
            });
        }

        $.ajax({
            url: API_URL + 'api/?api=cart&action=insertCart',
            type: 'POST',
            data: {
                productId: productId, additionals: additionals
            },
            dataType: 'json',
            success: function (data) {

                readIconCart();

                data.response && $('#modal-orders').hide();

                Swal.fire({
                    title: data.response ? 'Sucesso!' : 'Oops...',
                    text: data.message,
                    icon: data.response ? 'success' : 'info'
                })
            },
            error: function (jqXhr, textStatus, errorMessage) {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Um problema inesperado aconteceu. Avise os administradores o mais rápido possível!',
                    icon: 'error'
                })
            }
        });

        readCart();

    }));

    // read
    const readProducts = (search) => {
        $.ajax({
            url: API_URL + `api/?api=products&action=listProductsOrders&search=${search}`,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {

                $('#read-menu-wrapper').html('');
    
                data.length ? data.map(category => {

                    let products = category.products.map(function(product) {
                        return (`
                            <div class="main-orders-item">
                                <a href="#">
                                    <div class="products-image-wrapper">
                                        <img src="${API_URL}/assets/images/products/${product.banner}">
                                        <button type="button" class="show-modal-product"><i class="fa-solid fa-plus"></i></button>
                                    </div>

                                    <strong>${product.name}</strong>
                                    <p>R$ ${Number(product.special_price).toFixed(2).replace('.', ',')}</p>
                                </a>   
                            </div>
                        `)
                    })
                
                    $('#read-menu-wrapper').append(`

                        <li class="main-orders">
                            <div class="menu-category-wrapper">
                                <h3>${category.name}</h3>
                                ${category.products.length >= 4 ? '<a href="#">Ver todos</a>' : '' }
                            </div>

                            <div class="owl-carousel owl-theme">
                                ${products.join('')}
                            </div>
                        </li>
                    `)
                }) : $('#read-menu-wrapper').append('<li class="search-not-found"><i class="fa-solid fa-triangle-exclamation"></i> A sua pesquisa não retornou resultados</li>')

                $('.owl-carousel').owlCarousel({
                    loop: false,
                    animateOut: 'slideOutDown',
                    animateIn: 'flipInX',
                    nav: true,
                    smartSpeed:450,
                    margin: 15,
                    nav:true,
                    lazyLoad: true,
                    autoplay:true,
                    autoplayTimeout:5500,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:4
                        }
                    }
                });
    
            },
            error: function (jqXhr, textStatus, errorMessage) {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Um problema inesperado aconteceu. Avise os administradores o mais rápido possível!',
                    icon: 'error'
                })
            }
        });
    }

    const readIconCart = () => {
        $.ajax({
            url: API_URL + 'api/?api=cart&action=listCart',
            dataType: 'json',
            success: function (data) {
                $('#icon-count-cart-items').html(data.length);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Um problema inesperado aconteceu. Avise os administradores o mais rápido possível!',
                    icon: 'error'
                })
            }
        });
    }
})