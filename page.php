<?php get_header(); ?>


	<div id="main-content">

		<?php get_template_part( 'partials/scaffolding/page-header' ); ?>

		<!-- Page Content -->
		<div id="page-content">

			<?php while( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>	

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
			<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>