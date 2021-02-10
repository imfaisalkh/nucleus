<?php
	
	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
	}


	// Portfolio Configuration - Meta Panel
	$portfolio_featured_posts = get_field('portfolio_featured_posts') ? get_field('portfolio_featured_posts') : null;

	// WP_QUERY Arguments
	$portfolio_slider_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_featured_posts,
		'orderby' 		=> 'post__in'

	);

	$portfolio_slider_query = new WP_Query($portfolio_slider_args);
?>

<?php if ( $portfolio_slider_query->have_posts() && $portfolio_featured_posts ) { ?>

	<div id="classic-slider">

		<div class="main-carousel">

			<?php while ( $portfolio_slider_query->have_posts() ) : $portfolio_slider_query->the_post(); ?>
				<?php include(locate_template( 'partials/portfolio/includes/carousel-cell.php' )); ?>
			<?php endwhile; ?>

		</div>

		<?php include(locate_template( 'partials/portfolio/includes/carousel-controls.php' )); ?>

	</div>

<?php } ?>