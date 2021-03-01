<?php

	// Portfolio Style
	$portfolio_style = 'columns'; // used for image size allocation

    // Hover Effects
    $portfolio_caption = 'float';
    $portfolio_filter = '';
    $portfolio_effect = '';

    // Slider Configuration
    $slide_duration = get_field('portfolio_slide_duration') ? get_field('portfolio_slide_duration') : 8;

	// Portfolio Configuration
	$portfolio_featured_posts = get_field('portfolio_featured_posts') ? get_field('portfolio_featured_posts') : null;
    $portfolio_caption_text = get_field('portfolio_caption');
    $portfolio_button = get_field('portfolio_button');

	// WP_QUERY Arguments
	$portfolio_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_featured_posts,
		'orderby' 		=> 'post__in'

	);

    $portfolio_query = new WP_Query($portfolio_args);

?>

<div id="columns-slider">
    <div class="columns">
        <div class="column text">
            <div class="inner">
                <h5 class="prefix"><?php echo esc_html__('Hello', 'nucleus'); ?></h5>
                <h2 class="title"><?php echo esc_html__('Featured Works', 'nucleus'); ?></h2>
                <?php if ($portfolio_caption_text) { ?>
                    <p><?php echo esc_html($portfolio_caption_text); ?></p>
                <?php } ?>
                <?php if ($portfolio_button) { ?>
                    <a href="<?php echo esc_url($portfolio_button['url']); ?>" class="button"><?php echo esc_html($portfolio_button['title']); ?></a>
                <?php } ?>
            </div>
        </div>
        <div class="column slider">
            <?php if ( $portfolio_query->have_posts() && $portfolio_featured_posts ) { ?>

                <div class="portfolio-container" data-caption="<?php echo esc_attr($portfolio_caption); ?>" data-filter="<?php echo esc_attr($portfolio_filter); ?>" data-effect="<?php echo esc_attr($portfolio_effect); ?>" data-slide-duration="<?php echo esc_attr($slide_duration); ?>">
                    
                    <div class="main-carousel">

                        <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
                            <?php include(locate_template( 'partials/portfolio/includes/carousel-cell.php' )); ?>
                        <?php endwhile; ?>

                    </div>

                    <?php include(locate_template( 'partials/portfolio/includes/carousel-controls.php' )); ?>

                </div>

            <?php } else { ?>
                <?php get_template_part('content', 'none'); ?>
            <?php } ?>          
        </div>
    </div>
</div>