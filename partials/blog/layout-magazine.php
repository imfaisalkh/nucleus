<?php
	// Helper Variable(s)
	$image_size = (isset($is_slider_post) && $is_slider_post) || is_sticky() ? 'nucleus-blog-magazine-featured' : 'nucleus-blog-magazine-grid';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="entry-thumbnail" data-size="<?php echo esc_attr($image_size); ?>">
		<img src="<?php the_post_thumbnail_url($image_size); ?>">
	</figure>
	<div class="inner-wrap">
		<?php if(isset($is_slider_post) && $is_slider_post) { ?>
			<span class="featured"><?php echo esc_html__('Editor\'s Choice', 'nucleus'); ?></span>
		<?php } else if(is_sticky()) {?>
			<span class="featured"><?php echo esc_html__('Featured Post', 'nucleus'); ?></span>
		<?php } ?>
		<h3 class="entry-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="entry-desc">
			<?php if((isset($is_slider_post) && $is_slider_post)) { ?>
				<?php echo get_the_excerpt(); ?>
			<?php } else if(is_sticky()) { ?>
				<?php nucleus_excerpt(28); ?>
			<?php } else { ?>
				<?php nucleus_excerpt(); ?>
			<?php } ?>
        </p>
		<span class="timestamp">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', 'nucleus' ); ?>	
			</a>
		</span>
	</div>
</article>