// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const ribbon_page = $('body').hasClass('portfolio-ribbon')
    var $carousel = $('#ribbon-slider .main-carousel')

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

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {
              
                // init flickity instance
                $carousel.flickity({
                    contain: true,
                    wrapAround: true,
                    prevNextButtons: false,
                    pageDots: false
                });
                
                // start progress bar
                self._configure_progress_bar(80)

                // set counter value (on load)
                let flkty = $carousel.data('flickity'); // get Flickity instance
                let total_slides = flkty.slides.length
                $('.counter .current').html(1)
                $('.counter .total').html(total_slides)
                
                // set counter value (on change)
                $carousel.on( 'change.flickity', function( event, index ) {
                    $('.counter .current').html(index + 1)
                });

            }

        },

        
    }  

    $(window).on('load', function() {
        if (ribbon_page) {
            portfolio.carousel();
        }
    }); 
})
