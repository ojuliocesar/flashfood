$(document).ready(function() {
    $('.main-dashboard-aside li').click(function(event) {
        
        var item = event.target.closest('li');
        
        if ($(item).hasClass('active')) {
            $(item).removeClass('active');
            
        } else {
            $('.main-dashboard-aside li').removeClass('active');
            
            $(item).addClass('active');
        }
    });

    $('#create-price').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false, allowZero: true, defaultZero: false}).attr('maxlength', 11);
    
    $('#create-special-price').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false}).attr('maxlength', 11);
});

const changeStatus = (id, action) => {
    statusData = {
        statusId: id,
        statusAction: action
    }

    $.ajax({
        url: API_URL + 'api/?api=changeStatus',
        type: 'POST',
        data: { statusData },
        dataType: 'json',
        success: function (data, status, xhr) {
            var checked = $(event.target).prop('checked')
            $(event.target).prop('checked', !checked);

            Swal.fire({
                icon: 'success',
                title: 'Foi',
                text: `${action == 'product' ? 'Produto alterado' : 'Categoria alterada'} com sucesso!`
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Eita!',
                text: data
            })
        }
    });
}