<?php

#-----------------------------------------------------------------#
# Ajax Load More
#-----------------------------------------------------------------#

    function nucleus_ajax_load_more() {
                
        get_template_part( 'query-ajax', $_GET['type'] );


        die(); // to avoide 0 at the end

    }

    add_action( 'wp_ajax_nopriv_nucleus_ajax_load_more', 'nucleus_ajax_load_more' );
    add_action( 'wp_ajax_nucleus_ajax_load_more', 'nucleus_ajax_load_more' );