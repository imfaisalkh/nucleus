// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const tiles_page = $('body').hasClass('portfolio-tiles')
    var $carousel_container = $('.portfolio-container')
    var $carousel = $('#tiles-slider .main-carousel')

    // Functions Object
    var portfolio = {

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

            var is_flickity = true
            let slide_duration = $carousel_container.data('slide-duration')
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {
              
                // init flickity instance
                $carousel.flickity({
                    contain: true,
                    wrapAround: true,
                    // percentPosition: false,
                    prevNextButtons: false,
                    // groupCells: true
                });
                
                // start progress bar
                self._configure_progress_bar(slide_duration)
            }

        },

        
    }  

    // Initialize Functions
    if (tiles_page) {
        portfolio.carousel();
    }
})
