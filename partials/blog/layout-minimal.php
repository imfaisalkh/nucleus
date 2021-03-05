<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-wrap">
		<img class="entry-thumb" src="">
		<h3 class="entry-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" data-image="<?php the_post_thumbnail_url('nucleus-blog-minimal'); ?>"><?php the_title(); ?></a>
			<?php if(is_sticky()) { ?>
				<span class="featured"><?php echo esc_html__('Featured', 'nucleus'); ?></span>
			<?php } ?>
		</h3>
		<span class="timestamp">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', 'nucleus' ); ?>	
			</a>
		</span>
	</div>
</article>