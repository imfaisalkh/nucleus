// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var animations = {

        /** animate-in whole container */
        animate_in_container: function(){
            $('#site-container').addClass('animate-in');  
            $('#page-header .scroll-indicator').addClass('animate-in');  
        },


        /** animate-in individual items with interval in-between */
        animate_in_items: function(items){
            $(items).each(function() {
                setTimeout((function(){
                    $(this).addClass('animate-in');
                }).bind(this), $(this).index() * 50 + 100); 
            });

            // $(items).each(function(i) {
            // 	$(this).addClass('animate-in').delay((i++) * 200).fadeIn();
            // });
        },

        /** animate-in whole container */
        local_links: function() {
            // comma seperate list of links to exclude
            let exclude_links = 'li.menu-item-has-children a, #load-more a, a[rel="lightbox"], #portfolio-widget ul.widget-list li a'

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

        /** make BG passive on scroll */
        make_bg_passive: function(){

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

        /** animate on scroll */
        animate_on_scroll: function(){

            $(window).on( 'scroll' , function() {
                if ($(window).scrollTop() >= 300) {
                    $('#social-share, #page-controls').addClass('animate-in');
                } else {
                    $('#social-share, #page-controls').removeClass('animate-in');
                }
            });

        },

    }  

    // Initialize Functions
    animations.animate_in_container();
    animations.animate_in_items('.grid .grid-item');
    // animations.animate_in_items('.blog-minimal .post, .grid .grid-item');
    animations.local_links();
    animations.make_bg_passive();
    animations.animate_on_scroll();

    // re-execute on 'afterInfiniteScroll' triggger
    $('body').on('afterInfiniteScroll', function(event, items) {
        setTimeout((function(){
            animations.animate_in_items(items);
        }), 400); 
    });
})
