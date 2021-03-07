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

        /** Background Sound */
        toggle_bg_sound: function() {

            $('#page-controls .page-control.sound-bars').on( 'click' , function(e) {
                e.preventDefault();

                let background_audio = $('.hero-header audio')[0]
                let is_active = $(this).hasClass('active')

                if (is_active) {
                    $(this).removeClass('active')
                    background_audio.pause()
                } else {
                    $(this).addClass('active')
                    background_audio.play()
                }
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
                animationOut: { opacity:'hide', top: "260%" },
                speed: 'fast',
                delay: 600,
            });

		},

		/** Full Screen Menu */
		full_screen_menu: function() {
            // Copy All Sub Menus
            $('#full-screen-menu .sub-menu').each(function(){
                var child_menu_id = $(this).parent().attr('class').split(' ').pop(); // grab child menu ID
                $(this).appendTo('.child-menus').addClass('overlay-menu').wrap('<div class="child-menu-wrap" data-id="' + child_menu_id + '" />'); // clone child menu to another DIV
            });
            
            // Click Handling on Root Menu
            $('#full-screen-menu li.menu-item-has-children a').on('click', function() {
                $('#full-screen-menu').addClass('hide') // hide the root menu
                let child_menu_id = $(this).parent().attr('class').split(' ').pop() // grab child menu ID
                $(".child-menus .child-menu-wrap").removeClass('active') // hide any child menu if visible
                $(".child-menus .child-menu-wrap[data-id='" + child_menu_id +"']").addClass('active') // show only required child menu
                $('#responsive-menu .go-back').data('node', ['root']).addClass('active') // add parent menu history to "go-back" link
            });

            // Click Handling on Child Items
            $('.child-menus li.menu-item-has-children a').on('click', function() {
                let child_menu_id = $(this).parent().attr('class').split(' ').pop() // grab child menu ID
                $(".child-menus .child-menu-wrap").removeClass('active') // hide any child menu if visible
                $(".child-menus .child-menu-wrap[data-id='" + child_menu_id +"']").addClass('active')  // show only required child menu
                
                let parent_id = $(this).parents('.child-menu-wrap').data('id') // determine parent ID of child menu
                $('#responsive-menu .go-back').data('node').push(parent_id) // add parent menu history to "go-back" link
            });

            // Click Handling on Go Back Button
            $('#responsive-menu .go-back').on('click', function() {
                let prev_node = $(this).data('node').pop() // grab the last parent item ID
                
                if (prev_node == 'root') {
                    $('#full-screen-menu').removeClass('hide')
                    $(".child-menus .child-menu-wrap").removeClass('active')
                    $('#responsive-menu .go-back').removeClass('active')
                } else {
                    $(".child-menus .child-menu-wrap").removeClass('active');
                    $(".child-menus .child-menu-wrap[data-id='" + prev_node +"']").addClass('active');
                }
            })

		},

		/** Site Overlay */
		site_overlay: function() {

            //horizontal swipe menu
            var init = {

                openModal: function(type){
                    $('html').addClass('noscroll-only');
                    
                    if ( type == 'search' ) {
                        $('#search-filter, #search-filter .widget-wrap, #site-clipboard .close-link').addClass('animate-in');
                    } else if ( type == 'menu' ) {
                        $('#responsive-menu, #full-screen-menu, .menu-caption, #site-clipboard .close-link').addClass('animate-in');
                    }
                },

                closeModal: function(){
                    $('#search-filter, #search-filter .widget-wrap, #responsive-menu, #full-screen-menu, .menu-caption, #site-clipboard .close-link').removeClass('animate-in');
                    $('html').removeClass('noscroll-only');
                }

            }			

            // open search modal window
            $('#site-header .search-icon a').on( 'click' , function(e) {
                e.preventDefault();
                init.openModal('search');
            });

             // trigger fullscreen functionality
             $('#site-header .fullscreen-icon a').on( 'click' , function(e) {
                e.preventDefault();

                let is_fullscreen = document.fullscreenElement

                if (is_fullscreen) {
                    // $(this).removeClass('active')
                    document.exitFullscreen();
                    $('i', this).addClass('fi-fullscreen').removeClass('fi-smallscreen')
                } else {
                    $('i', this).removeClass('fi-fullscreen').addClass('fi-smallscreen')
                    document.documentElement.requestFullscreen();
                }
            });

            // open menu modal window
            $('#site-header .menu-icon a').on( 'click' , function(e) {
                e.preventDefault();
                init.openModal('menu');
            });

            // close modal window
            $('#site-clipboard .close-link').on( 'click' , function(e) {
                e.preventDefault();
                init.closeModal();
            });

        },

        /** Header Elements */
        header_elements: function() {

            // remove positional classes from all elements
            $('#site-header .left-elements .element').removeClass('first-element')
            $('#site-header .right-elements .element').removeClass('last-element')

            // add positional classes to visible elements
            $('#site-header .left-elements .element:visible:first').addClass('first-element')
            $('#site-header .right-elements .element:visible:last').addClass('last-element')

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

            if (false) {

                let gallery_links = $('.wp-gallery a[rel="lightbox"], .portfolio-grid .portfolio > a[rel="lightbox"], .elementor-image a')

                gallery_links.fancybox({
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

    // Initialize Functions
    base.site_preloader();
    base.scroll_position();
    base.toggle_bg_sound();
    base.site_notification();
    base.site_menu();
    base.full_screen_menu();
    base.site_overlay();
    base.header_elements();
    base.sticky_header();
    base.page_header();
    base.custom_cursor();
    base.lightbox();

    $(window).on('resize', function () {
        base.header_elements();
    })
})
