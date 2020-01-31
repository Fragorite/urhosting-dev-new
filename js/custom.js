/**
 *
 * ---------------------------------------------------------------------------
 *
 * Template Name:  HostBy HTML5 Template
 * Author : companyname
 * Version : 1.0
 *
 * ---------------------------------------------------------------------------
 *
 */
/*  ==================================
 *           js content
3 *    ==================================
 *
 *   1. PRELOADER
 *   2. scroll to top
 *   3. mobile menu js
 *   4. number counter
 *   5. host slider
 *   6. features tab panel
 *   7. fearture-2 tab pane
 *   8. vps tab panel
 *   9.team slider
 *   10.team slider
 *   11.Testimonial Slick Carousel
 *   12.Isotop And Masonry
 *   13. Partner Slider
 *   14. service slider
 *   15. portfolio slider
 *   16. post-widget tab panel
 *   17. google map
 *	================================== */

(function ($) {
    "use strict";

    var $main_window = $(window);
	/*====================================
	   preloader js
	======================================*/
    $main_window.on('load', function () {
        $('#preloader').fadeOut('slow');
    });
	/*====================================
		scroll to top js
	======================================*/
    $main_window.on('scroll', function () {
        if ($(this).scrollTop() > 250) {
            $('#goTop').slideDown(400);
        } else {
            $('#goTop').slideUp(400);
        }
    });
    $("#goTop").on("click", function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

	/*=======================================
	    mobile menu js
	 ======================================= */

    var $mob_menu = $("#mobile-menu");
    $(".close-menu").on("click", function () {
        $mob_menu.toggleClass("menu-hide");
    });
    $(".menu-toggle").on("click", function () {
        $mob_menu.toggleClass("menu-hide");
    });

    $("ul.navbar-nav").clone().appendTo(".mobile-menu");

    $(".mobile-menu .has-drop .nav-link").on("click",function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('current');
        $(this).next().slideToggle();
    });


	/*=======================================
	   affix  menu js
	 ======================================= */

    $main_window.on('scroll', function () {  
        var scroll = $(window).scrollTop();
        if (scroll >= 400) {
            $(".menubar").addClass("sticky-menu");
        } else {
            $(".menubar").removeClass("sticky-menu");
        }
    });

    /*=======================================
	   mobile affi  menu js
	 ======================================= */
    $main_window.on('scroll', function () {  
        var scroll = $(window).scrollTop();
        if (scroll >= 300) {
            $(".mobile-affix").addClass("sticky-menu");
        } else {
            $(".mobile-affix").removeClass("sticky-menu");
        }
    });

	/*=======================================
	    number counter
	 ======================================= */
    $('.counter').counterUp({
        delay: 10,
        time: 2000
    });

	/*====================================
	   host slider
	======================================*/
    var owlmain = $('.host-slider1');
    owlmain.owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        nav: true,
        items: 1,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>'
        ],
    });


	/*====================================
      features tab panel
	======================================*/
    if ($(".feature").length > 0) {
        $(".tabs-container a").on("click", function (event) {
            event.preventDefault();
            $('.feature-item').removeClass("current");
            $(this).parent().addClass("current");
            var tab = $(this).attr("href");
            $(".tab-pane-f").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    }

	/*====================================
        fearture-2 tab panel
	======================================*/
    if ($(".feature-2").length > 0) {
        $(".feature-list-group a").on("click", function (event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".feature-box").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    }


	/*====================================
      vps tab panel
	======================================*/
    function initProgress() {
        var activeDist = $(".slide a.active").position();
        activeDist = activeDist.left;
        $(".after").stop().animate({
            width: activeDist + "px"
        });      	
        $(".slide a.active").parent().prevAll().children('a').addClass("older-event").end().end().nextAll().children('a').removeClass('older-event');
    }

    if ($(".vps").length > 0) {
        var $vps_slide_a = $(".vps .slide a");
        initProgress();
        $vps_slide_a.on("click", function (e) {
            e.preventDefault();
            $vps_slide_a.removeClass("active");
            $(this).addClass("active");
            var tab = $(this).attr("href");
            $(".vps-content").not(tab).css("display", "none");
            $(tab).show();
            initProgress(); 
        });
        $main_window.on('resize', function () {
            initProgress();
        });
    }

	/*====================================
	  team slider
	======================================*/
    if ($(".team").length > 0) {
        var owlteam = $('.team-slider');
        owlteam.owlCarousel({
            margin: 0,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            nav: true,
            navText:
            ['<span class="team-btns prev"></span>',
            '<span class="team-btns next"></span>'],
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                922: {
                    items: 3,
                },
                1200: {
                    items: 4,
                }
            }
        });

    }


	/*------------------------------------
	    Testimonial Slick Carousel
	--------------------------------------*/
    if ($(".testimonial").length > 0) {
        $('.testi-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.testi-designation-slider',
            dots: false,
            arrows: false,
            autoplay: true,
            centerMode: true,
            focusOnSelect: true,
            centerPadding: '10px',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('.testi-designation-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            /*fade: true,*/
            cssEase: 'linear',
            dots: true,
            asNavFor: '.testi-slider'
        });
    }


	/*====================================
		Isotop And Masonry
	======================================*/

    $('.portfolio').imagesLoaded(function () {
        $('.portfolio-gallary').isotope({
            itemSelector: '.port-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.port-item'
            }
        });

        $('.portfolio-sort ul li').on("click", function () {
            $('.portfolio-sort ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-gallary').isotope({
                filter: selector
            });
            return false;
        });

        var popup_gallary = $('.portfolio-gallary');
        popup_gallary.poptrox(
            {
                usePopupNav: true,
                popupPadding: 0,
                selector: '.trox',
                popupNavPreviousSelector: '.nav-previous',
                popupNavNextSelector: '.nav-next'
            }
        );

       
    });

    $('.portfolio').imagesLoaded(function () {
        $('.blog-isotope').isotope({
            itemSelector: '.blog-mason',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.blog-mason'
            }
        });
    });
    

	/*====================================
		PARTNER SLIDER
	======================================*/
    if ($(".partner").length > 0) {
        var partner = $(".partner-slider");
        partner.owlCarousel({
            margin: 0,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                350: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                988: {
                    items: 4,
                },
                1200: {
                    items: 5,
                }
            }
        });
    }


	/*====================================
		SERVICE SLIDER
	======================================*/

    if ($(".service-2").length > 0) {

        var $service_slider = $(".service-slider");
        $service_slider.owlCarousel({
            margin: 20,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            nav: true,
            navText:
            ['<span class="service-btns prev"></span>',
            '<span class="service-btns next"></span>'],
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                450: {
                    items: 2,
                },
                922: {
                    items: 3,
                },
                1200: {
                    items: 4,
                }
            }
        });
    }

	/*====================================
	    portfolio-slider
	======================================*/
    if ($(".project-detail").length > 0) {
        var sync1 = $(".project-detail-slider");
        var sync2 = $(".thumbnail-slider");
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                dots: false,
                nav: false,
                margin: 20,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 8,
                responsiveRefreshRate: 100,
                responsiveClass: true,
                responsive:
                {
                    0: {
                        items: 3
                    },
                    567: {
                        items: 5
                    },
                    922: {
                        items: 6
                    },
                    1200: {
                        items: 8
                    }
                }
            }).on('changed.owl.carousel', syncPosition2);

        sync2.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
       }

       function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }
        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }


	/*====================================
        post-widget category
	======================================*/
    $(".cat-items h4").on("click",function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).next().slideToggle();
    });


	/*====================================
        post-widget tab panel
	======================================*/
    if ($(".post-widget").length > 0) {
        $(".post-group-item").on("click",function (event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".widget-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    }

})(jQuery);




    /*======================================
        Google map
    ====================================== */
if (document.getElementById("host-map")) {
    var myCenter = new google.maps.LatLng(-37.813628, 144.963058);

    function initialize() {
        var mapProp = {
            center: myCenter,
            scrollwheel: false,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("host-map"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.BOUNCE,
            icon: 'img/map_icon.png',
            map: map,
        });


        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
}
// map initialization code  ends
