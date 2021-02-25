// Import Functions
import { set_color_scheme } from './_util'

// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const forza_page = $('body').hasClass('portfolio-forza')
    var $carousel_container = $('#forza-slider')
    var $carousel = $('#forza-slider .main-carousel')

    // Functions Object
    var portfolio = {

        /** forza Carousel */
        carousel: function() {

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {
                // change color scheme (on load)
                $carousel.on( 'ready.flickity', function() {
                    set_color_scheme($carousel_container, 0)
                });

                // init flickity instance
                $carousel.flickity({
                    contain: true,
                    wrapAround: true,
                    fade: true,
                    arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
                });

                // change color scheme (on change)
                $carousel.on( 'change.flickity', function( event, index ) {
                    set_color_scheme($carousel_container, index)
                });

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

    // Initialize Functions
    if (forza_page) {
        portfolio.carousel();
    }
})
