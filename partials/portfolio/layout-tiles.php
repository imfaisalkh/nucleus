<?php

    $portfolio_hover = get_query_var('hover') ? get_query_var('hover') : 'cursor';

	// Portfolio Configuration - Meta Panel
	$portfolio_posts = [550, 562, 560, 565, 552];
	
	// WP_QUERY Arguments
	$portfolio_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_posts,
		'orderby' 		=> 'post__in'

	);

	$portfolio_query = new WP_Query($portfolio_args);

?>

<div id="tiles-slider">
    <div class="columns">
        <div class="column text">
            <div class="inner">
                <h5 class="prefix">Hello</h5>
                <h2 class="title">Featured Works</h2>
                <p>This is a few hand-picked projects from Aln’s portfolio.</p>
                <a href="#" class="button">Get In Touch</a>
            </div>
        </div>
        <div class="column slider">
            <div class="portfolio-container main-carousel" data-hover="<?php echo esc_attr($portfolio_hover); ?>">

                <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

                    <?php
                        // Others
                        $folio_terms = implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
                        $folio_permalink = get_post_meta(get_the_ID(), 'custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'custom_url', true) ) : esc_url( get_permalink() );
                    ?>

                    <div <?php post_class("carousel-cell type-portfolio"); ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                        <a href="<?php echo $folio_permalink; ?>" title="<?php the_title(); ?>" >
                            <div class="entry-caption">
                                <h3 class="entry-title"><?php the_title(); ?></h3>
                                <?php if ( $folio_terms ) { ?>
                                    <span class="entry-meta"><?php echo esc_html( $folio_terms ); ?></span>
                                <?php } ?>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>

            </div>            
        </div>
    </div>

    <div class="slider-controls">
        <div class="progress-bar">
            <span class="progress"></span>
        </div>
        <div class="all-works"><a href="#">All Works</a></div>
    </div>
</div>