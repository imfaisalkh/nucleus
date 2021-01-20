// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var blog = {


		/** Infinite Scroll */
		load_more: function() {

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
        
    }  

    $(window).on('load', function() {
        blog.load_more();
    }); 
})
