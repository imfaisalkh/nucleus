// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var portfolio_global = {

        // Align Conatiner to the Top
        align_to_top: function() {
            const is_full_screen_page = $('body').hasClass('portfolio-horizon') || $('body').hasClass('portfolio-spotlight') || $('body').hasClass('portfolio-forza') || $('body').hasClass('portfolio-textual') || $('body').hasClass('portfolio-columns')
            
            if (is_full_screen_page) {
                const margin_top = $('#site-header').css('margin-top')
                $('#site-body').css('top', '-' + margin_top)
                
                const is_admin_bar = $('body').hasClass('admin-bar')
                const admin_bar_height = $('#wpadminbar').height()
                const container_height = is_admin_bar ? $(window).height() - admin_bar_height : $(window).height()
                $('#site-body').css('height', container_height)
                
                const site_header_height = $('#site-header').height()
                const vertical_offset = parseInt(margin_top, 10) + site_header_height
                const final_offset = is_admin_bar ? vertical_offset - admin_bar_height : vertical_offset
                $('.vertical-line').css('top', '-' + final_offset + 'px')
            }
        },

        // All Works
        all_works: function() {
            $('.all-works .content').scrollbar()

            // open "all works" menu
            $('.all-works .trigger').on('click', function() {
                $(this).parent().find('.content').addClass('animate-in')
            })

            // close "all works" menu
            $(document).on('click', function (e) {
                if ($(e.target).closest('.all-works').length === 0) {
                    $('.all-works .content').removeClass('animate-in')
                }
            });
        },
        
    }  

    // Initialize Functions
    portfolio_global.align_to_top();
    portfolio_global.all_works();

    $(window).on('resize', function () {
        portfolio_global.align_to_top();
    })
})
