
// Initialize Progress Bar
export const init_progress_bar = function(carousel = '.main-carousel', time = 8) {
    var time = time;
    var $bar, $slick, isPause, tick, percentTime;

    $bar = jQuery('.progress-bar .progress');

    jQuery('.main-carousel').on({
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
            carousel.flickity( 'next' )
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
    carousel.on( 'scroll.flickity', function( event, progress ) {
        start_progress_bar()
    });
}

// Change Color Scheme Dynamically
export const set_color_scheme = function(carousel_container, index) {
    let root = document.querySelector('body'); // :root HTML element
    const active_cell = jQuery('.main-carousel .carousel-cell', carousel_container).eq(index)

    const primary_accent_color = active_cell.attr('data-primary-accent-color')
    const secondary_accent_color = active_cell.attr('data-secondary-accent-color')
    const background_color = active_cell.attr('data-bg-color')
    const text_color = active_cell.attr('data-text-color')

    root.style.setProperty('--primary-accent', primary_accent_color);
    root.style.setProperty('--secondary-accent', secondary_accent_color);
    root.style.setProperty('--background-color', background_color);
    root.style.setProperty('--text-color', text_color);

    jQuery('body').trigger('changeSkin');
}