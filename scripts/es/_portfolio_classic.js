// Export Functions
export default jQuery(function($) {
    'use strict';

    // Global Variable(s)
    const classic_page = $('body').hasClass('portfolio-classic')
    var $carousel = $('#classic-slider .main-carousel')

    // Functions Object
    var portfolio = {


		/** Grid Functions */
		grid: function() {

            var init = {

                /** Grid Item Filtration **/
                grid_filtration: function() {
                    var filterLink = '#portfolio-widget ul.widget-list li a';
                    var gridContainer = '.grid';


                    $(filterLink).click(function(event) {
                        event.preventDefault();

                        var filterClass = $(this).data('filter');

                        // show/hide grid items based on criteria
                        if (filterClass == '*') {

                            $('.grid-item', gridContainer).removeClass('is-animated')
                                .fadeOut(100).finish().promise().done(function() {
                                $('.grid-item', gridContainer).each(function(i) {
                                    $(this).addClass('is-animated').delay((i++) * 200).fadeIn(100);
                                });
                            });

                        } else {

                            $('.grid-item', gridContainer).removeClass('is-animated')
                                .fadeOut(100).finish().promise().done(function() {
                                $('.grid ' + filterClass).each(function(i) {
                                    $(this).addClass('is-animated').delay((i++) * 200).fadeIn(100);
                                });
                            });
                        }

                        // add/remove classes on filtration links
                        $(filterLink).removeClass('active');
                        $(this).addClass('active');
                        $('#search-filter, #search-filter .widget-wrap').removeClass('animate-in');
                        $('html').removeClass('noscroll-only')
                    })

                },

                grid_IE: function() {

                    var has_no_grid_support = $('html').hasClass('no-cssgrid');

                    if ( has_no_grid_support ) {

                        var $grid = $('.grid');

                        $grid.packery({
                            itemSelector: '.grid-item',
                        });

                    }

                }

            }			

            // execute on DOM ready
            init.grid_filtration();
            init.grid_IE();

            // re-execute on 'afterInfiniteScroll' triggger
            $('body').on('afterInfiniteScroll', function() {
                // init.gridItemImg();
            });

        },
    

        /** Flickity Carousel */
        carousel: function() {

            var is_flickity = true;
            // var is_flickity = $('body').hasClass('is-flickity-enabled');

            if (is_flickity) {

                // init Flickity instance
                $carousel.flickity({
                    cellAlign: 'left',
                    contain: true,
                    wrapAround: true,
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

        /** Hover - Cursor */
        floating_caption: function() {
            $('.portfolio-container[data-caption="float"] .type-portfolio').each(function(el){
                $(this).on('mouseover', function(e) {
                    $('.inner-wrap', this).css('z-index', 10).addClass('animate-in')
                })
                $(this).on('mousemove', function(e) {
                    $('.inner-wrap', this).css('top', e.offsetY + 10 + 'px')
                    $('.inner-wrap', this).css('left', e.offsetX + 10 + 'px')
                })
                $(this).on('mouseleave', function(e) {
                    $('.inner-wrap', this).css('z-index', 1).removeClass('animate-in')
                })
            });
        
        },

        /** Hover - Parallax */
        effect_parallax: function() {
            $('.portfolio-container[data-effect="parallax"] .type-portfolio').each(function(el){
                const height = $(this).height()
                const width = $(this).width()

                $(this).on('mousemove', function(e) {
                    /* Store the x position */
                    const xVal = e.offsetX
                    /* Store the y position */
                    const yVal = e.offsetY

                    /* Calculate rotation valuee along the Y-axis */
                    const yRotation = 10 * ((xVal - width / 2) / width)

                    /* Calculate the rotation along the X-axis */
                    const xRotation = -10 * ((yVal - height / 2) / height)

                    /* Generate string for CSS transform property */
                    $(this).css('transform', 'perspective(500px) scale(1) rotateX(' + xRotation + 'deg) rotateY(' + yRotation + 'deg)')
                })

                $(this).on('mouseout', function(e) {
                    $(this).css('transform', 'perspective(500px) scale(1) rotateX(0) rotateY(0)')
                })
                $(this).on('mousedown', function(e) {
                    $(this).css('transform', 'perspective(500px) scale(0.9) rotateX(0) rotateY(0)')
                })
                $(this).on('mouseup', function(e) {
                    $(this).css('transform', 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)')
                })
            });

        },

         /** Effect - Ken Burns */
         effect_ken_burns: function() {
            $('.portfolio-container[data-effect="ken"] .type-portfolio').each(function(el){
                $(this).on('mouseover', function(e) {
                    $('.inner-wrap', this).css('z-index', 10).addClass('animate-in')
                })
                $(this).on('mousemove', function(e) {
                    $('.inner-wrap', this).css('top', e.offsetY + 10 + 'px')
                    $('.inner-wrap', this).css('left', e.offsetX + 10 + 'px')
                })
                $(this).on('mouseleave', function(e) {
                    $('.inner-wrap', this).css('z-index', 1).removeClass('animate-in')
                })
            });
        
        },
        
    }  

    // Captions
    portfolio.floating_caption();
    
    // Effects
    portfolio.effect_parallax();
    portfolio.effect_ken_burns();


    // re-execute on 'afterInfiniteScroll' triggger
    $('body').on('afterInfiniteScroll', function() {
        portfolio.floating_caption();
        portfolio.effect_parallax();
        portfolio.effect_ken_burns();

    });

    // Initialize Functions
    if (classic_page) {
        portfolio.grid();
        portfolio.carousel();
    }
})
