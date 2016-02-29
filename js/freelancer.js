/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

$(document).ready(function() {
    // init Isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'masonry',
        masonry: {
            columnWidth: 0
        },
        cellsByRow: {
            columnWidth: 220,
            rowHeight: 220
        },
        masonryHorizontal: {
            rowHeight: 110
        },
        cellsByColumn: {
            columnWidth: 220,
            rowHeight: 220
        }
    });

    function showandhide(type){
        $( '.wrapper-filter').hide("slow");
        $(".chk-filtros").prop("checked", false);
        if(type === 'campos'){
            $('#wrapper-filter-carbones').show();
            $('#wrapper-filter-carbones').addClass('visible');
            $('#wrapper-filter-escobillas').removeClass('visible');
        }else if(type === 'escobillas'){
            $( '#wrapper-filter-escobillas').show();
            $('#wrapper-filter-escobillas').addClass('visible');
            $('#wrapper-filter-carbones').removeClass('visible');
        }else{
            $( '.wrapper-filter').hide("slow");
            $('#wrapper-filter-carbones').removeClass('visible');
            $('#wrapper-filter-escobillas').removeClass('visible');
        }
    }

    $('.filter-button-group').on( 'click', '.btn-filtros', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
        $('#type-filter').val(filterValue);
        switch (filterValue){
            case '.campo':
                if(!$('#wrapper-filter-carbones').hasClass("visible")){
                    showandhide('campos');
                }
                break;
            case '.carbon':
                if(!$('#wrapper-filter-escobillas').hasClass("visible")){
                    showandhide('escobillas');
                }
                break;
            case '*':
                showandhide('');
                break;
        }
    });

    $('.filter-button-group').on( 'click', '.chk-filtros', function() {
        var filterValue = '';
        filterValueType = $('#type-filter').val();
        $('.chk-filtros:checked').each(function(){
            if(filterValue === ''){
                filterValue += '.' + $(this).attr('data-filter') + filterValueType;
            }else {
                filterValue += ', .' + $(this).attr('data-filter') + filterValueType;
            }
        });
        $grid.isotope({ filter: filterValue });
    });

    $('.filter-button-group').on( 'click', '.chk-filtros', function() {
        var filterValue = '';
        $('.chk-filtros:checked').each(function(){
            if(filterValue === ''){
                filterValue += '.' + $(this).attr('data-filter');
            }else {
                filterValue += ', .' + $(this).attr('data-filter');
            }
        });
        $grid.isotope({ filter: filterValue });
    });

});


/*Custom Fuctions*/
function showandhidePedidos(type){
    if(type === 'show'){
        $('#link-realizar-pedidos').hide();
        $('#link-cancelar-pedidos').show();
        $('.btn_agregar').show();
        $('.container-pedido').slideDown();
    }else{
        $('#link-cancelar-pedidos').hide();
        $('#link-realizar-pedidos').show();
        $('.btn_agregar').hide();
        $('.container-pedido').slideUp();
    }
}

function addItem(id, type){

    var newNode = '<a id="item-' + id + '" class="list-group-item">' +
        '<span onclick="delItem('+id+')" class="glyphicon glyphicon-minus-sign"></span>  ' + type + ': ' + id  + ' <span class="badge item-list"><input class="input-pedido-data" name="pedido[' + type + '][' + id  + '][nombre]" type="hidden" value="' + type + ' N°: ' + id  + '">cant:<input class="input-pedido-cantidad" name="pedido[' + type + '][' + id  + '][cantidad]" value="0" type="text"></span>' +
        '</a>';

    $('#list-pedido').append(newNode);
}

function delItem(id){
    $('#item-'+id).remove();
}

/*
$(function(){
    //enfocamos el campo para digitar nombres (cuestion de usabilidad)
    $('#txtNombre').focus();
    alert('No es posible agregar el elemento. Se permiten solamente '+iLimite+'.');
    //evento al hacer clic en el boton agregar
    $('#btnAgregar').on('click',function(){
        //obtenemos el nombre digitado por el usuario, y el limite establecido
        //con la funcion parseInt() convertimos de texto a numero
        var $txtNombre=$('#txtNombre'), iLimite=parseInt($('#selLimite').val());

        //verificamos que el campo nombre no este vacio
        if($.trim($txtNombre.val())!=''){
            //variable para contener la lista html
            var $ulLista;
            //si la lista html no existe entonces la agregamos al dom
            if(!$('#divLista').find('ul').length){
                $('#divLista').append('<ul/>');
            }

            //obtenemos una instancia de la lista
            $ulLista=$('#divLista').find('ul');

            //verificamos el limite de elementos
            if($ulLista.find('li').length < iLimite || iLimite==0){
                //creamos el item que va a contener el nombre y el boton eliminar
                var $liNuevoNombre=$('<li/>').html('<a class="clsEliminarElemento">&nbsp;</a>'+$.trim($txtNombre.val()));

                //verificamos la posicion en la que debemos agregar el nuevo elemento (inicio o final de la lista)
                if($('#chkAgregarAlInicio').is(':checked')){
                    //agregamos el elemento al inicio (con prepend)
                    $ulLista.prepend($liNuevoNombre);
                }else{
                    //agregamos el elemento al final de la lista (con append)
                    $ulLista.append($liNuevoNombre);
                }
                //no se pueden agregar mas elementos, debido al limite establecido
            }else{
                alert('No es posible agregar el elemento. Se permiten solamente '+iLimite+'.');
            }
            //el campo nombre esta vacio
        }else{
            alert('Por favor, digite el nombre que desea agregar a la lista.')
        }
        //limpiamos el campo nombre y lo enfocamos
        $txtNombre.val('').focus();
    });

    //evento al hacer clic en el boton eliminar de cada item de la lista
    //se debe usar "live", ya que son elementos generados donamicamente
    $('.clsEliminarElemento').live('click',function(){
        //buscamos la lista
        var $ulLista=$('#divLista').find('ul');
        //buscamos el padre del boton (el tag li en el que se encuentra)
        var $liPadre=$($(this).parents().get(0));

        //eliminamos el elemento
        $liPadre.remove();
        //si la listaesta vacia entonces la eliminamos del dom
        if($ulLista.find('li').length==0) $ulLista.remove();
    });

    //eliminamos los elementos impares en la lista (odd)
    $('#btnEliminarPares').on('click',function(){
        $('#divLista ul li:odd').remove();
    });

    //eliminamos los elementos pares en la lista (even)
    $('#btnEliminarImpares').on('click',function(){
        $('#divLista ul li:even').remove();
    });

    //eliminamos la lista del dom
    $('#btnEliminarTodo').on('click',function(){
        $('#divLista ul').remove();
    });

    //al presionar <ENTER> sobre el campo txtNombre llamamos al boton (usabilidad otra vez)
    $('#txtNombre').on('keypress',function(eEvento){
        if(eEvento.which==13) $('#btnAgregar').trigger('click');
    });
});*/