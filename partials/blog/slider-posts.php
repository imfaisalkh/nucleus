<?php
	
	// Blog Configuration - Meta Panel
	$blog_slider_posts =  explode(',', get_theme_mod('nucleus_blog_slider'));
	
	// WP_QUERY Arguments
	$blog_slider_args = array(
		'post_type' 	=> 'post',
		'post__in'    	=> $blog_slider_posts,
		'orderby' 		=> 'post__in',
		'ignore_sticky_posts' => 1
	);

	$blog_slider_query = new WP_Query($blog_slider_args);

	$is_slider_post = true;
?>

<?php if ( $blog_slider_query->have_posts() ) { ?>

	<div id="blog-slider">

		<div class="main-carousel">

			<?php while ( $blog_slider_query->have_posts() ) : $blog_slider_query->the_post(); ?>

				<div class="carousel-cell">
					<?php include(locate_template( 'partials/blog/layout-magazine.php' )); ?>
				</div>

			<?php endwhile; ?>

		</div>

		<div class="progress-bar">
			<span class="progress"></span>
		</div>

	</div>

<?php } ?>