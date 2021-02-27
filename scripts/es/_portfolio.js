// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var portfolio_global = {

        // Align Conatiner to the Top
        align_to_top: function() {
            const is_full_screen_page = $('body').hasClass('portfolio-horizon') || $('body').hasClass('portfolio-spotlight') || $('body').hasClass('portfolio-forza') || $('body').hasClass('portfolio-textual') || $('body').hasClass('portfolio-tiles')
            
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

        // Private: Configure Progress Bar
        _configure_progress_bar: function(time) {
            var time = time;
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
                    $carousel.flickity( 'next' )
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
            $carousel.on( 'scroll.flickity', function( event, progress ) {
                start_progress_bar()
            });
        },

        // All Works
        all_works: function() {
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
