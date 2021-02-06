// Export Functions
export default jQuery(function($) {
    'use strict';

    // Functions Object
    var pages = {


		/** Twitter Carousel */
		twitter_carousel: function() {

            var is_flickity = $('body').hasClass('is-flickity-enabled');
    
            if (is_flickity) {
    
                    // init Flickity instance
                    var $carousel = $('.twitter-carousel').flickity({
                        cellSelector: '.tweet',
                        pageDots: false,
                        arrowShape: 'M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z'
                    });
    
            }
    
        },
        
        /** Elementor Fix */
        elementor_fix: function() {

            // progress bar
            $('.elementor-progress-bar').each(function() {
                var leftPos = $(this).data('max');
                $('.elementor-progress-percentage', this).css('left',  leftPos + '%');
            });

            // wp-galery margins
            $('.wp-gallery .image').each(function() {
                var rightMargin = $(this).css('margin-right');
                $(this).css('margin-bottom',  rightMargin);
            });

        },


    }  

    // Initialize Functions
    pages.twitter_carousel();
    pages.elementor_fix();
})
