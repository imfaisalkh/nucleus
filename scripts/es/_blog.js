// Export Functions
export default jQuery(function($) {
	'use strict';

	// Global Variable(s)
	const blog_magazine_page = $('body').hasClass('blog-magazine')
	var $carousel = $('#blog-slider .main-carousel')

    // Functions Object
    var blog = {

		/** Infinite Scroll */
		load_more: function() {

            // some checks
			var is_blog = $('body').hasClass('blog') || $('body').hasClass('archive') || $('body').hasClass('search');
			var is_load_more = $('#load-more').length;

			// defining some data (for 'infiniteScroll')
            var $container 	 = is_blog ? $('.blog-container') : $('.grid');
            var item 		 = is_blog ? '.type-post' : '.grid-item';
            var load_more 	 = '#load-more';
            var load_trigger = $container.data('load-trigger');

            var max_page_count = parseInt( $(load_more).attr('data-total-pages') );
			var post_type = $(load_more).attr('data-post-type');
			var term_IDs = $(load_more).attr('data-term-ids');
            var posts_per_page = $(load_more).attr('data-posts-per-page');
            var loop_style = $(load_more).attr('data-loop-style');
            
            // let's start the engines
			var startEngine = {

                init: function() {

					$container.infiniteScroll({
						append: item,
						// path: '#load-more a',
                        path: function() {
                            // return `url` only if the page exists
                            if( max_page_count >=  this.pageIndex ) {
                                var base_url = theme_ajax.ajaxurl;
                                var params = {
                                    action: 'nucleus_ajax_load_more',
                                    type: post_type,
                                    term_ids: term_IDs,
                                    posts_per_page: posts_per_page,
                                    loop_style: loop_style,
                                    page: (this.pageIndex + 1),
                                }
                                var url = base_url + '?' + $.param( params );
                                // alert(url)
                                return url;
                            }
                        },
						loadOnScroll: (load_trigger == 'button') ? false : true,
						button: load_more,
						status: '.page-load-status',
						history: false,
						// debug: true,
                    });
                    
					// 0: current state of 'infiniteScroll' instance
					var infScroll = $container.data('infiniteScroll');

					// 1: triggers when making request for the next page to be loaded
					$container.on( 'request.infiniteScroll', function( event, path ) {
						if (load_trigger == 'button') {
							$(load_more).fadeOut(200); // add spinning animation while loading 
						}
					});

					// 2: triggers when next page loaded but not appended
					$container.on( 'load.infiniteScroll', function( event, response, path ) {
                        let current_page = infScroll.pageIndex

                        // fadeIn load-more button only if there is any page to load
                        if( max_page_count >  current_page ) {
                            if (load_trigger == 'button') {
                                $(load_more).fadeIn(200); // add spinning animation while loading 
                            }
                        } else {
                            $('.page-load-status').addClass('end-of-line').html('No More Content');
                        }
					});

					// 3: triggers after items have been appended to the container
					$container.on( 'append.infiniteScroll', function( event, response, path, items  ) {
						$(items).imagesLoaded( function() {
							$('body').trigger('afterInfiniteScroll', [ items ]);
						});
					});
                },

			}

			// execute on DOM ready
			if (is_load_more) {
				startEngine.init();
			}

		},


        // Private: Configure Progress Bar
        _configure_progress_bar: function(time) {
            var time = time;
            var $bar, $slick, isPause, tick, percentTime;

            $bar = $('.progress-bar .progress');

            $('.main-carousel').on({
                mouseenter: function() {
                    isPause = true;
                },
                mouseleave: function() {
                    isPause = false;
                }
            })

            function start_progress_bar() {
                reset_progress_bar();
                percentTime = 0;
                isPause = false;
                tick = setInterval(interval, 10);
            }

            function interval() {
                if(isPause === false) {
                    percentTime += 1 / (time+0.1);
                    $bar.css({
                        width: percentTime+"%"
                    });
                if(percentTime >= 100) {
                    $carousel.flickity( 'next' )
                        start_progress_bar();
                    }
                }
            }

            function reset_progress_bar() {
                $bar.css({
                    width: 0+'%' 
                });
                clearTimeout(tick);
            }

            start_progress_bar()

            // reset progress bar (on scroll)
            $carousel.on( 'scroll.flickity', function( event, progress ) {
                start_progress_bar()
            });
        },

        /** Horizon Carousel */
        carousel: function() {

            // assign current scope to self
            let self = this

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {
                // init flickity instance
                $carousel.flickity({
                    contain: true,
                    wrapAround: true,
                    pageDots: false,
                    // percentPosition: false,
                    arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
                });

                // start progress bar
                self._configure_progress_bar(80)
            }

        },

        /** Sidebar */
        sidebar: function() {
            // open sidebar
            $('.open-sidebar').on('click', function (e) {
                e.preventDefault()
                $('html').addClass('noscroll')
                $('.main-sidebar').addClass('active')
            })

            // close sidebar (on click close icon)
            $('.close-sidebar').on('click', function (e) {
                e.preventDefault()
                $('html').removeClass('noscroll')
                $('.main-sidebar').removeClass('active')
            })

            // close sidebar (on click outside sidebar)
            $(document).on('click', function (e) {
                if ($(e.target).closest('.main-sidebar, .open-sidebar').length === 0) {
                    $('html').removeClass('noscroll')
                    $('.main-sidebar').removeClass('active')
                }
            });
        },

        /** Image Reveal */
        image_reveal: function() {
            $('.blog-minimal-inner[data-hover="reveal"] .post .entry-title a').each(function(el){
                $(this).on('mouseover', function(e) {
                    $(this).css('z-index', -10)
                    $(this).parent().siblings('.entry-thumb').addClass('animate-in')
                })
                $(this).on('mousemove', function(e) {
                    $(this).parent().siblings('.entry-thumb').css('top', e.offsetY + 10 + 'px')
                    $(this).parent().siblings('.entry-thumb').css('left', e.offsetX + 50 + 'px')
                })
                $(this).on('mouseleave', function(e) {
                    $(this).css('z-index', 1)
                    $(this).parent().siblings('.entry-thumb').removeClass('animate-in')
                })
            });
           
        },

        /** Pingback Class */
        pingback_class: function() {
            $('ol.comment-list li.pingback:last').addClass('last-pingback');

            $('ol.comment-list > li:not(.comment):lt(99)').wrapAll('<div class="pingback-group" />');
        },

    }  

    // Initialize Functions
    blog.load_more();
    blog.sidebar();
    blog.image_reveal();
    blog.pingback_class();

    if (blog_magazine_page) {
        blog.carousel();
    }
})
