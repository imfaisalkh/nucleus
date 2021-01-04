<?php get_header(); ?>

	<!-- Main Content -->
	<div id="main-content">

			<div class="flexed-area">
				
				<!-- Page Content -->
				<div id="page-content" class="with-sidebar">

						<div class="blog-module" data-layout="posts-full-grid">

							<h3 class="title">Latest Stories</h3>
							
							<?php if ( have_posts() ) : ?>

								<!-- BEGIN: BLOG LIST -->
								<section class="posts-loop" data-load-trigger="<?php echo get_theme_mod('nucleus_blog_infinite_scroll', 'button'); ?>">

									<?php $counter = 1; ?>

									<?php while ( have_posts() ) : the_post(); ?>
										<?php include(locate_template( 'partials/blog/primary-loop.php' )); ?>
										<?php $counter++; ?>
									<?php endwhile; ?>	

								</section>
								<!-- END: BLOG LIST -->

								<?php include(locate_template( 'partials/scaffolding/load-more.php' )); ?>

							<?php else: ?>

								<?php get_template_part( 'content', 'none' ); ?>

							<?php endif; ?>

						</div>		

				</div>

				<aside id="page-sidebar">
					<?php get_sidebar(); ?>
				</aside>

			</div>


	</div>

	<!-- BEGIN: BLOG LIST -->
	<section class="advertisement-panel">
		<div class="container">
			<img src="http://localhost/wordpress/nucleus/wp-content/uploads/sites/2/2017/12/feltmag_ad.png">
		</div>
	</section>
	<!-- END: BLOG LIST -->	
		
<?php get_footer(); ?>