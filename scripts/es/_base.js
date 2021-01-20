// Export Functions
export default jQuery(function($) {
    'use strict';

    /** Viewport dimensions */
	var ww = $(window).width();
	var wh = $(window).height();

    // Functions Object
    var base = {

        /** Scroll Position */
        scroll_position: function() {
            // initial postion on page load
			$(document).ready(function(){
				$(this).scrollTop(0);
			});

			// scroll indicator click handler
			$('#page-header .scroll-indicator > a').smoothScroll();

			// go to top click handler
			$('#page-controls .page-control.go-top').smoothScroll({
				offset: -150,
				speed: 600
			});
        },
        
        /** Site Notification */
        site_notification: function() {

            // initial postion on page load
            $('#page-controls .page-control.notification, a[href^="#trigger-notification"]').on( 'click' , function(e) {
                e.preventDefault();
                $('#site-notification').addClass('animate-in');
            });

            // initial postion on page load
            $('#site-notification .close').on( 'click' , function(e) {
                e.preventDefault();
                $('#site-notification').removeClass('animate-in');
            });

        },

        /** Site Preloader */
		site_preloader: function() {

			$('.preloader').fadeOut();

		},

		/** Site Menu */
		site_menu: function() {

			// Traditional Menu
            $('ul.sf-menu').superfish({
                animation: { opacity: 'show', top: "220%" },
                animationOut: {opacity:'hide', top: "260%" },
                speed: 'fast',
                delay: 600,
            });

            // Modern Menu
            // $('#mobile-menu .tn-menu').tendina({
            // 	speed: 200,
            // });

		},


		/** Site Overlay */
		site_overlay: function() {

            //horizontal swipe menu
            var init = {

                openModal: function(type){
                    if ( type == 'search' ) {
                        $('#search-filter, #search-filter .widget-wrap, #site-clipboard .close-link').addClass('animate-in');
                    } else if ( type == 'menu' ) {
                        $('#mobile-menu, #mobile-menu .tn-menu, .menu-caption, #site-clipboard .close-link').addClass('animate-in');
                    }
                },

                closeModal: function(){
                    $('#search-filter, #search-filter .widget-wrap, #mobile-menu, #mobile-menu .tn-menu, .menu-caption, #site-clipboard .close-link').removeClass('animate-in');
                }

            }			

            // open search modal window
            $('ul#icons-menu li.search-icon a').on( 'click' , function(e) {
                e.preventDefault();
                init.openModal('search');
            });

            // open menu modal window
            $('ul#icons-menu li.menu-icon a').on( 'click' , function(e) {
                e.preventDefault();
                init.openModal('menu');
            });

            // close modal window
            $('#site-clipboard .close-link').on( 'click' , function(e) {
                e.preventDefault();
                init.closeModal();
            });

        },

        /** Sticky Header */
        sticky_header: function() {

            $('#site-header').headroom({
                offset : 300,
                onUnpin : function() {
                    setTimeout(function (){
                        $('#site-header').addClass('animate-out');
                    }, 400);
                },
                onTop : function() {
                    $('#site-header').removeClass('animate-out');
                },
            });

        },

        /** Page Header */
        page_header: function() {

            var site_header_h = $('#site-header').outerHeight(true);
            var main_content_m = parseInt( $('#main-content').css('margin-top') );
            var page_header_h = wh - (site_header_h + main_content_m);

            $('#page-header.fullscreen').height(page_header_h)

        },

        /** Custom Cursor */
        custom_cursor: function() {

            const cursor = $('.cursor');

            $(document).on("mousemove", function (e) {
                cursor.css('top',  e.pageY - 10 + "px");
                cursor.css('left',  e.pageX - 10 + "px");
            });

            $("a").on("mouseover", function () {
                cursor.addClass('hover')
            });
            $("a").on("mouseout", function () {
                cursor.removeClass('hover')
            });

        },

        /** Lightbox */
        lightbox: function() {

            var is_fancybox = $('body').hasClass('is-fancybox-enabled');

            if (is_fancybox) {

                $('.portfolio-grid .portfolio > a[rel="lightbox"], .elementor-image a').fancybox({
                    padding : 0,
                    helpers : {
                        title   : {
                            type: 'inside'
                        },
                        thumbs  : {
                            width   : 65,
                            height  : 65
                        },
                        media : {}
                    },
                    beforeLoad: function() {
                        this.title = $(this.element).data('caption');
                    }
                });
            }

        },


    }  

    $(window).on('load', function() {
        base.scroll_position();
        base.site_notification();
        base.site_preloader();
        base.site_menu();
        base.site_overlay();
        // base.sticky_header();
        base.page_header();
        base.custom_cursor();
        base.lightbox();
    }); 
})
