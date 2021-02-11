<?php
	
    // Hover Variable(s)
    $portfolio_caption = 'float';
	$portfolio_effect = 'parallax';

	// Slider Configuration
    $slide_duration = get_field('portfolio_slide_duration') ? get_field('portfolio_slide_duration') : 8;
    
    // Portfolio Configuration
    $portfolio_featured_posts = get_field('portfolio_featured_posts') ? get_field('portfolio_featured_posts') : null;
	
	// WP_QUERY Arguments
	$portfolio_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_featured_posts,
		'orderby' 		=> 'post__in'

	);

	$portfolio_query = new WP_Query($portfolio_args);

?>

<div id="ribbon-slider">
    <div class="intro">
        <div class="inner">
            <h5 class="prefix"><?php echo esc_html__('Hello', 'nucleus'); ?></h5>
            <h4 class="title">I am Olema Krenel, internationally recognized photographer & designer.</h4>
        </div>
    </div>
    <div class="portfolio-container slider" data-caption="<?php echo esc_attr($portfolio_caption); ?>" data-effect="<?php echo esc_attr($portfolio_effect); ?>" data-slide-duration="<?php echo esc_attr($slide_duration); ?>">
        <h4 class="title"><?php echo esc_html__('Selected Works', 'nucleus'); ?></h4>

        <?php if ( $portfolio_query->have_posts() && $portfolio_featured_posts ) { ?>
            <div class="main-carousel">

                <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
				    <?php include(locate_template( 'partials/portfolio/includes/carousel-cell.php' )); ?>
                <?php endwhile; ?>

            </div>
            <?php include(locate_template( 'partials/portfolio/includes/carousel-controls.php' )); ?>
        <?php } else { ?>
            <?php get_template_part('content', 'none'); ?>
        <?php } ?>

    </div>
</div>