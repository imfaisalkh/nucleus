<?php

	// WP_QUERY Arguments
	$blog_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
        'posts_per_page' => $_GET['posts_per_page'],
		'orderby' => $_GET['menu_order'],
		'order' => $_GET['ASC'],
		'paged' => $_GET['page']
	);

	// store query result in variable
	$blog_query = new WP_Query( $blog_args );

	// loop through query variable
	if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();

		get_template_part( 'partials/blog/layout', $_GET['loop_style'] );

	endwhile; endif;