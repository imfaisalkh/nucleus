// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var portfolio = {

        /** Horizon Carousel */
        carousel: function() {

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {

                // init Flickity instance
                var $carousel = $('#horizon-slider .main-carousel').flickity({
                    contain: true,
                    wrapAround: true,
                    arrowShape: 'M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z'
                });

                // change color scheme
                $carousel.on( 'change.flickity', function( event, index ) {
                    let root = document.querySelector('body'); // :root HTML element
                    const active_cell = $('#horizon-slider .main-carousel .carousel-cell').eq(index)

                    const primary_accent_color = active_cell.attr('data-primary-accent-color')
                    const secondary_accent_color = active_cell.attr('data-secondary-accent-color')
                    const background_color = active_cell.attr('data-bg-color')
                    const text_color = active_cell.attr('data-text-color')

                    root.style.setProperty('--primary-accent', primary_accent_color);
                    root.style.setProperty('--secondary-accent', secondary_accent_color);
                    root.style.setProperty('--background-color', background_color);
                    root.style.setProperty('--text-color', text_color);
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
        portfolio.carousel();
    }); 
})
