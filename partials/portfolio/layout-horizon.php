<?php
	
	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
	}


	// Portfolio Configuration - Meta Panel
	$portfolio_slider_posts = [530, 532, 534];
	
	// WP_QUERY Arguments
	$portfolio_slider_args = array(
		'post_type' 	=> 'portfolio',
		'post__in'    	=> $portfolio_slider_posts,
		'orderby' 		=> 'post__in'

	);

	$portfolio_slider_query = new WP_Query($portfolio_slider_args);

?>

<?php if ( $portfolio_slider_query->have_posts() ) { ?>

	<div id="horizon-slider">

		<div class="main-carousel">

			<?php while ( $portfolio_slider_query->have_posts() ) : $portfolio_slider_query->the_post(); ?>

				<?php
					// Color Scheme
					$color_scheme 	= get_field('color_scheme', get_the_ID());
					$custom_color   = get_field('custom_colors', get_the_ID());
				
					// Custom Colors
					$primary_accent = $custom_color['primary_accent'];
					$secondary_accent = $custom_color['secondary_accent'];
					$background_color = $custom_color['background_color'];
					$text_color = $custom_color['text_color'];

					// Others
					$folio_terms = implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
					$folio_permalink = get_post_meta(get_the_ID(), 'custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'custom_url', true) ) : esc_url( get_permalink() );
				?>

				<div class="carousel-cell" data-primary-accent-color="<?php echo $primary_accent; ?>" data-secondary-accent-color="<?php echo $secondary_accent; ?>" data-bg-color="<?php echo $background_color; ?>" data-text-color="<?php echo $text_color; ?>">
					<img class="carousel-image" src="<?php the_post_thumbnail_url(); ?>">
					<div class="carousel-desc">
						<a href="<?php echo $folio_permalink; ?>" title="<?php the_title(); ?>" >
							<h3 class="title"><?php the_title(); ?></h3>
							<?php if ( $folio_terms ) { ?>
								<span class="tags"><?php echo esc_html( $folio_terms ); ?></span>
							<?php } ?>
						</a>
					</div>
				</div>

			<?php endwhile; ?>

		</div>

		<div class="progress-bar">
			<span class="progress"></span>
		</div>

		<div class="all-works"><a href="#">All Works</a></div>
		<div class="counter">
			<span class="current"></span><span class="total"></span>
		</div>

	</div>

<?php } ?>