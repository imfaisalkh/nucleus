// Export Functions
export default jQuery(function($) {
	'use strict';

    // Functions Object
    var widgets = {

        /** Recent Posts Widget */
        recent_posts: function() {
            $('.widget_recent_entries ul li').each(function(idx, li) {
                let item = $(li)
                item.wrapInner("<div class='inner-wrap'></div>")
            });
        },

        /** Recent Comments Widget */
        recent_comments: function() {
            $('.widget_recent_comments ul li').each(function(idx, li) {
                let item = $(li)
                item.wrapInner("<div class='inner-wrap'></div>")
            });
        },

        /** RSS Widget */
        rss_posts: function() {
            $('.widget_rss ul li').each(function(idx, li) {
                let item = $(li)
                item.wrapInner("<div class='inner-wrap'></div>")
            });
        },

    }  

    // Initialize Functions
    widgets.recent_posts();
    widgets.recent_comments();
    widgets.rss_posts();
})
