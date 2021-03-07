<?php

#-------------------------------------------------------------------------------#
#  Filter the categories archive widget to add a span around post count.
#-------------------------------------------------------------------------------#

    function nucleus_cat_count_span( $links ) {
        $links = str_replace( '</a> (', '</a><span class="post-count">', $links );
        $links = str_replace( ')', '</span>', $links );
        return $links;
    }
    add_filter( 'wp_list_categories', 'nucleus_cat_count_span' );


#-------------------------------------------------------------------------------#
#  Filter the archives widget to add a span around post count.
#-------------------------------------------------------------------------------#

    function nucleus_archive_count_span( $links ) {
        $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">', $links );
        $links = str_replace( ')', '</span>', $links );
        return $links;
    }
    add_filter( 'get_archives_link', 'nucleus_archive_count_span' );