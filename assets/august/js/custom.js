(function ($) {
    'use strict';

    var windo = $(window),
        HtmlBody = $('html, body');

    /* pre-loader */
    windo.on('load', function () {
        $('#pre-loader').delay(1000).fadeOut(600);
    });

    /* IsToTop Button */
    var istotop = $('#istotop');
    istotop.on('click', function () {
        HtmlBody.animate({
            scrollTop: 0
        }, 2000);
    });

    /* navigation scroll */
    var navscrl = $('#navigation');

    // Scroll function
    windo.on('scroll', function () {
        var scrltop = windo.scrollTop();
        if (scrltop > 400) {
            navscrl.addClass('nav-scrl').fadeIn(8000);
        } else {
            navscrl.removeClass('nav-scrl');
        }
        // istoptop 
        if (scrltop > 400) {
            istotop.fadeIn();
        } else {
            istotop.fadeOut();
        }
    });

    /* Landing page scroll spy */
    $('body').scrollspy({
        target: '#navigation',
        offset: 80
    });

    /* nav window search */
    var searchbar = $(".search-bar");
    searchbar.on('click', function () {
        var searchbox = $(".search-box");
        searchbox.toggle();
    });


    /* Smooth Scroll */
    $('a[href*="#"]:not([href="#').on('click', function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                HtmlBody.animate({
                    scrollTop: target.offset().top - 70
                }, 1000);
                return false;
            }
        }
    });

    /* =============== Plugin js Start ============== */

    /* sliders js start */
    /* banner slider owl Start*/
    var owl = $('.owl-carousel.banner-active');
    owl.owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 0,
        autoHeight: true,
        smartSpeed: 500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    });

    // Go to the next item
    $('.owl-next').on('click', function () {
        owl.trigger('next.owl.carousel', [900]);
    });
    // Go to the previous item
    $('.owl-prev').on('click', function () {
        owl.trigger('prev.owl.carousel', [900]);
    });

    // baner bg img set
    $(".owl-item.banner-item").each(function () {
        var Main = $(this).find('.item-bg img').attr('src');

        $(this).css({
            background: 'url(' + Main + ')'
        });
    });

    // prev and next
    function SliderArrow() {
        $('.owl-item').removeClass('prev next');

        var ActiveSlider = $('.banner-active .owl-item.active');
        ActiveSlider.next('.banner-active .owl-item').addClass('next');
        ActiveSlider.prev('.banner-active .owl-item').addClass('prev');

        var nextSlide = $('.banner-active .owl-item.next').find('.item-bg img').attr('src'),
            prevSlide = $('.banner-active .owl-item.prev').find('.item-bg img').attr('src');

        $('.banner-owl-nav .owl-prev').css({
            background: 'url(' + prevSlide + ')'
        });

        $('.banner-owl-nav .owl-next').css({
            background: 'url(' + nextSlide + ')'
        });
    }

    SliderArrow();

    owl.on('translated.owl.carousel', function () {
        SliderArrow();
    });

    // banner caption animation
    owl.on('translate.owl.carousel', function () {
        $('.banner-active .owl-item h4').removeClass('animated fadeInDown').hide();
        $('.banner-active .owl-item h3').removeClass('animated fadeInDown').hide();
        $('.banner-active .owl-item p').removeClass('animated fadeInDown').hide();
        $('.banner-active .owl-item a').removeClass('animated fadeInDown').hide();
    });

    owl.on('translated.owl.carousel', function () {
        $('.banner-active .owl-item.active h4').addClass('animated fadeInDown').show();
        $('.banner-active .owl-item.active h3').addClass('animated fadeInDown').show();
        $('.banner-active .owl-item.active p').addClass('animated fadeInDown').show();
        $('.banner-active .owl-item.active a').addClass('animated fadeInDown').show();
    });
    // single item slider
    var singleSlider = $('.single-slider');
    singleSlider.owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        autoplayTimeout: 5000,
        smartSpeed: 1000
    });
    /* banner slider owl js end */

    /* Testomonial slider owl start */
    var testimonialSlider = $('.testimonial-active');
    testimonialSlider.owlCarousel({
        items: 1,
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        smartSpeed: 800,
        autoHeight: true,
        autoplayHoverPause: true
    });

    /* blog slider Owl js Start */
    var blogSlider = $('.blog-active');
    blogSlider.owlCarousel({
        items: 3,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: false,
        dots: true,
        smartSpeed: 600,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }

        }
    });
    // blog control
    $('.blog-next').on('click', function () {
        blogSlider.trigger('next.owl.carousel', [700]);
    });
    $('.blog-prev').on('click', function () {
        blogSlider.trigger('prev.owl.carousel', [700]);
    });

    /* partner owl slider  js */
    var partnerSlider = $('.partner-active');
    partnerSlider.owlCarousel({
        items: 5,
        autoplay: true,
        autoplayTimeout: 4000,
        navText: true,
        dots: true,
        loop: true,
        rtl: true,
        slideBy: 5,
        smartSpeed: 700,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1
            },
            576: {
                items: 2,
                slideBy: 2
            },
            768: {
                items: 3,
                slideBy: 3
            },
            992: {
                items: 4,
                slideBy: 4
            },
            1200: {
                items: 5,
                slideBy: 5
            }
        }
    });
    //	partner Control
    $('.partner-next').on('click', function () {
        partnerSlider.trigger('next.owl.carousel', [700]);
    });
    $('.partner-prev').on('click', function () {
        partnerSlider.trigger('prev.owl.carousel', [700]);
    });

    /* About video venobox */
    $('.venobox-video').venobox({
        autoplay: true,
        closeColor: '#ffffff',
        spinner: 'double-bounce'
    });

    /* venobox gallary images */
    $('.venobox-image').venobox();

    /* Countdown coming-soon js Start */
    var countDown = $('.countdown');
    countDown.countdown('2018/02/21 12:01:00', function (event) {
        $(this).html(event.strftime('' +
            '<span>%d</span> days ' +
            '<span>%H</span> hr ' +
            '<span>%M</span> min ' +
            '<span>%S</span> sec'));
    });

    /* Isotope js start */
    var grid = $(".grid"),
        isotopeFunc = grid.isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });
    var filtercat = $('.filter-cato li');
    filtercat.on('click', function () {
        filtercat.removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        grid.isotope({
            filter: selector
        });
    });

    //     img load
    isotopeFunc.imagesLoaded().progress(function () {
        isotopeFunc.isotope('layout');
    });

    /* Stellar js Start */
    //    var parallax = $('.parallax-img');
    //    windo.stellar.positionProperty.position = {
    //        setTop: function () {
    //            parallax.css('top', '0');
    //        },
    //        setLeft: function () {
    //            parallax.css('left', '0');
    //        }
    //    }
    windo.stellar({
        responsive: true,
        positionProperty: 'position',
        scrollProperty: 'scroll',
        horizontalScrolling: false,
        parallaxElements: true,
        hideDistantElement: false,
    });

    windo.data('plugin_stellar').refresh();

    /* Counter js Start */
    $('.count-now').counterUp({
        delay: 30,
        time: 2000
    });
    /* =============== Plugin js End ============== */

    // Template Buy link url place by js
    $('#purchase-fixed').find('a').attr('href', 'https://themeforest.net/item/august-corporate-business-consulting-agency-and-startup-multipurpose-template/20933064');

    //    $('#purchase-fixed').css('display', 'none');

})(jQuery);
