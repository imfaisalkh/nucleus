<?php
	// portfolio category
	$folio_terms 			= implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));

	// entry dimension
	$thumbnail_dimension    = get_field('thumbnail_dimension');
	$thumbnail_height 		= $thumbnail_dimension['height'];
	$thumbnail_width 		= $thumbnail_dimension['width'];

	// entry url
	$folio_permalink 		= get_field('custom_url') ? get_field('custom_url') : get_permalink();
	$lightbox_attr 			= get_field('custom_url') && get_field('open_in_lightbox') ? 'rel=lightbox' : '';


	// secondary image
	$secondary_img = get_field('secondary_image');
	$secondary_img_class = $secondary_img ? 'has-secondary-image' : '';

?>

<!-- PORTFOLIO ENTRY -->
<article id="post-<?php the_ID(); ?>" <?php post_class("grid-item $thumbnail_height $thumbnail_width $secondary_img_class"); ?>>

	<a class="entry-link" href="<?php echo esc_url($folio_permalink); ?>" title="<?php the_title_attribute(); ?>" <?php echo esc_attr($lightbox_attr); ?>>
		
		<figure class="entry-thumbnail">
			<img class="primary" src="<?php the_post_thumbnail_url('nucleus-portfolio-grid'); ?>" alt="<?php the_title_attribute(); ?>">
			<?php if ($secondary_img) { ?>
				<img class="secondary" src="<?php echo esc_url($secondary_img); ?>" alt="<?php the_title_attribute(); ?>">
			<?php } ?>
		</figure>

		<header class="entry-caption">
			<div class="inner-wrap">
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<?php if ( $folio_terms ) { ?>
					<span class="entry-meta"><?php echo esc_html( $folio_terms ); ?></span>
				<?php } ?>
			</div>
		</header>

	</a>    

</article>