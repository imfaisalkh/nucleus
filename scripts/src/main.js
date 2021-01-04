/*-----------------------------------------------------------------------------------

	Custom JS - All front-end jQuery
 
-----------------------------------------------------------------------------------*/

(function( $ ) {

	'use strict';

	/** GENERALS */
	/** ================================================== */

	/** Viewport dimensions */
	var ww = $(window).width();
	var wh = $(window).height();

	setTimeout(() => { console.log("ES2015 FTW"); }, 1000);


	/** TEMPLATE FUNCTIONS */
	/** ================================================== */

	var templateFunctions = {


		/** Scroll Position */
		scrollPosition: function() {

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
		siteNotification: function() {

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
		sitePreloader: function() {

			$('.preloader').fadeOut();

		},

		/** Site Menu */
		siteMenu: function() {

			// Traditional Menu
            $('ul.sf-menu').superfish({
                animation: { opacity: 'show', top: "220%" },
                animationOut: {opacity:'hide', top: "260%" },
                speed: 'fast',
                delay: 600,
            });

            // Modern Menu
            $('#mobile-menu .tn-menu').tendina({
            	speed: 200,
            });

		},


        /** Lightbox */
        lightBox: function() {

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


		/** Site Overlay */
		siteOverlay: function() {

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

		/** Grid Functions */
		gridFunctions: function() {

                var init = {


                	/** Grid Item Filtration **/
                	gridFiltration: function() {
			            var filterLink = '#portfolio-widget ul.widget-list li a';
			            var gridContainer = '.grid';


						$(filterLink).click(function(event) {
							event.preventDefault();

							var filterClass = $(this).data('filter');

							// show/hide grid items based on criteria
							if (filterClass == '*') {

								$('.grid-item', gridContainer).removeClass('is-animated')
									.fadeOut(100).finish().promise().done(function() {
									$('.grid-item', gridContainer).each(function(i) {
										$(this).addClass('is-animated').delay((i++) * 200).fadeIn(100);
									});
								});

							} else {

								$('.grid-item', gridContainer).removeClass('is-animated')
									.fadeOut(100).finish().promise().done(function() {
									$('.grid ' + filterClass).each(function(i) {
										$(this).addClass('is-animated').delay((i++) * 200).fadeIn(100);
									});
								});
							}

							// add/remove classes on filtration links
							$(filterLink).removeClass('active');
							$(this).addClass('active');
			                $('#search-filter, #search-filter .widget-wrap').removeClass('animate-in');
						})

                	},

                	gridIE: function() {

                		var cssGridCheck = $('html').hasClass('no-cssgrid');

						if ( cssGridCheck ) {

	                		var $grid = $('.grid');

							$grid.packery({
								itemSelector: '.grid-item',
							});

	                	}

	                }

				}			

				// execute on DOM ready
				init.gridFiltration();
				init.gridIE();

				// re-execute on 'afterInfiniteScroll' triggger
				$('body').on('afterInfiniteScroll', function() {
					// init.gridItemImg();
				});

		},
		

		/** Sticky Header */
		stickyHeader: function() {

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
		pageHeader: function() {

			var site_header_h = $('#site-header').outerHeight(true);
			var main_content_m = parseInt( $('#main-content').css('margin-top') );
			var page_header_h = wh - (site_header_h + main_content_m);

			$('#page-header.fullscreen').height(page_header_h)

		},


		/** Flickity Carousel */
		flickityCarousel: function() {

    	var is_flickity = true;
    	// var is_flickity = $('body').hasClass('is-flickity-enabled');

      if (is_flickity) {

				// init Flickity instance
				var $carousel = $('.main-carousel').flickity({
					cellAlign: 'left',
					contain: true,
					wrapAround: true,
				});


				// configure progress bar
				var time = 8;
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

				function startProgressbar() {
					resetProgressbar();
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
							startProgressbar();
						}
					}
				}

				function resetProgressbar() {
					$bar.css({
						width: 0+'%' 
					});
					clearTimeout(tick);
				}

				startProgressbar();


				/** reset progress on slide scroll event */
				$carousel.on( 'scroll.flickity', function( event, progress ) {
					startProgressbar();
				});

			}

		},


		/** Infinite Scroll */
		infiniteScroll: function() {

            // some checks
			var is_blog = $('body').hasClass('blog') || $('body').hasClass('archive') || $('body').hasClass('search');
			var is_load_more = $('#load-more').length;

			// defining some data (for 'infiniteScroll')
            var $container 	 = is_blog ? $('.blog-minimal') : $('.grid');
            var item 		 = is_blog ? '.type-post' : '.grid-item';
            var loadMore 	 = '#load-more';
			var load_trigger = $container.data('load-trigger');
			
            // let's start the engines
			var startEngine = {

                init: function(){

					$container.infiniteScroll({
						append: item,
						path: '#load-more a',
						loadOnScroll: (load_trigger == 'button') ? false : true,
						button: loadMore,
						status: '.page-load-status',
						// debug: true,
					});

					// 0: current state of 'infiniteScroll' instance
					var infScroll = $container.data('infiniteScroll');

					// 1: triggers when making request for the next page to be loaded
					$container.on( 'request.infiniteScroll', function( event, path ) {
						if (load_trigger == 'button') {
							$(loadMore).fadeOut(200); // add spinning animation while loading 
						}
					});

					// 2: triggers when next page loaded but not appended
					$container.on( 'load.infiniteScroll', function( event, response, path ) {
						if (load_trigger == 'button') {
							$(loadMore).fadeIn(200); // add spinning animation while loading 
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

		/** Twitter Carousel */
		twitterCarousel: function() {

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

		/** Site Transitions */
		siteTransitions: function() {

			var $grid = $('.grid');

            var init = {

				/** animate-in whole container */
        animateInContainer: function(){

					$('#site-container').addClass('animate-in');  
					$('#page-header .scroll-indicator').addClass('animate-in');  

        },

				/** animate-in individual items with interval in-between */
        animateInItems: function(items){

					$(items).each(function() {
						setTimeout((function(){
							$(this).addClass('animate-in');
						}).bind(this), $(this).index() * 50 + 100); 
					});

					// $(items).each(function(i) {
					// 	$(this).addClass('animate-in').delay((i++) * 200).fadeIn();
					// });

        },

				/** animate on scroll */
        animateOnScroll: function(){

					$(window).on( 'scroll' , function() {
						if ($(window).scrollTop() >= 300) {
							$('#social-share, #page-controls').addClass('animate-in');
						} else {
							$('#social-share, #page-controls').removeClass('animate-in');
						}
					});

                },

				/** make BG passive on scroll */
        makeBgPassive: function(){

					$(window).on( 'scroll' , function() {
						if ($(window).scrollTop() >= 100) {
							$('.hero-header .media').addClass('passive');
							$('#page-header .scroll-indicator').removeClass('animate-in');  
						} else {
							$('.hero-header .media').removeClass('passive');
							$('#page-header .scroll-indicator').addClass('animate-in');  
						}
					});            

                },

				/** animate-in whole container */
        processLocalLinks: function(){

					/** identify all local links */
					$('a:not([href*=#])').filter(function() {
					   return this.hostname && this.hostname === location.hostname;
					}).addClass('local-link');

					/** identify all native link */
					$('#load-more a, ul.widget-list li a').filter(function() {
						$(this).addClass('native-link');
					});

					/** animate-out when a local-link is clicked */
					$('a.local-link').not('a.native-link').on( 'click' , function() {
						$('#site-container').removeClass('animate-in');
						$('.preloader').fadeIn();
					});

                },

            }


			// execute on DOM ready
            init.animateInContainer();
            init.animateInItems('.grid .grid-item');
            // init.animateInItems('.blog-minimal .post, .grid .grid-item');
            init.animateOnScroll();
            init.makeBgPassive();
            init.processLocalLinks();

			// re-execute on 'afterInfiniteScroll' triggger
			$('body').on('afterInfiniteScroll', function(event, items) {

				setTimeout((function(){
					init.animateInItems(items);
				}), 400); 

			});

		},

		/** Elementor Fix */
		elementorFix: function() {

			// progress bar
			$('.elementor-progress-bar').each(function() {
				var leftPos = $(this).data('max');
				$('.elementor-progress-percentage', this).css('left',  leftPos + '%');
			});

			// wp-galery margins
			$('.wp-gallery .image').each(function() {
				var rightMargin = $(this).css('margin-right');
				$(this).css('margin-bottom',  rightMargin);
			});

		},


	}


	/** LOAD */
	/** ================================================== */

	$(window).bind('load', function() {

		/** Load template functions */
		templateFunctions.scrollPosition();
		templateFunctions.siteNotification();
		templateFunctions.sitePreloader();
		templateFunctions.siteMenu();
		templateFunctions.lightBox();
		templateFunctions.siteOverlay();
		templateFunctions.gridFunctions();
		templateFunctions.stickyHeader();
		templateFunctions.pageHeader();
		templateFunctions.flickityCarousel();
		templateFunctions.twitterCarousel();
		templateFunctions.infiniteScroll();
		templateFunctions.siteTransitions();
		templateFunctions.elementorFix();

	});




	/** RESIZE */
	/** ================================================== */

	$(window).bind('resize', function() {

		/** Load template functions */

	});


})( jQuery );