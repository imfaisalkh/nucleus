// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var portfolio = {


		/** Grid Functions */
		grid: function() {

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
    

        /** Flickity Carousel */
        carousel: function() {

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {

                // init Flickity instance
                var $carousel = $('#featured-slider .main-carousel').flickity({
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

        
    }  

    $(window).on('load', function() {
        portfolio.grid();
        portfolio.carousel();
    }); 
})
