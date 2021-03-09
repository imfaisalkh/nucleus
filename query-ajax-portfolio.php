<?php

	// WP_QUERY Arguments
	$portfolio_args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
        'posts_per_page' => $_GET['posts_per_page'] ? $_GET['posts_per_page'] : 8,
		'paged' => $_GET['page']
	);

    // append 'tax_query' args if is defined
    if ($_GET['term_ids']) {
        $portfolio_args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'terms' => explode(',', $_GET['term_ids'])
            )
        );
    }

	// store query result in variable
	$portfolio_query = new WP_Query( $portfolio_args );

	// loop through query variable
	if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();

		get_template_part( 'partials/portfolio/includes/classic-loop' );

	endwhile; endif;