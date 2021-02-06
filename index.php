<?php get_header(); ?>

<?php
	// Helper Variable(s)
	$blog_layout = get_query_var('blog') ? get_query_var('blog') : get_theme_mod('nucleus_blog_layout', 'minimal');
    $pagination_type = get_query_var('pagination') ? get_query_var('pagination') : get_theme_mod('nucleus_blog_pagination', 'button'); // scroll, button
	$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
?>

	<!-- Main Content -->
	<div id="main-content">

		<?php if ($blog_layout == 'minimal') { ?>
			<?php get_template_part( 'partials/scaffolding/page-header' ); ?>
		<?php } else if ($blog_layout == 'magazine' && $current_page == 1) { ?>
			<?php get_template_part( 'partials/blog/slider-posts' ); ?>
		<?php } ?>

		<!-- Page Content -->
		<div id="page-content" class="full-width">

				<?php if ( have_posts() ) : ?>

					<!-- BEGIN: BLOG LIST -->
					<section class="blog-container blog-<?php echo esc_attr($blog_layout); ?>-inner" data-load-trigger="<?php echo $pagination_type; ?>">

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/blog/layout', $blog_layout ); ?>
						<?php endwhile; ?>	

					</section>
					<!-- END: BLOG LIST -->

					<?php include(locate_template( 'partials/scaffolding/load-more.php' )); ?>

				<?php else: ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

		</div>

	</div>

	<?php if (shortcode_exists( 'instagram-feed' )) { ?>
		<!-- BEGIN: INSTAGRAM MODULE -->
		<section id="instagram-module">
			<div class="container">
				<?php echo do_shortcode('[instagram-feed num=6 cols=6 imagepadding=1 showfollow=false showheader=false]'); ?>
			</div>
		</section>
		<!-- END: INSTAGRAM MODULE -->	
	<?php } ?>
		
<?php get_footer(); ?>