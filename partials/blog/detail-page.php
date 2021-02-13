<?php
	// Helper Variable(s)
	$categories = get_the_category();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="entry-media">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure>
	<?php } ?>


	<div class="entry-content">
		<?php the_content(); ?>					
	</div>

	<div class="entry-footer">

		<div class="author">
			<span><?php echo esc_html__('Post writter by', 'nucleus'); ?></span>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
		</div>

		<?php
			$defaults = array(
				'before'           => '<nav class="navigation pagination"><span class="screen-reader-text">' . esc_html__( 'Pages:', 'nucleus' ) . '</span><div class="nav-links">',
				'after'            => '</div></nav>',
				'link_before'      => '<span class="page-numbers">',
				'link_after'       => '</span>',
			);
		?>
		<?php wp_link_pages( $defaults ); ?>

		<div class="meta">

			<div class="post-tags">
				<?php if ( has_tag() ) { ?>
					<h4 class="title"><?php echo esc_html__('Tags', 'nucleus'); ?></h4>
					<?php the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
				<?php } ?>
			</div>

			<div class="post-categories">
				<?php if ( has_category() ) { ?>
					<h4 class="title"><?php echo esc_html__('Categories', 'nucleus'); ?></h4>
					<?php the_category(); ?>
				<?php } ?>
			</div>

		</div>

	</div>
</article>