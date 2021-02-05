<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-wrap">
		<h3 class="entry-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h3>
		<span class="timestamp">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', 'nucleus' ); ?>	
			</a>
		</span>
	</div>
</article>