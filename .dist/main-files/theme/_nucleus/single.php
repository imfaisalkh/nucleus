<?php get_header(); ?>

	<!-- Main Content -->
	<div id="main-content">

		<?php get_template_part( 'partials/scaffolding/page-header' ); ?>

		<!-- Page Content -->
		<div id="page-content">

			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/blog/detail-page' ); ?>
			<?php endwhile; ?>

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
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