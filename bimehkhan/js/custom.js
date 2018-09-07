

$(document).ready(function () {

    // Smooth scrolling


    // Initiate superfish on nav menu
    $('.nav-menu').superfish({
        animation: {opacity: 'show'},
        speed: 400
    });

    // Mobile Navigation

    // Stick the header at top on scroll
    $("#header").sticky({topSpacing: 0, zIndex: '50'});

    // Counting numbers

    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    // Tooltip & popovers
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // Background image via data tag
    $('[data-block-bg-img]').each(function () {
        // @todo - invoke backstretch plugin if multiple images
        var $this = $(this),
            bgImg = $this.data('block-bg-img');

        $this.css('backgroundImage', 'url(' + bgImg + ')').addClass('block-bg-img');
    });

    // jQuery counterUp
    if (jQuery().counterUp) {
        $('[data-counter-up]').counterUp({
            delay: 20,
        });
    }

    //Scroll Top link
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrolltop').fadeIn();
        } else {
            $('.scrolltop').fadeOut();
        }
    });

    $('.scrolltop, #logo a').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000, 'easeInOutExpo');
        return false;
    });




    $("document").ready(function(){
        $(".tab-slider--body").hide();
        $(".tab-slider--body:first").show();
    });

    $(".tab-slider--nav li").click(function() {
        $(".tab-slider--body").hide();
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();
        if($(this).attr("rel") == "tab2"){
            $('.tab-slider--tabs').addClass('slide');
        }else{
            $('.tab-slider--tabs').removeClass('slide');
        }
        $(".tab-slider--nav li").removeClass("active");
        $(this).addClass("active");
    });

    const items = document.querySelectorAll(".accordion-a a");

    function toggleAccordion(){
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('active');
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion))







});


$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    })

    $('.Hover-img').mouseout(function () {

        $(this).animate({
            'margin-top': '0',
        }, 500)

    })


    $('.Hover-img').mouseenter(function () {

        $(this).animate({
            'margin-top': '-10px',
        }, 500)

    });


});


$(".tab_content").hide();
$(".tab_content:first").show();

/* if in tab mode */
$("ul.tabs li").click(function () {

    $(".tab_content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();

    $("ul.tabs li").removeClass("active");
    $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

});
/* if in drawer mode */
$(".tab_drawer_heading").click(function () {

    $(".tab_content").hide();
    var d_activeTab = $(this).attr("rel");
    $("#" + d_activeTab).fadeIn();

    $(".tab_drawer_heading").removeClass("d_active");
    $(this).addClass("d_active");

    $("ul.tabs li").removeClass("active");
    $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
});


/* Extra class "tab_last"
   to add border to right side
   of last tab */
$('ul.tabs li').last().addClass("tab_last");


function itpro(Number) {
    Number+= '';
    Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
    Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z= x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y= y.replace(rgx, '$1' + ',' + '$2');
    return y+ z;
}

function sum() {
    n1 = parseFloat(document.getElementById('n1').value);
    n2 = parseFloat(document.getElementById('n2').value);
    javab = document.getElementById('show').value = n1 + n2;
}
$(function () {
    $("#input1, #span1").persianDatepicker();
});
$(function () {
    $("#input2, #span1").persianDatepicker();
});
$(function () {
    $("#input3, #span1").persianDatepicker();
});
$(function () {
    $("#input4, #span1").persianDatepicker();
});
$(function () {
    $("#input5, #span1").persianDatepicker();
});
$(function () {
    $("#input6, #span1").persianDatepicker();
});
$(function () {
    $("#input7, #span1").persianDatepicker();
});
$(function () {
    $("#input8, #span1").persianDatepicker();
});
$(function () {
    $("#input15, #span1").persianDatepicker();
});

$("#input4,#input3,#input2,#input1").persianDatepicker({
    cellWidth: 42,
    cellHeight: 20,

});





//<!----------------------------------------------------------JS TAB---------------------------------->

(function($) {

    $.fn.menumaker = function(options) {

        var cssmenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            sticky: false
        }, options);

        return this.each(function() {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            $(this).find("#menu-button").on('click', function(){
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.hide().removeClass('open');
                }
                else {
                    mainmenu.show().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });

            cssmenu.find('li ul').parent().addClass('has-sub');

            multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').show();
                    }
                });
            };

            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');

            if (settings.sticky === true) cssmenu.css('position', 'fixed');

            resizeFix = function() {
                if ($( window ).width() > 768) {
                    cssmenu.find('ul').show();
                }

                if ($(window).width() <= 768) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);

        });
    };
})(jQuery);




var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();


(function($){
    $(document).ready(function(){

        $("#cssmenu").menumaker({
            title: "بیمه",
            format: "multitoggle"
        });

    });
})(jQuery);

$(function(){
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 1 ) {
            document.getElementById("ax").setAttribute("style", " height:0 ; ")
        }
    });

});
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}
$(document).ready(function(){
    $grid = $('.list').isotope({
        // options
        itemSelector: '.list__item',
        layoutMode: 'masonry',
        masonry: {
            gutter: 0
        }
    });
    // filter items on button click
    $('.js-filter').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
        $( '.js-filter button' ).removeClass( 'is-active' );
        $( this ).addClass( 'is-active' );
    });
});