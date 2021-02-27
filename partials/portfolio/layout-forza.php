<?php
	
	// Portfolio Style
	$portfolio_style = 'forza'; // used for image size allocation

	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
	}

	// Hover Variable(s)
	$portfolio_effect = '';

	// Slider Configuration
	$slide_duration = get_field('portfolio_slide_duration') ? get_field('portfolio_slide_duration') : 8;
	
	// Portfolio Configuration
	$portfolio_featured_posts = get_field('portfolio_featured_posts') ? get_field('portfolio_featured_posts') : null;
	
	// WP_QUERY Arguments
	$portfolio_slider_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_featured_posts,
		'orderby' 		=> 'post__in'

	);

	$portfolio_slider_query = new WP_Query($portfolio_slider_args);

?>

<?php if ( $portfolio_slider_query->have_posts() && $portfolio_featured_posts  ) { ?>

	<div id="forza-slider" class="portfolio-container no-hover" data-effect="<?php echo esc_attr($portfolio_effect); ?>" data-slide-duration="<?php echo esc_attr($slide_duration); ?>">

		<div class="main-carousel">

			<?php $counter = 1; ?>
			<?php while ( $portfolio_slider_query->have_posts() ) : $portfolio_slider_query->the_post(); ?>
				<?php include(locate_template( 'partials/portfolio/includes/carousel-cell.php' )); ?>
				<?php $counter++; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		</div>

		<?php include(locate_template( 'partials/portfolio/includes/carousel-controls.php' )); ?>

	</div>

<?php } else { ?>
	<?php get_template_part('content', 'none'); ?>
<?php } ?>