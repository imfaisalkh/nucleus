<?php get_header(); ?>

	<!-- Main Content -->
	<div id="main-content">

		<div class="flexed-area">

			<!-- Page Content -->
			<div id="page-content" class="with-sidebar">

				<?php while( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/blog/detail-page' ); ?>
				<?php endwhile; ?>

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>

			</div>

			<aside id="page-sidebar">
				<?php get_sidebar(); ?>
			</aside>

		</div>

	</div>

<?php get_footer(); ?>