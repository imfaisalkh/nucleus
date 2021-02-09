<?php

#-------------------------------------------------------------------------------#
#  Add Custom Query Vars to acces them via `get_query_var()`
#-------------------------------------------------------------------------------#

function nucleus_custom_query_vars( $vars ) {
    $vars[] = "blog";
    $vars[] = "skin";
    $vars[] = "caption";
    $vars[] = "filter";
    $vars[] = "effect";
    $vars[] = "pagination";
    $vars[] = "header";
    $vars[] = "footer";

    return $vars;
}
add_filter('query_vars','nucleus_custom_query_vars');