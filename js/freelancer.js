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
        if(filterValue === ''){
            filterValue = filterValueType;
        }
        $grid.isotope({ filter: filterValue });
    });

    $('.p-search').on( 'click', '.filter-now', function() {
        var filterValue = $('#search-point').val();
        if(filterValue == ''){
            filterValue = '*';
        }else{
            filterValue = '.' + filterValue.replace(' ', '-').toUpperCase();
        }
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

function explode(){
    if($('#logo-1').hasClass("visible")){
        $('#logo-2').fadeIn();
        $('#logo-1').fadeOut('slow', function () {
            $('#logo-2').addClass('visible');
            $('#logo-1').removeClass('visible');
        });

    }else{
        $('#logo-1').fadeIn();
        $('#logo-2').fadeOut('slow', function () {
            $('#logo-1').addClass('visible');
            $('#logo-2').removeClass('visible');
        });
    }
    setTimeout(explode, 8000);
}
setTimeout(explode, 8000);
