
(function($) {
    'use strict';

    // back to top button :

    $(window).scroll(function() {
        console.log($(window).scrollTop());
        if ($(window).scrollTop() > 1000) {
            $('#button').addClass('show');
        } else {
            $('#button').removeClass('show');
        }
    });


    // Main Navigation
    $( '.hamburger-menu' ).on( 'click', function() {
        $(this).toggleClass('open');
        $('.site-navigation').toggleClass('show');
    });

    $('body').on('click',function (e) {
        let clickedClass = $(e.target).attr('class');
        if(clickedClass === 'menu-span'){
            return;
        }
        if($('.hamburger-menu').hasClass('open')){
            $('.hamburger-menu').toggleClass('open');
            $('.site-navigation').toggleClass('show');
        }
    });
    // Testimonial Slider
    var swiper = new Swiper('.testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: 'fade',
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });

    $('.gallery-wrap').masonry({
        itemSelector: '.gallery-grid'
    });

    // Accordion & Toggle
    $('.accordion-wrap.type-accordion').collapsible({
        accordion: true,
        contentOpen: 0,
        arrowRclass: 'arrow-r',
        arrowDclass: 'arrow-d'
    });

    $('.accordion-wrap .entry-title').on('click', function() {
        $('.accordion-wrap .entry-title').removeClass('active');
        $(this).addClass('active');
    });

    // change background images
    var bgImageArray = ["images/main-min.jpg", "images/cover-3-min.jpg", "images/cover-4-min.jpg"],
        base = "/",
        secs = 4;
    bgImageArray.forEach(function(img){
        new Image().src = base + img;
        // caches images, avoiding white flash between background replacements
    });

    function backgroundSequence() {
        window.clearTimeout();
        var k = 0;
        for (var i = 0; i < bgImageArray.length; i++) {
            setTimeout(function(){
                if(!$('#mainSection').length > 0){
                    return;
                }
                document.getElementById('mainSection').style.background = "url(" + base + bgImageArray[k] + ") no-repeat center center fixed";
                document.getElementById('mainSection').style.backgroundSize ="cover";
                if ((k + 1) === bgImageArray.length) { setTimeout(function() { backgroundSequence() }, (secs * 1000))} else { k++; }
            }, (secs * 1000) * i)
        }
    }
    backgroundSequence();

    if($(window.location.hash).length > 0){
        $('html, body').animate({ scrollTop: $(window.location.hash).offset().top}, 1000);
    }

    $('a[href^="#"]').bind('click.smoothscroll',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);

        $('html, body').stop().animate( {
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        } );
    } );

})(jQuery);
