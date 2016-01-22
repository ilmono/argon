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

    $('.filter-button-group').on( 'click', '.btn-filtros', function() {
        var filterValue = $(this).attr('data-filter');
        console.log(filterValue);
        $grid.isotope({ filter: filterValue });
        switch (filterValue){
            case '.campo':
                $('#campo-filter').show();
                break;
            case '.carbon':
                $('#campo-filter').hide();
                break;
            case '*':
                $('#campo-filter').show();
                break;
        }
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
        console.log(filterValue);
        $grid.isotope({ filter: filterValue });
    });

});