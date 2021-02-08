// Export Functions
export default jQuery(function($) {
    'use strict';

    /** Viewport dimensions */
	var ww = $(window).width();
	var wh = $(window).height();

    // Functions Object
    var base = {

        /** CSS Variables */
        css_variables: function() {
            // determine base color pallete
            let root = window.getComputedStyle(document.body); // :root HTML element
            const primary_accent_color = root.getPropertyValue('--primary-accent')
            const secondary_accent_color = root.getPropertyValue('--secondary-accent')
            const background_color = root.getPropertyValue('--background-color')
            const text_color = root.getPropertyValue('--text-color')

            // determine active color scheme
            let is_light_color_scheme = $('body').hasClass('light-color-scheme')
            let is_dark_color_scheme = $('body').hasClass('dark-color-scheme')
            let is_custom_color_scheme = $('body').hasClass('custom-color-scheme')

            // convert custom color scheme to (light, dark)
            if (is_custom_color_scheme) {
                let is_light_bg = tinycolor(background_color).isLight()
                if (is_light_bg) {
                    is_custom_color_scheme = 'dark-color-scheme'
                } else {
                    is_custom_color_scheme = 'light-color-scheme'
                }
            }

            // set color pallate if light color scheme is active
            if (is_light_color_scheme || is_custom_color_scheme == 'light-color-scheme') {
                let background_highlight = tinycolor(background_color).darken(10).toString()
                document.body.style.setProperty('--background-highlight', background_highlight);

                let menu_bg = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--menu-background', menu_bg);

                let menu_text = tinycolor(menu_bg).lighten(90).toString()
                document.body.style.setProperty('--menu-text', menu_text);

                let menu_hover = tinycolor(menu_text).darken(85).toString()
                document.body.style.setProperty('--menu-hover', menu_hover);

                let menu_seperator = tinycolor(menu_bg).lighten(15).toString()
                document.body.style.setProperty('--menu-seperator', menu_seperator);

                let menu_caption = tinycolor(menu_text).darken(60).toString()
                document.body.style.setProperty('--menu-caption', menu_caption);

                let backdrop_color = tinycolor(background_color).darken(10).toString()
                document.body.style.setProperty('--backdrop-color', backdrop_color);

                let sidebar_title = tinycolor(background_color).darken(30).toString()
                document.body.style.setProperty('--sidebar-title', sidebar_title);

                let sidebar_trigger_color = tinycolor(background_color).darken(5).toString()
                document.body.style.setProperty('--sidebar-trigger-color', sidebar_trigger_color);
            }

            // set color pallate if dark color scheme is active
            if (is_dark_color_scheme || is_custom_color_scheme == 'dark-color-scheme') {
                let background_highlight = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--background-highlight', background_highlight);

                let menu_bg = tinycolor(background_color).lighten(100).toString()
                document.body.style.setProperty('--menu-background', menu_bg);

                let menu_text = tinycolor(menu_bg).darken(90).toString()
                document.body.style.setProperty('--menu-text', menu_text);

                let menu_hover = tinycolor(menu_text).lighten(87).toString()
                document.body.style.setProperty('--menu-hover', menu_hover);

                let menu_seperator = tinycolor(menu_bg).darken(15).toString()
                document.body.style.setProperty('--menu-seperator', menu_seperator);

                let menu_caption = tinycolor(menu_text).lighten(60).toString()
                document.body.style.setProperty('--menu-caption', menu_caption);

                let backdrop_color = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--backdrop-color', backdrop_color);

                let sidebar_title = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--sidebar-title', sidebar_title);

                let sidebar_trigger_color = tinycolor(background_color).lighten(5).toString()
                document.body.style.setProperty('--sidebar-trigger-color', sidebar_trigger_color);
            }

            // If any color scheme
            let headroom_background = tinycolor(background_color).setAlpha(.9).toString()
            document.body.style.setProperty('--headroom-background', headroom_background);

            let modal_background = tinycolor(background_color).setAlpha(.9).toString()
            document.body.style.setProperty('--modal-background', modal_background);

        },

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

            // Modern Menu
            // $('#mobile-menu .tn-menu').tendina({
            // 	speed: 200,
            // });

            // let sub_menus =  $('#full-screen-menu li.menu-item-has-children > ul')

            // sub_menus.each(function(idx, item) {
            //     item.addClass
            //     $('.menu-placeholder').append(item)
            // });

            // Copy All Sub Menus
            $('#full-screen-menu .sub-menu').each(function(){
                var id = $(this).parent().attr('class').split(' ').pop();
                $(this).appendTo('.menu-placeholder').addClass('overlay-menu').wrap('<div class="overlay-menu-wrap" style="z-index: 1;" data-id="' + id + '" />');
                $(this).find('.back-to-menu').appendTo($(this).find('li:nth-child(2)').eq(0));
            });
            
            // Click Handling on Root Menu
            $('#full-screen-menu li.menu-item-has-children a').on('click', function() {
                $('#full-screen-menu').hide()
                let source_id = $(this).parent().attr('class').split(' ').pop()
                $(".menu-placeholder .overlay-menu-wrap").removeClass('active');
                $(".menu-placeholder .overlay-menu-wrap[data-id='" + source_id +"']").addClass('active');
                $('#mobile-menu .go-back').data('node', ['root']).addClass('active')
            });

            // Click Handling on Child Items
            $('.menu-placeholder li.menu-item-has-children a').on('click', function() {
                $(".menu-placeholder .overlay-menu-wrap").removeClass('active')
                let source_id = $(this).parent().attr('class').split(' ').pop()
                $(".menu-placeholder .overlay-menu-wrap").removeClass('active');
                $(".menu-placeholder .overlay-menu-wrap[data-id='" + source_id +"']").addClass('active');
                
                let parent_id = $(this).parents('.overlay-menu-wrap').data('id')
                $('#mobile-menu .go-back').data('node').push(parent_id)
            });

            $('#mobile-menu .go-back').on('click', function() {
                let prev_node = $(this).data('node').pop()
                console.log(prev_node)
                if (prev_node == 'root') {
                    $('#full-screen-menu').show()
                    $(".menu-placeholder .overlay-menu-wrap").removeClass('active')
                    $('#mobile-menu .go-back').removeClass('active')
                } else {
                    $(".menu-placeholder .overlay-menu-wrap").removeClass('active');
                    $(".menu-placeholder .overlay-menu-wrap[data-id='" + prev_node +"']").addClass('active');
                }
            })



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

    // Initialize Functions
    base.site_preloader();
    base.css_variables();
    base.scroll_position();
    base.toggle_bg_sound();
    base.site_notification();
    base.site_menu();
    base.site_overlay();
    base.sticky_header();
    base.page_header();
    base.custom_cursor();
    base.lightbox();
})
