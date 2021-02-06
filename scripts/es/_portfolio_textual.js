// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const textual_page = $('body').hasClass('portfolio-textual')
    var $cell = $('#textual-slider .main-carousel .entry-cell a')

    // Functions Object
    var portfolio = {

        // Private: Change Color Scheme
        _change_color_scheme: function(index) {

            let root = document.querySelector('body'); // :root HTML element
            let primary_accent_color, secondary_accent_color, background_color, text_color

            if (index == 0) {
                let dark_root = document.querySelector('body.dark-color-scheme');

                primary_accent_color = '#ffea36'
                secondary_accent_color = '#43f3b7'
                background_color = '#000'
                text_color = '#FFF'

                console.log("PRIMARY ACCENT:", primary_accent_color)
            } else {
                let active_cell = $(index).parents('.entry-cell')
    
                primary_accent_color = active_cell.attr('data-primary-accent-color')
                secondary_accent_color = active_cell.attr('data-secondary-accent-color')
                background_color = active_cell.attr('data-bg-color')
                text_color = active_cell.attr('data-text-color')
            }

            root.style.setProperty('--primary-accent', primary_accent_color);
            root.style.setProperty('--secondary-accent', secondary_accent_color);
            root.style.setProperty('--background-color', background_color);
            root.style.setProperty('--text-color', text_color);
        },

        /** textual Carousel */
        hover: function() {

            // assign current scope to self
            let self = this

            $('#textual-slider .main-carousel .entry-cell a').on({
                mouseenter: function() {
                    $('#textual-slider').addClass('is-interactive')
                    $(this).parents('.entry-cell').addClass('is-selected')
                    self._change_color_scheme(this)
                },
                mouseleave: function() {
                    $('#textual-slider').removeClass('is-interactive')
                    $(this).parents('.entry-cell').removeClass('is-selected')
                    self._change_color_scheme(0)
                }
            })

        },

        
    }  

    // Initialize Functions
    if (textual_page) {
        portfolio.hover();
    }
})
