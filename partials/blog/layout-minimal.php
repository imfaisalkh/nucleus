<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-wrap">
		<?php if (has_post_thumbnail()) { ?>
			<img class="entry-thumb" src="<?php the_post_thumbnail_url('nucleus-blog-minimal'); ?>" alt="<?php the_title(); ?>">
		<?php } ?>
		<h3 class="entry-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			<?php if(is_sticky()) { ?>
				<span class="featured"><?php echo esc_html__('Featured', '_nucleus'); ?></span>
			<?php } ?>
		</h3>
		<span class="timestamp">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php if ($date_format == 'human') { ?>
					<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', '_nucleus' ); ?>	
				<?php } else { ?>
					<?php echo get_the_date(); ?>	
				<?php } ?>
			</a>
		</span>
	</div>
</article>