// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const textual_page = $('body').hasClass('portfolio-textual')
    var $cell = $('#textual-slider .main-carousel .carousel-cell a')

    // Functions Object
    var portfolio = {

        // Private: Change Color Scheme
        _change_color_scheme: function(index) {

            let root = document.querySelector('body'); // :root HTML element
            let primary_accent_color, secondary_accent_color, background_color, text_color
            let active_cell

            if (index == 0) {
                active_cell = $('#textual-slider .main-carousel .carousel-cell').first()
            } else {
                active_cell = $(index).parents('.carousel-cell')
            }

            primary_accent_color = active_cell.attr('data-primary-accent-color')
            secondary_accent_color = active_cell.attr('data-secondary-accent-color')
            background_color = active_cell.attr('data-bg-color')
            text_color = active_cell.attr('data-text-color')

            root.style.setProperty('--primary-accent', primary_accent_color);
            root.style.setProperty('--secondary-accent', secondary_accent_color);
            root.style.setProperty('--background-color', background_color);
            root.style.setProperty('--text-color', text_color);

            $('body').trigger('changeSkin');
        },

        /** textual Carousel */
        hover: function() {

            // assign current scope to self
            let self = this
            
            function activate_default_cell() {
                $('#textual-slider').addClass('is-interactive')
                $('#textual-slider .main-carousel .carousel-cell').first().addClass('is-selected')
                self._change_color_scheme(0)
            }

            // activate default cell on load
            activate_default_cell()

            $('#textual-slider .main-carousel .carousel-cell a').on({
                mouseenter: function() {
                    $('#textual-slider').addClass('is-interactive')
                    $('.carousel-cell').removeClass('is-selected')
                    $(this).parents('.carousel-cell').addClass('is-selected')
                    self._change_color_scheme(this)
                    console.log('THIS', this)
                },
                mouseleave: function() {
                    $('#textual-slider').removeClass('is-interactive')
                    $(this).parents('.carousel-cell').removeClass('is-selected')
                    activate_default_cell()
                }
            })

        },

        
    }  

    // Initialize Functions
    if (textual_page) {
        portfolio.hover();
    }
})
