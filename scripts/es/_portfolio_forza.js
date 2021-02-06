// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const forza_page = $('body').hasClass('portfolio-forza')
    var $carousel = $('#forza-slider .main-carousel')

    // Functions Object
    var portfolio = {

        // Private: Change Color Scheme
        _change_color_scheme: function(index) {
            let root = document.querySelector('body'); // :root HTML element
            const active_cell = $('#forza-slider .main-carousel .carousel-cell').eq(index)

            const primary_accent_color = active_cell.attr('data-primary-accent-color')
            const secondary_accent_color = active_cell.attr('data-secondary-accent-color')
            const background_color = active_cell.attr('data-bg-color')
            const text_color = active_cell.attr('data-text-color')

            const darker_bg = tinycolor(background_color).darken(12).toString(); 

            root.style.setProperty('--primary-accent', primary_accent_color);
            root.style.setProperty('--secondary-accent', darker_bg);
            root.style.setProperty('--background-color', background_color);
            root.style.setProperty('--text-color', text_color);
        },

        /** forza Carousel */
        carousel: function() {

            // assign current scope to self
            let self = this

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {
                // change color scheme (on load)
                $carousel.on( 'ready.flickity', function() {
                    self._change_color_scheme(0)
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
                    self._change_color_scheme(index)
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

                // parallax image
                // var $imgs = $carousel.find('.carousel-cell img');
                // var docStyle = document.documentElement.style; // get transform property
                // var transformProp = typeof docStyle.transform == 'string' ? 'transform' : 'WebkitTransform';

                // var flkty = $carousel.data('flickity'); // get Flickity instance
                // $carousel.on( 'scroll.flickity', function() {
                //     flkty.slides.forEach( function( slide, i ) {
                //       var img = $imgs[i];
                //       var x = ( slide.target + flkty.x ) * -1/3;
                //       img.style[ transformProp ] = 'translateX(' + x  + 'px)';
                //     });
                // });

            }

        },

        
    }  

    // Initialize Functions
    if (forza_page) {
        portfolio.carousel();
    }
})
