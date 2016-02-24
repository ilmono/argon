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
                console.log($('#wrapper-filter-escobillas').hasClass("visible"));
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
        console.log(filterValue);
        $grid.isotope({ filter: filterValue });
    });
});