(function e(t, n, r) {
  function s(o, u) {
    if (!n[o]) {
      if (!t[o]) {
        var a = typeof require == "function" && require;
        if (!u && a) return a(o, !0);
        if (i) return i(o, !0);
        var f = new Error("Cannot find module '" + o + "'");
        throw f.code = "MODULE_NOT_FOUND", f
      }
      var l = n[o] = {
        exports: {}
      };
      t[o][0].call(l.exports, function(e) {
        var n = t[o][1][e];
        return s(n ? n : e)
      }, l, l.exports, e, t, n, r)
    }
    return n[o].exports
  }
  var i = typeof require == "function" && require;
  for (var o = 0; o < r.length; o++) s(r[o]);
  return s
})({
  1: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Functions Object

      var animations = {
        /** animate-in whole container */
        animate_in_container: function animate_in_container() {
          $('#site-container').addClass('animate-in');
          $('#page-header .scroll-indicator').addClass('animate-in');
        },

        /** animate-in individual items with interval in-between */
        animate_in_items: function animate_in_items(items) {
          $(items).each(function() {
            setTimeout(function() {
              $(this).addClass('animate-in');
            }.bind(this), $(this).index() * 50 + 100);
          }); // $(items).each(function(i) {
          // 	$(this).addClass('animate-in').delay((i++) * 200).fadeIn();
          // });
        },

        /** animate-in whole container */
        local_links: function local_links() {
          // comma seperate list of links to exclude
          var exclude_links = 'li.menu-item-has-children a, #load-more a, a[rel="lightbox"], #portfolio-widget ul.widget-list li a';
          /** identify all local links */

          $('a:not([href*=\\#])').not(exclude_links).filter(function() {
            return this.hostname && this.hostname === location.hostname;
          }).addClass('local-link');
          /** identify all native link */

          $('#load-more a, ul.widget-list li a').filter(function() {
            $(this).addClass('native-link');
          });
          /** animate-out when a local-link is clicked */

          $('a.local-link').on('click', function() {
            $('#site-container').removeClass('animate-in');
            $('.preloader').fadeIn();
          });
        },

        /** make BG passive on scroll */
        make_bg_passive: function make_bg_passive() {
          $(window).on('scroll', function() {
            if ($(window).scrollTop() >= 100) {
              $('.hero-header .media').addClass('passive');
              $('#page-header .scroll-indicator').removeClass('animate-in');
            } else {
              $('.hero-header .media').removeClass('passive');
              $('#page-header .scroll-indicator').addClass('animate-in');
            }
          });
        },

        /** animate on scroll */
        animate_on_scroll: function animate_on_scroll() {
          $(window).on('scroll', function() {
            if ($(window).scrollTop() >= 300) {
              $('#social-share, #page-controls').addClass('animate-in');
            } else {
              $('#social-share, #page-controls').removeClass('animate-in');
            }
          });
        }
      }; // Initialize Functions

      animations.animate_in_container();
      animations.animate_in_items('.grid .grid-item'); // animations.animate_in_items('.blog-minimal .post, .grid .grid-item');

      animations.local_links();
      animations.make_bg_passive();
      animations.animate_on_scroll(); // re-execute on 'afterInfiniteScroll' triggger

      $('body').on('afterInfiniteScroll', function(event, items) {
        setTimeout(function() {
          animations.animate_in_items(items);
        }, 400);
      });
    });

    exports["default"] = _default;

  }, {}],
  2: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict';
      /** Viewport dimensions */

      var ww = $(window).width();
      var wh = $(window).height(); // Functions Object

      var base = {
        /** Scroll Position */
        scroll_position: function scroll_position() {
          // initial postion on page load
          $(document).ready(function() {
            $(this).scrollTop(0);
          }); // scroll indicator click handler

          $('#page-header .scroll-indicator > a').smoothScroll(); // go to top click handler

          $('#page-controls .page-control.go-top').smoothScroll({
            offset: -150,
            speed: 600
          });
        },

        /** Background Sound */
        toggle_bg_sound: function toggle_bg_sound() {
          $('#page-controls .page-control.sound-bars').on('click', function(e) {
            e.preventDefault();
            var background_audio = $('.hero-header audio')[0];
            var is_active = $(this).hasClass('active');

            if (is_active) {
              $(this).removeClass('active');
              background_audio.pause();
            } else {
              $(this).addClass('active');
              background_audio.play();
            }
          });
        },

        /** Site Notification */
        site_notification: function site_notification() {
          // initial postion on page load
          $('#page-controls .page-control.notification, a[href^="#trigger-notification"]').on('click', function(e) {
            e.preventDefault();
            $('#site-notification').addClass('animate-in');
          }); // initial postion on page load

          $('#site-notification .close').on('click', function(e) {
            e.preventDefault();
            $('#site-notification').removeClass('animate-in');
          });
        },

        /** Site Preloader */
        site_preloader: function site_preloader() {
          $('.preloader').fadeOut();
        },

        /** Site Menu */
        site_menu: function site_menu() {
          // Traditional Menu
          $('ul.sf-menu').superfish({
            animation: {
              opacity: 'show',
              top: "220%"
            },
            animationOut: {
              opacity: 'hide',
              top: "260%"
            },
            speed: 'fast',
            delay: 600
          });
        },

        /** Full Screen Menu */
        full_screen_menu: function full_screen_menu() {
          // Copy All Sub Menus
          $('#full-screen-menu .sub-menu').each(function() {
            var child_menu_id = $(this).parent().attr('class').split(' ').pop(); // grab child menu ID

            $(this).appendTo('.child-menus').addClass('overlay-menu').wrap('<div class="child-menu-wrap" data-id="' + child_menu_id + '" />'); // clone child menu to another DIV
          }); // Click Handling on Root Menu

          $('#full-screen-menu li.menu-item-has-children a').on('click', function(e) {
            e.preventDefault(); // disable the link because we want to expand child items instead

            $('#full-screen-menu').addClass('hide'); // hide the root menu

            var child_menu_id = $(this).parent().attr('class').split(' ').pop(); // grab child menu ID

            $(".child-menus .child-menu-wrap").removeClass('active'); // hide any child menu if visible

            $(".child-menus .child-menu-wrap[data-id='" + child_menu_id + "']").addClass('active'); // show only required child menu

            $('#responsive-menu .go-back').data('node', ['root']).addClass('active'); // add parent menu history to "go-back" link
          }); // Click Handling on Child Items

          $('.child-menus li.menu-item-has-children a').on('click', function(e) {
            e.preventDefault(); // disable the link because we want to expand child items instead

            var child_menu_id = $(this).parent().attr('class').split(' ').pop(); // grab child menu ID

            $(".child-menus .child-menu-wrap").removeClass('active'); // hide any child menu if visible

            $(".child-menus .child-menu-wrap[data-id='" + child_menu_id + "']").addClass('active'); // show only required child menu

            var parent_id = $(this).parents('.child-menu-wrap').data('id'); // determine parent ID of child menu

            $('#responsive-menu .go-back').data('node').push(parent_id); // add parent menu history to "go-back" link
          }); // Click Handling on Go Back Button

          $('#responsive-menu .go-back').on('click', function() {
            var prev_node = $(this).data('node').pop(); // grab the last parent item ID

            if (prev_node == 'root') {
              $('#full-screen-menu').removeClass('hide');
              $(".child-menus .child-menu-wrap").removeClass('active');
              $('#responsive-menu .go-back').removeClass('active');
            } else {
              $(".child-menus .child-menu-wrap").removeClass('active');
              $(".child-menus .child-menu-wrap[data-id='" + prev_node + "']").addClass('active');
            }
          });
        },

        /** Site Overlay */
        site_overlay: function site_overlay() {
          //horizontal swipe menu
          var init = {
            openModal: function openModal(type) {
              $('html').addClass('noscroll-only');

              if (type == 'search') {
                $('#search-filter, #search-filter .widget-wrap, #site-clipboard .close-link').addClass('animate-in');
              } else if (type == 'menu') {
                $('#responsive-menu, #full-screen-menu, .menu-caption, #site-clipboard .close-link').addClass('animate-in');
              }
            },
            closeModal: function closeModal() {
              $('#search-filter, #search-filter .widget-wrap, #responsive-menu, #full-screen-menu, .menu-caption, #site-clipboard .close-link').removeClass('animate-in');
              $('html').removeClass('noscroll-only');
            }
          }; // open search modal window

          $('#site-header .search-icon a').on('click', function(e) {
            e.preventDefault();
            init.openModal('search');
          }); // trigger fullscreen functionality

          $('#site-header .fullscreen-icon a').on('click', function(e) {
            e.preventDefault();
            var is_fullscreen = document.fullscreenElement;

            if (is_fullscreen) {
              // $(this).removeClass('active')
              document.exitFullscreen();
              $('i', this).addClass('fi-fullscreen').removeClass('fi-smallscreen');
            } else {
              $('i', this).removeClass('fi-fullscreen').addClass('fi-smallscreen');
              document.documentElement.requestFullscreen();
            }
          }); // open menu modal window

          $('#site-header .menu-icon a').on('click', function(e) {
            e.preventDefault();
            init.openModal('menu');
          }); // close modal window

          $('#site-clipboard .close-link').on('click', function(e) {
            e.preventDefault();
            init.closeModal();
          });
        },

        /** Header Elements */
        header_elements: function header_elements() {
          // remove positional classes from all elements
          $('#site-header .left-elements .element').removeClass('first-element');
          $('#site-header .right-elements .element').removeClass('last-element'); // add positional classes to visible elements

          $('#site-header .left-elements .element:visible:first').addClass('first-element');
          $('#site-header .right-elements .element:visible:last').addClass('last-element');
        },

        /** Sticky Header */
        sticky_header: function sticky_header() {
          $('#site-header').headroom({
            offset: 300,
            onUnpin: function onUnpin() {
              setTimeout(function() {
                $('#site-header').addClass('animate-out');
              }, 400);
            },
            onTop: function onTop() {
              $('#site-header').removeClass('animate-out');
            }
          });
        },

        /** Page Header */
        page_header: function page_header() {
          var site_header_h = $('#site-header').outerHeight(true);
          var main_content_m = parseInt($('#main-content').css('margin-top'));
          var page_header_h = wh - (site_header_h + main_content_m);
          $('#page-header.fullscreen').height(page_header_h);
        },

        /** Lightbox */
        lightbox: function lightbox() {
          var gallery_links = $('.wp-gallery a[rel="lightbox"], .portfolio-container .portfolio > a[rel="lightbox"], .elementor-image a');
          gallery_links.fancybox({
            padding: 0,
            helpers: {
              title: {
                type: 'inside'
              },
              thumbs: {
                width: 65,
                height: 65
              },
              media: {}
            },
            beforeLoad: function beforeLoad() {
              this.title = $(this.element).data('caption');
            }
          });
        },

        /** Responsive Videos */
        responsive_videos: function responsive_videos() {
          $('body').fitVids({
            customSelector: "iframe[src^='https://video.wordpress.com']"
          });
        }
      }; // Initialize Functions

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
      base.lightbox();
      base.responsive_videos();
      $(window).on('resize', function() {
        base.header_elements();
      });
    });

    exports["default"] = _default;

  }, {}],
  3: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var blog_magazine_page = $('body').hasClass('blog-magazine');
      var $carousel = $('#blog-slider .main-carousel'); // Functions Object

      var blog = {
        /** Infinite Scroll */
        load_more: function load_more() {
          // some checks
          var is_blog = $('body').hasClass('blog') || $('body').hasClass('archive') || $('body').hasClass('search');
          var is_load_more = $('#load-more').length; // defining some data (for 'infiniteScroll')

          var $container = is_blog ? $('.blog-container') : $('.grid');
          var item = is_blog ? '.type-post' : '.grid-item';
          var load_more = '#load-more';
          var load_trigger = $container.data('load-trigger');
          var max_page_count = parseInt($(load_more).attr('data-total-pages'));
          var post_type = $(load_more).attr('data-post-type');
          var term_IDs = $(load_more).attr('data-term-ids');
          var posts_per_page = $(load_more).attr('data-posts-per-page');
          var loop_style = $(load_more).attr('data-loop-style'); // let's start the engines

          var startEngine = {
            init: function init() {
              $container.infiniteScroll({
                append: item,
                // path: '#load-more a',
                path: function path() {
                  // return `url` only if the page exists
                  if (max_page_count >= this.pageIndex) {
                    var base_url = theme_ajax.ajaxurl;
                    var params = {
                      action: 'nucleus_ajax_load_more',
                      type: post_type,
                      term_ids: term_IDs,
                      posts_per_page: posts_per_page,
                      loop_style: loop_style,
                      page: this.pageIndex + 1
                    };
                    var url = base_url + '?' + $.param(params); // alert(url)

                    return url;
                  }
                },
                loadOnScroll: load_trigger == 'button' ? false : true,
                button: load_more,
                status: '.page-load-status',
                history: false // debug: true,

              }); // 0: current state of 'infiniteScroll' instance

              var infScroll = $container.data('infiniteScroll'); // 1: triggers when making request for the next page to be loaded

              $container.on('request.infiniteScroll', function(event, path) {
                if (load_trigger == 'button') {
                  $(load_more).fadeOut(200); // add spinning animation while loading 
                }
              }); // 2: triggers when next page loaded but not appended

              $container.on('load.infiniteScroll', function(event, response, path) {
                var current_page = infScroll.pageIndex; // fadeIn load-more button only if there is any page to load

                if (max_page_count > current_page) {
                  if (load_trigger == 'button') {
                    $(load_more).fadeIn(200); // add spinning animation while loading 
                  }
                } else {
                  $('.page-load-status').addClass('end-of-line').html('No More Content');
                }
              }); // 3: triggers after items have been appended to the container

              $container.on('append.infiniteScroll', function(event, response, path, items) {
                $(items).imagesLoaded(function() {
                  $('body').trigger('afterInfiniteScroll', [items]);
                });
              });
            }
          }; // execute on DOM ready

          if (is_load_more) {
            startEngine.init();
          }
        },
        // Private: Configure Progress Bar
        _configure_progress_bar: function _configure_progress_bar(time) {
          var time = time;
          var $bar, $slick, isPause, tick, percentTime;
          $bar = $('.progress-bar .progress');
          $('.main-carousel').on({
            mouseenter: function mouseenter() {
              isPause = true;
            },
            mouseleave: function mouseleave() {
              isPause = false;
            }
          });

          function start_progress_bar() {
            reset_progress_bar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 10);
          }

          function interval() {
            if (isPause === false) {
              percentTime += 1 / (time + 0.1);
              $bar.css({
                width: percentTime + "%"
              });

              if (percentTime >= 100) {
                $carousel.flickity('next');
                start_progress_bar();
              }
            }
          }

          function reset_progress_bar() {
            $bar.css({
              width: 0 + '%'
            });
            clearTimeout(tick);
          }

          start_progress_bar(); // reset progress bar (on scroll)

          $carousel.on('scroll.flickity', function(event, progress) {
            start_progress_bar();
          });
        },

        /** Horizon Carousel */
        carousel: function carousel() {
          // assign current scope to self
          var self = this;
          var is_flickity = true; // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // init flickity instance
            $carousel.flickity({
              contain: true,
              wrapAround: true,
              pageDots: false,
              // percentPosition: false,
              arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
            }); // start progress bar

            self._configure_progress_bar(80);
          }
        },

        /** Sidebar */
        sidebar: function sidebar() {
          // open sidebar
          $('.open-sidebar').on('click', function(e) {
            e.preventDefault();
            $('html').addClass('noscroll');
            $('.main-sidebar').addClass('active');
          }); // close sidebar (on click close icon)

          $('.close-sidebar').on('click', function(e) {
            e.preventDefault();
            $('html').removeClass('noscroll');
            $('.main-sidebar').removeClass('active');
          }); // close sidebar (on click outside sidebar)

          $(document).on('click', function(e) {
            if ($(e.target).closest('.main-sidebar, .open-sidebar').length === 0) {
              $('html').removeClass('noscroll');
              $('.main-sidebar').removeClass('active');
            }
          });
        },

        /** Image Reveal */
        image_reveal: function image_reveal() {
          $('.blog-minimal-inner[data-hover="reveal"] .post .entry-title a').each(function(el) {
            $(this).on('mouseover', function(e) {
              $(this).css('z-index', -10);
              $(this).parent().siblings('.entry-thumb').addClass('animate-in');
            });
            $(this).on('mousemove', function(e) {
              $(this).parent().siblings('.entry-thumb').css('top', e.offsetY + 10 + 'px');
              $(this).parent().siblings('.entry-thumb').css('left', e.offsetX + 50 + 'px');
            });
            $(this).on('mouseleave', function(e) {
              $(this).css('z-index', 1);
              $(this).parent().siblings('.entry-thumb').removeClass('animate-in');
            });
          });
        },

        /** Pingback Class */
        pingback_class: function pingback_class() {
          $('ol.comment-list li.pingback:last').addClass('last-pingback');
          $('ol.comment-list > li:not(.comment):lt(99)').wrapAll('<div class="pingback-group" />');
        }
      }; // Initialize Functions

      blog.load_more();
      blog.sidebar();
      blog.image_reveal();
      blog.pingback_class();

      if (blog_magazine_page) {
        blog.carousel();
      }
    });

    exports["default"] = _default;

  }, {}],
  4: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Functions Object

      var colors = {
        // Get's value of any CSS variable
        get_base_color: function get_base_color(color) {
          var root = window.getComputedStyle(document.body); // :root HTML element

          switch (color) {
            case 'primary':
              return root.getPropertyValue('--primary-accent');
              break;

            case 'secondary':
              return root.getPropertyValue('--secondary-accent');
              break;

            case 'background':
              return root.getPropertyValue('--background-color');
              break;

            case 'text':
              return root.getPropertyValue('--text-color');
              break;

            default:
              return root.getPropertyValue(color);
              break;
          }
        },
        // Returns active color scheme class
        get_base_color_scheme: function get_base_color_scheme() {
          var is_light_color_scheme = $('body').hasClass('light-base-color-scheme');
          if (is_light_color_scheme) return 'light-base-color-scheme';
          var is_dark_color_scheme = $('body').hasClass('dark-base-color-scheme');
          if (is_dark_color_scheme) return 'dark-base-color-scheme';
          var is_custom_color_scheme = $('body').hasClass('custom-base-color-scheme');

          if (is_custom_color_scheme) {
            var is_light_bg = tinycolor(this.get_base_color('background')).isLight();

            if (is_light_bg) {
              return 'light-base-color-scheme';
            } else {
              return 'dark-base-color-scheme';
            }
          }
        },

        /** Global Colors */
        global_colors: function global_colors() {},

        /** Base Colors */
        base_colors: function base_colors() {
          // Get base color scheme
          var base_color_scheme = this.get_base_color_scheme();
          var headroom_background = tinycolor(this.get_base_color('background')).setAlpha(.9).toString();
          document.body.style.setProperty('--headroom-background', headroom_background);
          var search_background = tinycolor(this.get_base_color('background')).setAlpha(0).toString();
          document.body.style.setProperty('--search-background', search_background);
          var modal_background = tinycolor(this.get_base_color('background')).setAlpha(.9).toString();
          document.body.style.setProperty('--modal-background', modal_background);
          var button_background = tinycolor(this.get_base_color('background')).darken(10).toString();
          document.body.style.setProperty('--button-background', button_background); // Set color scheme if LIGHT base scheme is active

          if (base_color_scheme == 'light-base-color-scheme') {
            var backdrop_color = tinycolor(this.get_base_color('background')).darken(12).toString();
            document.body.style.setProperty('--backdrop-color', backdrop_color);
            var sidebar_title = tinycolor(this.get_base_color('background')).darken(35).toString();
            document.body.style.setProperty('--sidebar-title', sidebar_title);
            var sidebar_trigger_color = tinycolor(this.get_base_color('background')).darken(8).setAlpha(.7).toString();
            document.body.style.setProperty('--sidebar-trigger-color', sidebar_trigger_color);
            var menu_subtitle = tinycolor(modal_background).darken(50).setAlpha(.7).toString();
            document.body.style.setProperty('--menu-subtitle', menu_subtitle);
            var border_color = tinycolor(this.get_base_color('background')).darken(20).setAlpha(.7).toString();
            document.body.style.setProperty('--border-color', border_color);
            var tag_bg = tinycolor(this.get_base_color('background')).darken(8).setAlpha(.7).toString();
            document.body.style.setProperty('--tag-background', tag_bg);
            var blog_date = tinycolor(this.get_base_color('text')).lighten(50).toString();
            document.body.style.setProperty('--blog-date', blog_date);
            var blog_categories = tinycolor(this.get_base_color('text')).lighten(30).toString();
            document.body.style.setProperty('--blog-categories', blog_categories);
            var comment_bg = tinycolor(this.get_base_color('background')).darken(6.5).setAlpha(.7).toString();
            document.body.style.setProperty('--comment-background', comment_bg);
            var search_field_bg = tinycolor(this.get_base_color('--modal-background')).darken(8).toString();
            document.body.style.setProperty('--search-field-background', search_field_bg);
          } // Set color scheme if DARK base scheme is active


          if (base_color_scheme == 'dark-base-color-scheme') {
            var _backdrop_color = tinycolor(this.get_base_color('background')).lighten(10).toString();

            document.body.style.setProperty('--backdrop-color', _backdrop_color);

            var _sidebar_title = tinycolor(this.get_base_color('background')).lighten(30).toString();

            document.body.style.setProperty('--sidebar-title', _sidebar_title);

            var _sidebar_trigger_color = tinycolor(this.get_base_color('background')).lighten(8).setAlpha(.7).toString();

            document.body.style.setProperty('--sidebar-trigger-color', _sidebar_trigger_color);

            var _menu_subtitle = tinycolor(modal_background).lighten(40).setAlpha(.7).toString();

            document.body.style.setProperty('--menu-subtitle', _menu_subtitle);

            var _border_color = tinycolor(this.get_base_color('background')).lighten(20).setAlpha(.7).toString();

            document.body.style.setProperty('--border-color', _border_color);

            var _tag_bg = tinycolor(this.get_base_color('background')).lighten(30).setAlpha(.8).toString();

            document.body.style.setProperty('--tag-background', _tag_bg);

            var _blog_date = tinycolor(this.get_base_color('text')).darken(50).toString();

            document.body.style.setProperty('--blog-date', _blog_date);

            var _blog_categories = tinycolor(this.get_base_color('text')).darken(30).toString();

            document.body.style.setProperty('--blog-categories', _blog_categories);

            var _comment_bg = tinycolor(this.get_base_color('background')).lighten(6.5).setAlpha(.7).toString();

            document.body.style.setProperty('--comment-background', _comment_bg);

            var _search_field_bg = tinycolor(this.get_base_color('--modal-background')).lighten(20).toString();

            document.body.style.setProperty('--search-field-background', _search_field_bg);
          }
        },

        /** Form Colors */
        form_colors: function form_colors() {
          // Check if DYNAMIC color scheme is active
          var is_dynamic_color_scheme = $('body').hasClass('dynamic-form-color-scheme');
          if (!is_dynamic_color_scheme) return; // Get base color scheme

          var base_color_scheme = this.get_base_color_scheme(); // Set color scheme if LIGHT base scheme is active

          if (base_color_scheme == 'light-base-color-scheme') {
            var form_field_bg = tinycolor(this.get_base_color('background')).darken(5).toString();
            document.body.style.setProperty('--form-field-background-color', form_field_bg);
            var form_field_text = tinycolor(this.get_base_color('background')).darken(90).toString();
            document.body.style.setProperty('--form-field-text-color', form_field_text);
            var form_field_border = tinycolor(this.get_base_color('background')).darken(6).toString();
            document.body.style.setProperty('--form-field-border-color', form_field_border);
            var form_field_focus_bg = tinycolor(this.get_base_color('background')).darken(7).toString();
            document.body.style.setProperty('--form-field-background-color-focus', form_field_focus_bg);
            var form_field_focus_text = tinycolor(this.get_base_color('background')).darken(90).toString();
            document.body.style.setProperty('--form-field-text-color-focus', form_field_focus_text);
            var form_field_focus_border = tinycolor(this.get_base_color('background')).darken(9).toString();
            document.body.style.setProperty('--form-field-border-color-focus', form_field_focus_border);
            var form_field_button_bg = tinycolor(this.get_base_color('background')).darken(90).toString();
            document.body.style.setProperty('--form-button-background-color', form_field_button_bg);
            var form_field_button_border = tinycolor(this.get_base_color('background')).darken(90).toString();
            document.body.style.setProperty('--form-button-border-color', form_field_button_border);
            var form_field_button_text = tinycolor(this.get_base_color('background')).lighten(3).toString();
            document.body.style.setProperty('--form-button-text-color', form_field_button_text);
            var form_field_button_hover_bg = tinycolor(this.get_base_color('background')).darken(100).toString();
            document.body.style.setProperty('--form-button-background-color-hover', form_field_button_hover_bg);
            var form_field_button_hover_border = tinycolor(this.get_base_color('background')).darken(100).toString();
            document.body.style.setProperty('--form-button-border-color-hover', form_field_button_hover_border);
            var form_field_button_hover_text = tinycolor(this.get_base_color('background')).lighten(3).toString();
            document.body.style.setProperty('--form-button-text-color-hover', form_field_button_hover_text);
            var form_field_label = tinycolor(this.get_base_color('background')).darken(90).toString();
            document.body.style.setProperty('--form-text-label-color', form_field_label);
          } // Set color scheme if DARK base scheme is active


          if (base_color_scheme == 'dark-base-color-scheme') {
            var _form_field_bg = tinycolor(this.get_base_color('background')).lighten(10).toString();

            document.body.style.setProperty('--form-field-background-color', _form_field_bg);

            var _form_field_text = tinycolor(this.get_base_color('background')).lighten(90).toString();

            document.body.style.setProperty('--form-field-text-color', _form_field_text);

            var _form_field_border = tinycolor(this.get_base_color('background')).lighten(17).toString();

            document.body.style.setProperty('--form-field-border-color', _form_field_border);

            var _form_field_focus_bg = tinycolor(this.get_base_color('background')).lighten(13).toString();

            document.body.style.setProperty('--form-field-background-color-focus', _form_field_focus_bg);

            var _form_field_focus_text = tinycolor(this.get_base_color('background')).lighten(90).toString();

            document.body.style.setProperty('--form-field-text-color-focus', _form_field_focus_text);

            var _form_field_focus_border = tinycolor(this.get_base_color('background')).lighten(21).toString();

            document.body.style.setProperty('--form-field-border-color-focus', _form_field_focus_border);

            var _form_field_button_bg = tinycolor(this.get_base_color('background')).lighten(90).toString();

            document.body.style.setProperty('--form-button-background-color', this.get_base_color('secondary'));

            var _form_field_button_border = tinycolor(this.get_base_color('background')).lighten(90).toString();

            document.body.style.setProperty('--form-button-border-color', this.get_base_color('secondary'));

            var _form_field_button_text = tinycolor(this.get_base_color('secondary')).darken(90).toString();

            document.body.style.setProperty('--form-button-text-color', _form_field_button_text);

            var _form_field_button_hover_bg = tinycolor(this.get_base_color('secondary')).darken(20).toString();

            document.body.style.setProperty('--form-button-background-color-hover', _form_field_button_hover_bg);

            var _form_field_button_hover_border = tinycolor(this.get_base_color('secondary')).darken(20).toString();

            document.body.style.setProperty('--form-button-border-color-hover', _form_field_button_hover_border);

            var _form_field_button_hover_text = tinycolor(this.get_base_color('background')).darken(3).toString();

            document.body.style.setProperty('--form-button-text-color-hover', _form_field_button_hover_text);

            var _form_field_label = tinycolor(this.get_base_color('background')).lighten(90).toString();

            document.body.style.setProperty('--form-text-label-color', _form_field_label);
          }
        },

        /** Menu Colors */
        menu_colors: function menu_colors() {
          // Check if DYNAMIC color scheme is active
          var is_dynamic_color_scheme = $('body').hasClass('dynamic-menu-color-scheme'); // Get base color scheme

          var base_color_scheme = this.get_base_color_scheme();

          if (is_dynamic_color_scheme) {
            // Set color scheme if LIGHT base scheme is active
            if (base_color_scheme == 'light-base-color-scheme') {
              var menu_bg = tinycolor(this.get_base_color('background')).darken(90).toString();
              document.body.style.setProperty('--menu-background', menu_bg);
              var menu_text = tinycolor(menu_bg).lighten(90).toString();
              document.body.style.setProperty('--menu-text', menu_text);
              var menu_bg_hover = tinycolor(menu_text).darken(85).toString();
              document.body.style.setProperty('--menu-background-hover', menu_bg_hover);
              var menu_text_hover = tinycolor(menu_text).lighten(100).toString();
              document.body.style.setProperty('--menu-text-hover', menu_text_hover);
              var menu_seperator = tinycolor(menu_bg).lighten(15).toString();
              document.body.style.setProperty('--menu-seperator', menu_seperator);
              var menu_caption = tinycolor(menu_text).darken(50).toString();
              document.body.style.setProperty('--menu-caption', menu_caption);
            } // Set color scheme if DARK base scheme is active


            if (base_color_scheme == 'dark-base-color-scheme') {
              var _menu_bg = tinycolor(this.get_base_color('background')).lighten(100).toString();

              document.body.style.setProperty('--menu-background', _menu_bg);

              var _menu_text = tinycolor(_menu_bg).darken(90).toString();

              document.body.style.setProperty('--menu-text', _menu_text);

              var _menu_bg_hover = tinycolor(_menu_text).lighten(87).toString();

              document.body.style.setProperty('--menu-background-hover', _menu_bg_hover);

              var _menu_text_hover = tinycolor(_menu_bg).darken(90).toString();

              document.body.style.setProperty('--menu-text-hover', _menu_text_hover);

              var _menu_seperator = tinycolor(_menu_bg).darken(15).toString();

              document.body.style.setProperty('--menu-seperator', _menu_seperator);

              var _menu_caption = tinycolor(_menu_text).lighten(50).toString();

              document.body.style.setProperty('--menu-caption', _menu_caption);
            }
          } else {
            // Dynamically generate following menu colors in every case
            var _menu_bg2 = this.get_base_color('--menu-background');

            var _menu_text2 = this.get_base_color('--menu-text');

            var menu_text_is_light = tinycolor(_menu_text2).isLight(); // Set color scheme if LIGHT base scheme is active

            if (menu_text_is_light) {
              var _menu_seperator2 = tinycolor(_menu_bg2).lighten(15).toString();

              document.body.style.setProperty('--menu-seperator', _menu_seperator2);

              var _menu_caption2 = tinycolor(_menu_text2).darken(60).toString();

              document.body.style.setProperty('--menu-caption', _menu_caption2);
            } else {
              var _menu_seperator3 = tinycolor(_menu_bg2).darken(15).toString();

              document.body.style.setProperty('--menu-seperator', _menu_seperator3);

              var _menu_caption3 = tinycolor(_menu_text2).lighten(60).toString();

              document.body.style.setProperty('--menu-caption', _menu_caption3);
            }
          }
        }
      }; // Initialize Functions

      colors.global_colors();
      colors.base_colors();
      colors.form_colors();
      colors.menu_colors(); // re-execute on 'changeSkin' triggger

      $('body').on('changeSkin', function(event, items) {
        colors.global_colors();
        colors.base_colors();
        colors.form_colors();
        colors.menu_colors();
      });
    });

    exports["default"] = _default;

  }, {}],
  5: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Functions Object

      var pages = {
        /** Twitter Carousel */
        twitter_carousel: function twitter_carousel() {
          var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // init Flickity instance
            var $carousel = $('.twitter-carousel').flickity({
              cellSelector: '.tweet',
              pageDots: false,
              arrowShape: 'M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z'
            });
          }
        },

        /** Testimonial Carousel */
        testimonial_carousel: function testimonial_carousel() {
          // init Flickity instance
          var $carousel = $('.testimonials-carousel').flickity({
            cellSelector: '.testimonial',
            pageDots: true,
            prevNextButtons: false
          });
        },

        /** Elementor Fix */
        elementor_fix: function elementor_fix() {
          // progress bar
          $('.elementor-progress-bar').each(function() {
            var leftPos = $(this).data('max');
            $('.elementor-progress-percentage', this).css('left', leftPos + '%');
          }); // wp-galery margins

          $('.wp-gallery .image').each(function() {
            var rightMargin = $(this).css('margin-right');
            $(this).css('margin-bottom', rightMargin);
          });
        }
      }; // Initialize Functions

      pages.twitter_carousel();
      pages.testimonial_carousel();
      pages.elementor_fix();
    });

    exports["default"] = _default;

  }, {}],
  6: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Functions Object

      var portfolio_global = {
        // Align Conatiner to the Top
        align_to_top: function align_to_top() {
          var is_full_screen_page = $('body').hasClass('portfolio-horizon') || $('body').hasClass('portfolio-spotlight') || $('body').hasClass('portfolio-forza') || $('body').hasClass('portfolio-textual') || $('body').hasClass('portfolio-columns');

          if (is_full_screen_page) {
            var margin_top = $('#site-header').css('margin-top');
            $('#site-body').css('top', '-' + margin_top);
            var is_admin_bar = $('body').hasClass('admin-bar');
            var admin_bar_height = $('#wpadminbar').height();
            var container_height = is_admin_bar ? $(window).height() - admin_bar_height : $(window).height();
            $('#site-body').css('height', container_height);
            var site_header_height = $('#site-header').height();
            var vertical_offset = parseInt(margin_top, 10) + site_header_height;
            var final_offset = is_admin_bar ? vertical_offset - admin_bar_height : vertical_offset;
            $('.vertical-line').css('top', '-' + final_offset + 'px');
          }
        },
        // All Works
        all_works: function all_works() {
          $('.all-works .content').scrollbar(); // open "all works" menu

          $('.all-works .trigger').on('click', function() {
            $(this).parent().find('.content').addClass('animate-in');
          }); // close "all works" menu

          $(document).on('click', function(e) {
            if ($(e.target).closest('.all-works').length === 0) {
              $('.all-works .content').removeClass('animate-in');
            }
          });
        }
      }; // Initialize Functions

      portfolio_global.align_to_top();
      portfolio_global.all_works();
      $(window).on('resize', function() {
        portfolio_global.align_to_top();
      });
    });

    exports["default"] = _default;

  }, {}],
  7: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var classic_page = $('body').hasClass('portfolio-classic');
      var $carousel = $('#classic-slider .main-carousel'); // Functions Object

      var portfolio = {
        /** Grid Functions */
        grid: function grid() {
          var init = {
            /** Grid Item Filtration **/
            grid_filtration: function grid_filtration() {
              var filterLink = '#portfolio-widget ul.widget-list li a';
              var gridContainer = '.grid';
              $(filterLink).click(function(event) {
                event.preventDefault();
                var filterClass = $(this).data('filter'); // show/hide grid items based on criteria

                if (filterClass == '*') {
                  $('.grid-item', gridContainer).removeClass('is-animated').fadeOut(100).finish().promise().done(function() {
                    $('.grid-item', gridContainer).each(function(i) {
                      $(this).addClass('is-animated').delay(i++ * 200).fadeIn(100);
                    });
                  });
                } else {
                  $('.grid-item', gridContainer).removeClass('is-animated').fadeOut(100).finish().promise().done(function() {
                    $('.grid ' + filterClass).each(function(i) {
                      $(this).addClass('is-animated').delay(i++ * 200).fadeIn(100);
                    });
                  });
                } // add/remove classes on filtration links


                $(filterLink).removeClass('active');
                $(this).addClass('active');
                $('#search-filter, #search-filter .widget-wrap').removeClass('animate-in');
                $('html').removeClass('noscroll-only');
              });
            },
            grid_IE: function grid_IE() {
              var has_no_grid_support = $('html').hasClass('no-cssgrid');

              if (has_no_grid_support) {
                var $grid = $('.grid');
                $grid.packery({
                  itemSelector: '.grid-item'
                });
              }
            }
          }; // execute on DOM ready

          init.grid_filtration();
          init.grid_IE(); // re-execute on 'afterInfiniteScroll' triggger

          $('body').on('afterInfiniteScroll', function() { // init.gridItemImg();
          });
        },

        /** Flickity Carousel */
        carousel: function carousel() {
          var is_flickity = true; // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            var startProgressbar = function startProgressbar() {
              resetProgressbar();
              percentTime = 0;
              isPause = false;
              tick = setInterval(interval, 10);
            };

            var interval = function interval() {
              if (isPause === false) {
                percentTime += 1 / (time + 0.1);
                $bar.css({
                  width: percentTime + "%"
                });

                if (percentTime >= 100) {
                  $carousel.flickity('next');
                  startProgressbar();
                }
              }
            };

            var resetProgressbar = function resetProgressbar() {
              $bar.css({
                width: 0 + '%'
              });
              clearTimeout(tick);
            };

            // init Flickity instance
            $carousel.flickity({
              cellAlign: 'left',
              contain: true,
              wrapAround: true
            }); // configure progress bar

            var time = 8;
            var $bar, $slick, isPause, tick, percentTime;
            $bar = $('.progress-bar .progress');
            $('.main-carousel').on({
              mouseenter: function mouseenter() {
                isPause = true;
              },
              mouseleave: function mouseleave() {
                isPause = false;
              }
            });
            startProgressbar();
            /** reset progress on slide scroll event */

            $carousel.on('scroll.flickity', function(event, progress) {
              startProgressbar();
            });
          }
        },

        /** Hover - Cursor */
        floating_caption: function floating_caption() {
          $('.portfolio-container[data-caption="float"] .type-portfolio').each(function(el) {
            $(this).on('mouseover', function(e) {
              $('.inner-wrap', this).css('z-index', 10).addClass('animate-in');
            });
            $(this).on('mousemove', function(e) {
              $('.inner-wrap', this).css('top', e.offsetY + 10 + 'px');
              $('.inner-wrap', this).css('left', e.offsetX + 10 + 'px');
            });
            $(this).on('mouseleave', function(e) {
              $('.inner-wrap', this).css('z-index', 1).removeClass('animate-in');
            });
          });
        },

        /** Hover - Parallax */
        effect_parallax: function effect_parallax() {
          $('.portfolio-container[data-effect="parallax"] .type-portfolio').each(function(el) {
            var height = $(this).height();
            var width = $(this).width();
            $(this).on('mousemove', function(e) {
              /* Store the x position */
              var xVal = e.offsetX;
              /* Store the y position */

              var yVal = e.offsetY;
              /* Calculate rotation valuee along the Y-axis */

              var yRotation = 10 * ((xVal - width / 2) / width);
              /* Calculate the rotation along the X-axis */

              var xRotation = -10 * ((yVal - height / 2) / height);
              /* Generate string for CSS transform property */

              $(this).css('transform', 'perspective(500px) scale(1) rotateX(' + xRotation + 'deg) rotateY(' + yRotation + 'deg)');
            });
            $(this).on('mouseout', function(e) {
              $(this).css('transform', 'perspective(500px) scale(1) rotateX(0) rotateY(0)');
            });
            $(this).on('mousedown', function(e) {
              $(this).css('transform', 'perspective(500px) scale(0.9) rotateX(0) rotateY(0)');
            });
            $(this).on('mouseup', function(e) {
              $(this).css('transform', 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)');
            });
          });
        },

        /** Effect - Ken Burns */
        effect_ken_burns: function effect_ken_burns() {
          $('.portfolio-container[data-effect="ken"] .type-portfolio').each(function(el) {
            $(this).on('mouseover', function(e) {
              $('.inner-wrap', this).css('z-index', 10).addClass('animate-in');
            });
            $(this).on('mousemove', function(e) {
              $('.inner-wrap', this).css('top', e.offsetY + 10 + 'px');
              $('.inner-wrap', this).css('left', e.offsetX + 10 + 'px');
            });
            $(this).on('mouseleave', function(e) {
              $('.inner-wrap', this).css('z-index', 1).removeClass('animate-in');
            });
          });
        }
      }; // Captions

      portfolio.floating_caption(); // Effects

      portfolio.effect_parallax();
      portfolio.effect_ken_burns(); // re-execute on 'afterInfiniteScroll' triggger

      $('body').on('afterInfiniteScroll', function() {
        portfolio.floating_caption();
        portfolio.effect_parallax();
        portfolio.effect_ken_burns();
      }); // Initialize Functions

      if (classic_page) {
        portfolio.grid();
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {}],
  8: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    var _util = require("./_util");

    // Import Functions
    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var columns_page = $('body').hasClass('portfolio-columns');
      var $carousel_container = $('.portfolio-container');
      var $carousel = $('#columns-slider .main-carousel'); // Functions Object

      var portfolio = {
        /** Horizon Carousel */
        carousel: function carousel() {
          var is_flickity = true;
          var slide_duration = $carousel_container.data('slide-duration'); // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // init flickity instance
            $carousel.flickity({
              contain: true,
              wrapAround: true,
              // percentPosition: false,
              prevNextButtons: false,
              groupCells: true
            }); // start progress bar

            (0, _util.init_progress_bar)($carousel, slide_duration);
          }
        }
      }; // Initialize Functions

      if (columns_page) {
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {
    "./_util": 14
  }],
  9: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    var _util = require("./_util");

    // Import Functions
    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var forza_page = $('body').hasClass('portfolio-forza');
      var $carousel_container = $('#forza-slider');
      var $carousel = $('#forza-slider .main-carousel'); // Functions Object

      var portfolio = {
        /** forza Carousel */
        carousel: function carousel() {
          var is_flickity = true; // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // change color scheme (on load)
            $carousel.on('ready.flickity', function() {
              (0, _util.set_color_scheme)($carousel_container, 0);
            }); // init flickity instance

            $carousel.flickity({
              contain: true,
              wrapAround: true,
              fade: true,
              arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
            }); // change color scheme (on change)

            $carousel.on('change.flickity', function(event, index) {
              (0, _util.set_color_scheme)($carousel_container, index);
            }); // set counter value (on load)

            var flkty = $carousel.data('flickity'); // get Flickity instance

            var total_slides = flkty.slides.length;
            $('.counter .current').html(1);
            $('.counter .total').html(total_slides); // set counter value (on change)

            $carousel.on('change.flickity', function(event, index) {
              $('.counter .current').html(index + 1);
            });
          }
        }
      }; // Initialize Functions

      if (forza_page) {
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {
    "./_util": 14
  }],
  10: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    var _util = require("./_util");

    // Import Functions
    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var horizon_page = $('body').hasClass('portfolio-horizon');
      var $carousel_container = $('#horizon-slider');
      var $carousel = $('#horizon-slider .main-carousel'); // Functions Object

      var portfolio = {
        /** Horizon Carousel */
        carousel: function carousel() {
          // assign current scope to self
          var self = this;
          var is_flickity = true;
          var slide_duration = $carousel_container.data('slide-duration'); // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // change color scheme (on load)
            $carousel.on('ready.flickity', function() {
              (0, _util.set_color_scheme)($carousel_container, 0);
            }); // init flickity instance

            $carousel.flickity({
              contain: true,
              wrapAround: true,
              // percentPosition: false,
              arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
            }); // change color scheme (on change)

            $carousel.on('change.flickity', function(event, index) {
              (0, _util.set_color_scheme)($carousel_container, index);
            }); // start progress bar

            (0, _util.init_progress_bar)($carousel, slide_duration); // set counter value (on load)

            var flkty = $carousel.data('flickity'); // get Flickity instance

            var total_slides = flkty.slides.length;
            $('.counter .current').html(1);
            $('.counter .total').html(total_slides); // set counter value (on change)

            $carousel.on('change.flickity', function(event, index) {
              $('.counter .current').html(index + 1);
            });
          }
        }
      }; // Initialize Functions

      if (horizon_page) {
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {
    "./_util": 14
  }],
  11: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var ribbon_page = $('body').hasClass('portfolio-ribbon');
      var $carousel = $('#ribbon-slider .main-carousel'); // Functions Object

      var portfolio = {
        // Private: Configure Progress Bar
        _configure_progress_bar: function _configure_progress_bar(time) {
          var time = time;
          var $bar, $slick, isPause, tick, percentTime;
          $bar = $('.progress-bar .progress');
          $('.main-carousel').on({
            mouseenter: function mouseenter() {
              isPause = true;
            },
            mouseleave: function mouseleave() {
              isPause = false;
            }
          });

          function start_progress_bar() {
            reset_progress_bar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 10);
          }

          function interval() {
            if (isPause === false) {
              percentTime += 1 / (time + 0.1);
              $bar.css({
                width: percentTime + "%"
              });

              if (percentTime >= 100) {
                $carousel.flickity('next');
                start_progress_bar();
              }
            }
          }

          function reset_progress_bar() {
            $bar.css({
              width: 0 + '%'
            });
            clearTimeout(tick);
          }

          start_progress_bar(); // reset progress bar (on scroll)

          $carousel.on('scroll.flickity', function(event, progress) {
            start_progress_bar();
          });
        },

        /** Horizon Carousel */
        carousel: function carousel() {
          // assign current scope to self
          var self = this;
          var is_flickity = true; // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // init flickity instance
            $carousel.flickity({
              contain: true,
              wrapAround: true,
              prevNextButtons: false,
              pageDots: false
            }); // start progress bar

            self._configure_progress_bar(80); // set counter value (on load)


            var flkty = $carousel.data('flickity'); // get Flickity instance

            var total_slides = flkty.slides.length;
            $('.counter .current').html(1);
            $('.counter .total').html(total_slides); // set counter value (on change)

            $carousel.on('change.flickity', function(event, index) {
              $('.counter .current').html(index + 1);
            });
          }
        }
      }; // Initialize Functions

      if (ribbon_page) {
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {}],
  12: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    var _util = require("./_util");

    // Import Functions
    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var spotlight_page = $('body').hasClass('portfolio-spotlight');
      var $carousel_container = $('#spotlight-slider');
      var $carousel = $('#spotlight-slider .main-carousel'); // Functions Object

      var portfolio = {
        /** spotlight Carousel */
        carousel: function carousel() {
          // assign current scope to self
          var self = this;
          var is_flickity = true;
          var slide_duration = $carousel_container.data('slide-duration'); // var is_flickity = $('body').hasClass('is-flickity-enabled');

          if (is_flickity) {
            // change color scheme (on load)
            $carousel.on('ready.flickity', function() {
              (0, _util.set_color_scheme)($carousel_container, 0);
            }); // init flickity instance

            $carousel.flickity({
              contain: true,
              wrapAround: true,
              fade: true,
              setGallerySize: false,
              arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
            }); // change color scheme (on change)

            $carousel.on('change.flickity', function(event, index) {
              (0, _util.set_color_scheme)($carousel_container, index);
            }); // start progress bar

            (0, _util.init_progress_bar)($carousel, slide_duration); // set counter value (on load)

            var flkty = $carousel.data('flickity'); // get Flickity instance

            var total_slides = flkty.slides.length;
            $('.counter .current').html(1);
            $('.counter .total').html(total_slides); // set counter value (on change)

            $carousel.on('change.flickity', function(event, index) {
              $('.counter .current').html(index + 1);
            });
          }
        }
      }; // Initialize Functions

      if (spotlight_page) {
        portfolio.carousel();
      }
    });

    exports["default"] = _default;

  }, {
    "./_util": 14
  }],
  13: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Global Variable(s)

      var textual_page = $('body').hasClass('portfolio-textual');
      var $cell = $('#textual-slider .main-carousel .carousel-cell a'); // Functions Object

      var portfolio = {
        // Private: Change Color Scheme
        _change_color_scheme: function _change_color_scheme(index) {
          var root = document.querySelector('body'); // :root HTML element

          var active_cell;

          if (index == 0) {
            active_cell = $('#textual-slider .main-carousel .carousel-cell').first();
          } else {
            active_cell = $(index).parents('.carousel-cell');
          }

          var primary_accent_color = active_cell.attr('data-primary-accent-color');
          var secondary_accent_color = active_cell.attr('data-secondary-accent-color');
          var background_color = active_cell.attr('data-bg-color');
          var text_color = active_cell.attr('data-text-color');
          root.style.setProperty('--primary-accent', primary_accent_color);
          root.style.setProperty('--secondary-accent', secondary_accent_color);
          root.style.setProperty('--background-color', background_color);
          root.style.setProperty('--text-color', text_color);
          $('body').trigger('changeSkin');
        },

        /** textual Carousel */
        hover: function hover() {
          // assign current scope to self
          var self = this;

          function activate_default_cell() {
            $('#textual-slider').addClass('is-interactive');
            $('#textual-slider .main-carousel .carousel-cell').first().addClass('is-selected');

            self._change_color_scheme(0);
          } // activate default cell on load


          activate_default_cell();
          $('#textual-slider .main-carousel .carousel-cell a').on({
            mouseenter: function mouseenter() {
              $('#textual-slider').addClass('is-interactive');
              $('.carousel-cell').removeClass('is-selected');
              $(this).parents('.carousel-cell').addClass('is-selected');

              self._change_color_scheme(this);

              console.log('THIS', this);
            },
            mouseleave: function mouseleave() {
              $('#textual-slider').removeClass('is-interactive');
              $(this).parents('.carousel-cell').removeClass('is-selected');
              activate_default_cell();
            }
          });
        }
      }; // Initialize Functions

      if (textual_page) {
        portfolio.hover();
      }
    });

    exports["default"] = _default;

  }, {}],
  14: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports.set_color_scheme = exports.init_progress_bar = void 0;

    // Initialize Progress Bar
    var init_progress_bar = function init_progress_bar() {
      var carousel = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.main-carousel';
      var time = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 8;
      return function(time) {
        var time = time;
        var $bar, $slick, isPause, tick, percentTime;
        $bar = jQuery('.progress-bar .progress');
        jQuery('.main-carousel').on({
          mouseenter: function mouseenter() {
            isPause = true;
          },
          mouseleave: function mouseleave() {
            isPause = false;
          }
        });

        function start_progress_bar() {
          reset_progress_bar();
          percentTime = 0;
          isPause = false;
          tick = setInterval(interval, 10);
        }

        function interval() {
          if (isPause === false) {
            percentTime += 1 / (time + 0.1);
            $bar.css({
              width: percentTime + "%"
            });

            if (percentTime >= 100) {
              carousel.flickity('next');
              start_progress_bar();
            }
          }
        }

        function reset_progress_bar() {
          $bar.css({
            width: 0 + '%'
          });
          clearTimeout(tick);
        }

        start_progress_bar(); // reset progress bar (on scroll)

        carousel.on('scroll.flickity', function(event, progress) {
          start_progress_bar();
        });
      }(time);
    }; // Change Color Scheme Dynamically


    exports.init_progress_bar = init_progress_bar;

    var set_color_scheme = function set_color_scheme(carousel_container, index) {
      var root = document.querySelector('body'); // :root HTML element

      var active_cell = jQuery('.main-carousel .carousel-cell', carousel_container).eq(index);
      var primary_accent_color = active_cell.attr('data-primary-accent-color');
      var secondary_accent_color = active_cell.attr('data-secondary-accent-color');
      var background_color = active_cell.attr('data-bg-color');
      var text_color = active_cell.attr('data-text-color');
      root.style.setProperty('--primary-accent', primary_accent_color);
      root.style.setProperty('--secondary-accent', secondary_accent_color);
      root.style.setProperty('--background-color', background_color);
      root.style.setProperty('--text-color', text_color);
      jQuery('body').trigger('changeSkin');
    };

    exports.set_color_scheme = set_color_scheme;

  }, {}],
  15: [function(require, module, exports) {
    "use strict";

    Object.defineProperty(exports, "__esModule", {
      value: true
    });
    exports["default"] = void 0;

    // Export Functions
    var _default = jQuery(function($) {
      'use strict'; // Functions Object

      var widgets = {
        /** Recent Posts Widget */
        recent_posts: function recent_posts() {
          $('.widget_recent_entries ul li').each(function(idx, li) {
            var item = $(li);
            item.wrapInner("<div class='inner-wrap'></div>");
          });
        },

        /** Recent Comments Widget */
        recent_comments: function recent_comments() {
          $('.widget_recent_comments ul li').each(function(idx, li) {
            var item = $(li);
            item.wrapInner("<div class='inner-wrap'></div>");
          });
        },

        /** RSS Widget */
        rss_posts: function rss_posts() {
          $('.widget_rss ul li').each(function(idx, li) {
            var item = $(li);
            item.wrapInner("<div class='inner-wrap'></div>");
          });
        }
      }; // Initialize Functions

      widgets.recent_posts();
      widgets.recent_comments();
      widgets.rss_posts();
    });

    exports["default"] = _default;

  }, {}],
  16: [function(require, module, exports) {
    "use strict";

    require("./_base");

    require("./_colors");

    require("./_portfolio");

    require("./_portfolio_classic");

    require("./_portfolio_horizon");

    require("./_portfolio_spotlight");

    require("./_portfolio_forza");

    require("./_portfolio_textual");

    require("./_portfolio_columns");

    require("./_portfolio_ribbon");

    require("./_blog");

    require("./_pages");

    require("./_widgets");

    require("./_animations");

  }, {
    "./_animations": 1,
    "./_base": 2,
    "./_blog": 3,
    "./_colors": 4,
    "./_pages": 5,
    "./_portfolio": 6,
    "./_portfolio_classic": 7,
    "./_portfolio_columns": 8,
    "./_portfolio_forza": 9,
    "./_portfolio_horizon": 10,
    "./_portfolio_ribbon": 11,
    "./_portfolio_spotlight": 12,
    "./_portfolio_textual": 13,
    "./_widgets": 15
  }]
}, {}, [16]);