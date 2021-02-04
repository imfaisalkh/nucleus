<?php
	
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

<div id="ribbon-slider">
    <div class="intro">
        <div class="inner">
            <h5 class="prefix">Hello</h5>
            <h4 class="title">I am Olema Krenel, internationally recognized photographer & designer.</h4>
        </div>
    </div>
    <div class="slider">
        <h4 class="title">Selected Works</h4>
        <div class="main-carousel">

            <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

                <?php
                    // Others
                    $folio_terms = implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
                    $folio_permalink = get_post_meta(get_the_ID(), 'custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'custom_url', true) ) : esc_url( get_permalink() );
                ?>

                <div class="carousel-cell">
                    <img class="carousel-image" src="<?php the_post_thumbnail_url(); ?>">
                </div>

            <?php endwhile; ?>

        </div>
    </div>

    <div class="slider-controls">
        <div class="progress-bar">
            <span class="progress"></span>
        </div>
        <div class="all-works"><a href="#">All Works</a></div>
        <div class="counter">
			<span class="current"></span><span class="total"></span>
		</div>
    </div>
</div>