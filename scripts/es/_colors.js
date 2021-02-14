// Export Functions
export default jQuery(function($) {
    'use strict';

    // determine base color pallete
    let root = window.getComputedStyle(document.body); // :root HTML element
    const primary_accent_color = root.getPropertyValue('--primary-accent')
    const secondary_accent_color = root.getPropertyValue('--secondary-accent')
    const background_color = root.getPropertyValue('--background-color')
    const text_color = root.getPropertyValue('--text-color')

    // determine active color scheme
    let is_light_color_scheme = $('body').hasClass('light-base-color-scheme')
    let is_dark_color_scheme = $('body').hasClass('dark-base-color-scheme')
    let is_custom_color_scheme = $('body').hasClass('custom-base-color-scheme')

    // Functions Object
    var colors = {

        get_base_color_scheme: function() {
            let is_light_color_scheme = $('body').hasClass('light-base-color-scheme')
            if (is_light_color_scheme)
                return 'light-base-color-scheme'

            let is_dark_color_scheme = $('body').hasClass('dark-base-color-scheme')
            if (is_dark_color_scheme)
                return 'dark-base-color-scheme'

            let is_custom_color_scheme = $('body').hasClass('custom-base-color-scheme')
            if (is_custom_color_scheme) {
                let is_light_bg = tinycolor(background_color).isLight()
                if (is_light_bg) {
                    return 'light-base-color-scheme'
                } else {
                    return 'dark-base-color-scheme'
                }
            }
        },


        /** Base Colors */
        base_colors: function() {
            // Check if DYNAMIC color scheme is active
            let is_custom_color_scheme = $('body').hasClass('custom-base-color-scheme')

            if (!is_custom_color_scheme)
                return

            // Get base color scheme
            let base_color_scheme = this.get_base_color_scheme()

            // Set color scheme if LIGHT base scheme is active
            if (base_color_scheme == 'light-base-color-scheme') {
                let background_highlight = tinycolor(background_color).darken(10).toString()
                document.body.style.setProperty('--background-highlight', background_highlight);

                let backdrop_color = tinycolor(background_color).darken(10).toString()
                document.body.style.setProperty('--backdrop-color', backdrop_color);

                let sidebar_title = tinycolor(background_color).darken(30).toString()
                document.body.style.setProperty('--sidebar-title', sidebar_title);

                let sidebar_trigger_color = tinycolor(background_color).darken(5).toString()
                document.body.style.setProperty('--sidebar-trigger-color', sidebar_trigger_color);

                // Modal
                let menu_subtitle = tinycolor(modal_background).darken(50).setAlpha(.7).toString()
                document.body.style.setProperty('--menu-subtitle', menu_subtitle);
            }

            // Set color scheme if DARK base scheme is active
            if (base_color_scheme == 'dark-base-color-scheme') {
                let background_highlight = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--background-highlight', background_highlight);
                
                let backdrop_color = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--backdrop-color', backdrop_color);

                let sidebar_title = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--sidebar-title', sidebar_title);

                let sidebar_trigger_color = tinycolor(background_color).lighten(5).toString()
                document.body.style.setProperty('--sidebar-trigger-color', sidebar_trigger_color);

                // Modal
                let menu_subtitle = tinycolor(modal_background).lighten(40).setAlpha(.7).toString()
                document.body.style.setProperty('--menu-subtitle', menu_subtitle);
            }

            // If any color scheme
            let headroom_background = tinycolor(background_color).setAlpha(.9).toString()
            document.body.style.setProperty('--headroom-background', headroom_background);

            let modal_background = tinycolor(background_color).setAlpha(.9).toString()
            document.body.style.setProperty('--modal-background', modal_background);

        },

        /** Form Colors */
        form_colors: function() {
            // Check if DYNAMIC color scheme is active
            let is_dynamic_color_scheme = $('body').hasClass('dynamic-form-color-scheme')

            if (!is_dynamic_color_scheme)
                return

            // Get base color scheme
            let base_color_scheme = this.get_base_color_scheme()
            
            // Set color scheme if LIGHT base scheme is active
            if (base_color_scheme == 'light-base-color-scheme') {
                let form_field_bg = tinycolor(background_color).darken(5).toString()
                document.body.style.setProperty('--form-field-background-color', form_field_bg);

                let form_field_text = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--form-field-text-color', form_field_text);

                let form_field_border = tinycolor(background_color).darken(6).toString()
                document.body.style.setProperty('--form-field-border-color', form_field_border);

                let form_field_focus_bg = tinycolor(background_color).darken(7).toString()
                document.body.style.setProperty('--form-field-background-color-focus', form_field_focus_bg);

                let form_field_focus_text = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--form-field-text-color-focus', form_field_focus_text);

                let form_field_focus_border = tinycolor(background_color).darken(9).toString()
                document.body.style.setProperty('--form-field-border-color-focus', form_field_focus_border);

                let form_field_button_bg = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--form-button-background-color', form_field_button_bg);

                let form_field_button_border = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--form-button-border-color', form_field_button_border);

                let form_field_button_text = tinycolor(background_color).lighten(3).toString()
                document.body.style.setProperty('--form-button-text-color', form_field_button_text);

                let form_field_button_hover_bg = tinycolor(background_color).darken(100).toString()
                document.body.style.setProperty('--form-button-background-color-hover', form_field_button_hover_bg);

                let form_field_button_hover_border = tinycolor(background_color).darken(100).toString()
                document.body.style.setProperty('--form-button-border-color-hover', form_field_button_hover_border);

                let form_field_button_hover_text = tinycolor(background_color).lighten(3).toString()
                document.body.style.setProperty('--form-button-text-color-hover', form_field_button_hover_text);

                let form_field_label = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--form-text-label-color', form_field_label);
            }

            // Set color scheme if DARK base scheme is active
            if (base_color_scheme == 'dark-base-color-scheme') {
                let form_field_bg = tinycolor(background_color).lighten(10).toString()
                document.body.style.setProperty('--form-field-background-color', form_field_bg);

                let form_field_text = tinycolor(background_color).lighten(90).toString()
                document.body.style.setProperty('--form-field-text-color', form_field_text);

                let form_field_border = tinycolor(background_color).lighten(17).toString()
                document.body.style.setProperty('--form-field-border-color', form_field_border);

                let form_field_focus_bg = tinycolor(background_color).lighten(13).toString()
                document.body.style.setProperty('--form-field-background-color-focus', form_field_focus_bg);

                let form_field_focus_text = tinycolor(background_color).lighten(90).toString()
                document.body.style.setProperty('--form-field-text-color-focus', form_field_focus_text);

                let form_field_focus_border = tinycolor(background_color).lighten(21).toString()
                document.body.style.setProperty('--form-field-border-color-focus', form_field_focus_border);

                let form_field_button_bg = tinycolor(background_color).lighten(90).toString()
                document.body.style.setProperty('--form-button-background-color', secondary_accent_color);

                let form_field_button_border = tinycolor(background_color).lighten(90).toString()
                document.body.style.setProperty('--form-button-border-color', secondary_accent_color);

                let form_field_button_text = tinycolor(secondary_accent_color).darken(90).toString()
                document.body.style.setProperty('--form-button-text-color', form_field_button_text);

                let form_field_button_hover_bg = tinycolor(secondary_accent_color).darken(20).toString()
                document.body.style.setProperty('--form-button-background-color-hover', form_field_button_hover_bg);

                let form_field_button_hover_border = tinycolor(secondary_accent_color).darken(20).toString()
                document.body.style.setProperty('--form-button-border-color-hover', form_field_button_hover_border);

                let form_field_button_hover_text = tinycolor(background_color).darken(3).toString()
                document.body.style.setProperty('--form-button-text-color-hover', form_field_button_hover_text);

                let form_field_label = tinycolor(background_color).lighten(90).toString()
                document.body.style.setProperty('--form-text-label-color', form_field_label);
            }

        },

        /** Menu Colors */
        menu_colors: function() {
             // Check if DYNAMIC color scheme is active
             let is_dynamic_color_scheme = $('body').hasClass('dynamic-menu-color-scheme')

             if (!is_dynamic_color_scheme)
                return
 
             // Get base color scheme
             let base_color_scheme = this.get_base_color_scheme()

            // Set color scheme if LIGHT base scheme is active
            if (base_color_scheme == 'light-base-color-scheme') {
                let menu_bg = tinycolor(background_color).darken(90).toString()
                document.body.style.setProperty('--menu-background', menu_bg);

                let menu_text = tinycolor(menu_bg).lighten(90).toString()
                document.body.style.setProperty('--menu-text', menu_text);

                let menu_bg_hover = tinycolor(menu_text).darken(85).toString()
                document.body.style.setProperty('--menu-background-hover', menu_bg_hover);

                let menu_text_hover = tinycolor(menu_text).darken(85).toString()
                document.body.style.setProperty('--menu-text-hover', menu_text_hover);

                let menu_seperator = tinycolor(menu_bg).lighten(15).toString()
                document.body.style.setProperty('--menu-seperator', menu_seperator);

                let menu_caption = tinycolor(menu_text).darken(60).toString()
                document.body.style.setProperty('--menu-caption', menu_caption);
            }

            // Set color scheme if DARK base scheme is active
            if (base_color_scheme == 'dark-base-color-scheme') {
                let menu_bg = tinycolor(background_color).lighten(100).toString()
                document.body.style.setProperty('--menu-background', menu_bg);

                let menu_text = tinycolor(menu_bg).darken(90).toString()
                document.body.style.setProperty('--menu-text', menu_text);

                let menu_bg_hover = tinycolor(menu_text).lighten(87).toString()
                document.body.style.setProperty('--menu-background-hover', menu_bg_hover);

                let menu_text_hover = tinycolor(menu_bg).darken(90).toString()
                document.body.style.setProperty('--menu-text-hover', menu_text_hover);

                let menu_seperator = tinycolor(menu_bg).darken(15).toString()
                document.body.style.setProperty('--menu-seperator', menu_seperator);

                let menu_caption = tinycolor(menu_text).lighten(60).toString()
                document.body.style.setProperty('--menu-caption', menu_caption);
            }

        },

    }  

    // Initialize Functions
    colors.base_colors();
    colors.form_colors();
    colors.menu_colors();

    // re-execute on 'changeSkin' triggger
    $('body').on('changeSkin', function(event, items) {
        colors.base_colors();
        colors.form_colors();
        colors.menu_colors();
    });
})
