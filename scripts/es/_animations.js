// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var animations = {

        /** Site Transitions */
        site_transitions: function() {

            var $grid = $('.grid');

            var init = {

                /** animate-in whole container */
                animateInContainer: function(){
                    $('#site-container').addClass('animate-in');  
                    $('#page-header .scroll-indicator').addClass('animate-in');  
                },

                /** animate-in individual items with interval in-between */
                animateInItems: function(items){
                    $(items).each(function() {
                        setTimeout((function(){
                            $(this).addClass('animate-in');
                        }).bind(this), $(this).index() * 50 + 100); 
                    });

                    // $(items).each(function(i) {
                    // 	$(this).addClass('animate-in').delay((i++) * 200).fadeIn();
                    // });
                },

                /** animate on scroll */
                animateOnScroll: function(){

                    $(window).on( 'scroll' , function() {
                        if ($(window).scrollTop() >= 300) {
                            $('#social-share, #page-controls').addClass('animate-in');
                        } else {
                            $('#social-share, #page-controls').removeClass('animate-in');
                        }
                    });

                },

                /** make BG passive on scroll */
                makeBgPassive: function(){

                    $(window).on( 'scroll' , function() {
                        if ($(window).scrollTop() >= 100) {
                            $('.hero-header .media').addClass('passive');
                            $('#page-header .scroll-indicator').removeClass('animate-in');  
                        } else {
                            $('.hero-header .media').removeClass('passive');
                            $('#page-header .scroll-indicator').addClass('animate-in');  
                        }
                    });            

                },

                /** animate-in whole container */
                processLocalLinks: function(){
                    // comma seperate list of links to exclude
                    let exclude_links = 'li.menu-item-has-children a, #load-more a'

                    /** identify all local links */
                    $('a:not([href*=\\#])').not(exclude_links).filter(function() {
                        return this.hostname && this.hostname === location.hostname;
                    }).addClass('local-link');

                    /** identify all native link */
                    $('#load-more a, ul.widget-list li a').filter(function() {
                        $(this).addClass('native-link');
                    });

                    /** animate-out when a local-link is clicked */
                    $('a.local-link').on( 'click' , function() {
                        $('#site-container').removeClass('animate-in');
                        $('.preloader').fadeIn();
                    });

                },

            }


            // execute on DOM ready
            init.animateInContainer();
            init.animateInItems('.grid .grid-item');
            // init.animateInItems('.blog-minimal .post, .grid .grid-item');
            init.animateOnScroll();
            init.makeBgPassive();
            init.processLocalLinks();

            // re-execute on 'afterInfiniteScroll' triggger
            $('body').on('afterInfiniteScroll', function(event, items) {

                setTimeout((function(){
                    init.animateInItems(items);
                }), 400); 

            });

        },



    }  

    // Initialize Functions
    animations.site_transitions();
})
