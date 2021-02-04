<?php get_header(); ?>

<?php
	// Helper Variable(s)
    $pagination_type = get_query_var('pagination') ? get_query_var('pagination') : get_theme_mod('nucleus_blog_infinite_scroll', 'button'); // scroll, button
?>

	<!-- Main Content -->
	<div id="main-content">

		<?php get_template_part( 'partials/scaffolding/page-header' ); ?>

		<!-- Page Content -->
		<div id="page-content" class="full-width">

				<?php if ( have_posts() ) : ?>

					<!-- BEGIN: BLOG LIST -->
					<section class="blog-minimal" data-load-trigger="<?php echo $pagination_type; ?>">

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/blog/master-page' ); ?>
						<?php endwhile; ?>	

					</section>
					<!-- END: BLOG LIST -->

					<?php include(locate_template( 'partials/scaffolding/load-more.php' )); ?>

				<?php else: ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

		</div>

	</div>

	<!-- BEGIN: INSTAGRAM MODULE -->
	<section id="instagram-module">
		<div class="container">
			
		</div>
	</section>
	<!-- END: INSTAGRAM MODULE -->	
		
<?php get_footer(); ?>