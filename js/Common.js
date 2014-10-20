$(function () {
    $('button.producto, a.producto').popover();
    $('button.producto, a.producto').on('shown.bs.popover', function(e) {
        setTimeout(function() {
            $(e.target).popover('hide');
        }, 800);
    });
    $("body").on("click", '.producto', function (e) {

        var a = $(e.target);
        
        $.ajax({
            type: "POST",
            data: {
                accion: a.data('accion').length ? a.data('accion') : '',
                id: a.data('id'),
                nombre: a.data('nombre'),
                cantidad: a.data('cantidad') ? a.data('cantidad') : 1 ,
                precio: a.data('precio'),
                categoria: a.data('categoria') ? a.data('categoria') : 1,
                descripcion: a.data('descripcion'),
                 },
            success: function (result) {
                
                recargarCarritoModal();
            }
        });
        e.preventDefault()
    });
    $("body").on("change", 'input.productoInp', function (e) {
        var a = $(e.target);

        $.ajax({
            type: "POST",
            data: {
                accion: a.data('accion'),
                id: a.data('id'),
                nombre: a.data('nombre'),
                cantidad: a.val(),
                precio: a.data('precio'),
                categoria: a.data('categoria') ? a.data('categoria') : 1,
                descripcion: a.data('descripcion')
            },
            success: function (result) {
                
                recargarCarritoModal();
            }
        });
    });
    function recargarCarritoModal(){
            $.ajax({
                    type: "POST",
                    data: {
                        accion: 'recargarModal',
                    },
                    success: function (result) {
                        if($('#carritoModal').length){
                            $('#carritoModal > div.modal-dialog > div.modal-content').replaceWith(result)
                        }else{
                            //error
                        }
                        //$('#carritoModal').modal('show');
                    }
                });
            $.ajax({
                    type: "POST",
                    data: {
                        accion: 'getNumeroArticulos',
                    },
                    success: function (result) {
                        $('#bs-example-navbar-collapse-1 > ul.nav.navbar-nav.navbar-right > button > span.badge').html(result);
                    }
                });
            if($('#CheckOut').length)
            {
                $('#CheckOutForm').submit();   
            }
    }
    /* BOOTSNIPP FULLSCREEN FIX */
    if (window.location == window.parent.location) {
        $('#back-to-bootsnipp').removeClass('hide');
        $('.alert').addClass('hide');
    } 
    
    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location = "http://bootsnipp.com/iframe/Q60Oj";
    });
    
    $('tbody > tr').on('click', function(event) {
        event.preventDefault();
        $('#myModal').modal('show');
    })
    
    $('.btn-mais-info').on('click', function(event) {
        $( '.open_info' ).toggleClass( "hide" );
    })
});