// Modal Observação
$('#button-modal-obs').click(function(){
    $('#main-modal-obs').show()
})

$('#cancelar-modal-obs,#modal-obs-close').click(function(){
    $('#main-modal-obs').hide()
    $('.input-modal-obs').val("")
})

$('#enviar-modal-obs').click(function(){
    $('#main-modal-obs').toggle()
})

// Modal Menu Hamburguer
$('.header-menu-wrapper #header-burguer-icon').click(function() {
    $('#modal-header-menu').css('display', 'flex');

    $('#modal-header-menu .modal-wrapper').addClass('header-menu-animation');
}) 

$('#modal-header-menu #close-modal-header,#header-menu-close').click(function() {
    $('#modal-header-menu').hide();
})

$('.header-responsivo .header-search-wrapper .header-button-search').click(function() {
    let inputWidth = $('.header-responsivo .header-search-wrapper input').css('width');

    if (inputWidth == '65px') {
        $('.header-responsivo .header-search-wrapper').css('width', '100%');

        $('.header-responsivo > a img').css('opacity', '0');

        $('.header-responsivo .header-search-wrapper input').css('width', 'calc(100% - 15px)');
    } else {
        $('.header-responsivo > a img').css('opacity', '1');

        $('.header-responsivo .header-search-wrapper input').css('width', '65px');

        $('.header-responsivo .header-search-wrapper').css('width', '65px');
    }
})

$('.itens-cardapio').click(function(){
    let productSlug = $(this).data('product-slug');

    window.location.href = `?page=menu&action=product&slug=${productSlug}`;
})

const readCartIcon = () => {
    const result = fetch(`${SERVER_HOST}/api/?api=cart&action=listCart`)
    .then((response) => response.json())
    .then((result) => {

        if (result.readCart.length) {
            $('.floating-button-cart').css('display', 'flex');
            
            $('.floating-button-cart span').html(result.readCart.length);
        }

    })
}