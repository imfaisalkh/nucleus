<?php
	
	// Portfolio Style
	$portfolio_style = 'textual'; // used for image size allocation

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

<?php if ( $portfolio_slider_query->have_posts() && $portfolio_featured_posts ) { ?>

<div id="textual-slider" class="portfolio-container no-hover">


    <div class="main-carousel">

        <?php while ( $portfolio_slider_query->have_posts() ) : $portfolio_slider_query->the_post(); ?>
            <?php include(locate_template( 'partials/portfolio/includes/carousel-cell.php' )); ?>
        <?php endwhile; ?>

    </div>

    <?php include(locate_template( 'partials/portfolio/includes/carousel-controls.php' )); ?>

	<span class="bg-image"></span>

</div>

<?php } else { ?>
	<p><?php echo esc_html__('No featured post defined.', 'nucleus'); ?></p>
<?php } ?>