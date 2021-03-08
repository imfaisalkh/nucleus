// Import Functions
import { init_progress_bar, set_color_scheme } from './_util'

// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const spotlight_page = $('body').hasClass('portfolio-spotlight')
    var $carousel_container = $('#spotlight-slider')
    var $carousel = $('#spotlight-slider .main-carousel')

    // Functions Object
    var portfolio = {

        /** spotlight Carousel */
        carousel: function() {

            // assign current scope to self
            let self = this

            var is_flickity = true
            let slide_duration = $carousel_container.data('slide-duration')

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
                    setGallerySize: false,
                    arrowShape: 'M71.1066 13.0002L8.10661 13.0002M8.8995 23.3997L1.5 13.5002L8.89949 3.60068L8.8995 23.3997Z'
                });

                // change color scheme (on change)
                $carousel.on( 'change.flickity', function( event, index ) {
                    set_color_scheme($carousel_container, index)
                });
                
                // start progress bar
                init_progress_bar($carousel, slide_duration)

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
    if (spotlight_page) {
        portfolio.carousel();
    }
})
