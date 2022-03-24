jQuery(document).ready(function ($) {
    "use strict";

    //Tool top for images posts
    $('.img-grid li a, .pictures-posts a').tooltip();

    //Sticky Navbar
    (function () {
        if ($('.main-menu').hasClass('sticky-nav')) {
            $('header.main-header').imagesLoaded(
                function () {
                    var $navbar = $(".main-menu.sticky-nav"),
                        y_pos = $navbar.offset().top,
                        height = $navbar.height(),
                        top_pos = '';
                    if ($('body').hasClass('admin-bar')) {
                        top_pos = $('#wpadminbar').height();
                    } else {
                        top_pos = 0;
                    }
                    $(document).scroll(function () {
                        var scrollTop = $(this).scrollTop();
                        if (scrollTop > y_pos + height && $(window).width() > 768) {
                            $navbar.addClass("navbar-fixed").animate({
                                top: top_pos
                            });
                            $('.header-block').css({'margin-top': height});
                        } else if (scrollTop <= y_pos) {
                            $navbar.removeClass("navbar-fixed").clearQueue().animate({
                                top: '-45px'
                            }, 0);
                            $('.header-block').css({'margin-top': '0'});
                        }
                    });
                }
            )
        }
    })();

    //Mobile menu
    $("#navbar .menu,#navbar .navbar-alert").slicknav({prependTo: ".menu-mobile", label: "", allowParentLinks: !0});

    //Main carousel
    var center_slide = $("#center-slide");
    var center_box = center_slide.children().length > 1 ? !0 : !1;
    center_slide.owlCarousel({
        loop: center_box,
        nav: center_box,
        dots: center_box,
        autoplay: !0,
        items: 1,
        autoplayHoverPause: !0,
        animateIn: "fadeIn",
        animateOut: "fadeOut"
    });

    //Below main carousel posts carousel
    var top_featured_posts = $('.featured-posts-carousel');
    var top_featured_bool = top_featured_posts.children().length > 1 ? !0 : !1;
    top_featured_posts.owlCarousel({
        autoplay: true,
        loop: top_featured_bool,
        nav: false,
        dots: true,
        margin: 30,
        autoplayHoverPause: !0,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    //Sticky Sidebar
    var margin_top = '';
    if ($('body').hasClass('admin-bar') && $('.main-menu').hasClass('sticky-nav')) {
        margin_top = $('#wpadminbar').height() + $(".main-menu.sticky-nav").height();
    }
    else if (!$('body').hasClass('admin-bar') && $('.main-menu').hasClass('sticky-nav')) {
        margin_top = $(".main-menu.sticky-nav").height();
    }
    else {
        margin_top = 30;
    }
    $('.sticky-sidebar').theiaStickySidebar({
        minWidth: 992,
        additionalMarginTop: margin_top
    });

    //Gallery post format carousel
    var b = $(".single-slide"),
        i = b.children().length > 1 ? !0 : !1;
    b.owlCarousel({
        loop: i,
        nav: i,
        dots: i,
        items: 1,
        autoplay: !0,
        autoplayHoverPause: !0,
        animateIn: "fadeIn",
        animateOut: "fadeOut"
    });


    $(".singular-post").fitVids();

    //Widget Slider
    var widget_carousel = 0;
    $(".widget-carousel").each(function () {
        $(this).addClass("wid-carousel-" + widget_carousel);
        var widget_carousel_selector = $('.wid-carousel-' + widget_carousel + '.widget-carousel');
        var widget_box = widget_carousel_selector.children().length > 1 ? !0 : !1;
        widget_carousel_selector.owlCarousel({
            loop: widget_box,
            nav: widget_box,
            dots: widget_box,
            responsiveClass: true,
            autoplay: true,
            autoplayHoverPause: !0,
            items: 1,
            animateIn: "fadeIn",
            animateOut: "fadeOut"
        });
        widget_carousel++;
    });

    var bd = $(".insta-carousel"),
        ii = bd.children().length > 1 ? !0 : !1;
    bd.owlCarousel({
        loop: ii,
        nav: false,
        dots: false,
        items: 1,
        autoplay: !0,
        autoplayHoverPause: !0,
        responsive: {
            0: {
                items: 2
            },
            500: {
                items: 3
            },
            768: {
                items: 4
            },
            900: {
                items: 5
            },
            1000: {
                items: 6
            }
        }
    });

    $(".magnific-gallery").magnificPopup({
        type: "image",
        image: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><div class="mfp-img"></div><div class="mfp-bottom-bar"><div class="mfp-title"></div></div></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.'
        },
        gallery: {enabled: !0},
        removalDelay: 300,
        mainClass: "mfp-fade"
    });


    $('.widget_razz_instagram_photos').each(function () {
        $(this).magnificPopup({
            type: "image",
            delegate: '.razz-insta-gallery',
            image: {
                markup: '<div class="mfp-figure"><div class="mfp-close"></div><div class="mfp-img"></div><div class="mfp-bottom-bar"><div class="mfp-title"></div></div></div>',
                cursor: "mfp-zoom-out-cur",
                titleSrc: "title",
                verticalFit: !0,
                tError: '<a href="%url%">The image</a> could not be loaded.'
            },
            gallery: {enabled: !0},
            removalDelay: 300,
            mainClass: "mfp-fade"
        });
    });


    bd.each(function () {
        $(this).magnificPopup({
            type: "image",
            delegate: '.razz-insta-gallery',
            image: {
                markup: '<div class="mfp-figure"><div class="mfp-close"></div><div class="mfp-img"></div><div class="mfp-bottom-bar"><div class="mfp-title"></div></div></div>',
                cursor: "mfp-zoom-out-cur",
                titleSrc: "title",
                verticalFit: !0,
                tError: '<a href="%url%">The image</a> could not be loaded.'
            },
            gallery: {enabled: !0},
            removalDelay: 300,
            mainClass: "mfp-fade"
        });
    });

    if ($('body').hasClass('razz-code')) {
        $("pre code").each(function (e, a) {
            hljs.highlightBlock(a)
        });
    }

    //Scroll to top
    $(window).scroll(function () {
        $(this).scrollTop() > 250 ? $("#scroll").fadeIn() : $("#scroll").fadeOut();
    });
    $("#scroll").click(function () {
        return $("html, body").animate({scrollTop: 0}, 800), !1
    });
});