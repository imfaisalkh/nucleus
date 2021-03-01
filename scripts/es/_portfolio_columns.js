// Import Functions
import { init_progress_bar } from './_util'

// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const columns_page = $('body').hasClass('portfolio-columns')
    var $carousel_container = $('.portfolio-container')
    var $carousel = $('#columns-slider .main-carousel')

    // Functions Object
    var portfolio = {

        /** Horizon Carousel */
        carousel: function() {

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
                    groupCells: true
                });
                
                // start progress bar
                init_progress_bar($carousel, slide_duration)
            }

        },

        
    }  

    // Initialize Functions
    if (columns_page) {
        portfolio.carousel();
    }
})
