<?php
	// Helper Variable(s)
	$categories = get_the_category();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">

		<div class="entry-meta">
			<span class="category"><?php echo esc_html( $categories[0]->name ); ?></span>
			<span class="date">March 21, 2017</span>
		</div>

		<h3 class="entry-title">
			<?php the_title(); ?>
		</h3>

		<div class="entry-author">
			<p>By: <a href="#">Dina Fine Maron</a></p>
		</div>

	</div>	

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

		<div class="row">

			<div class="column" data-span="3">

				<div class="post-tags">
					<?php if ( has_tag() ) { ?>
						<?php the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
					<?php } else { ?>
						<?php the_category(); ?> 
					<?php } ?>
				</div>

			</div>

			<div class="column" data-span="3">

				<?php
				 	$defaults = array(
						'before'           => '<nav class="navigation pagination"><span class="screen-reader-text">' . esc_html__( 'Pages:', 'nucleus' ) . '</span><div class="nav-links">',
						'after'            => '</div></nav>',
						'link_before'      => '<span class="page-numbers">',
						'link_after'       => '</span>',
					);
				?>
				<?php wp_link_pages( $defaults ); ?>

			</div>

		</div>

	</div>
</article>