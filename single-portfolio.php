<?php get_header(); ?>

<?php

	// Content Width
	$content_width = get_field('page_content_width') ? get_field('page_content_width') : 'compact';

	// Original Variable(s)
	$custom_url = get_field('custom_url');

	// Entry Navigation
	$next_entry = get_adjacent_post(false, '', true);

?>

	<div id="main-content">

		<?php get_template_part( 'partials/scaffolding/page-header' ); ?>

		<!-- Page Content -->
		<div id="page-content" data-content-width="<?php echo esc_attr($content_width); ?>">

			<?php while( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

			<?php if( empty( get_the_content() ) ) : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<nav class="navigation">
				<?php if (!empty( $next_entry )) { ?>
					<span class="caption"><?php echo esc_html__('Next Project', 'nucleus'); ?></span>
					<a class="next-folio" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?> ">
						<?php echo get_the_title($next_entry); ?>
					</a>
				<?php } else { ?>
					<span class="caption"><?php echo esc_html__('End of Line', 'nucleus'); ?></span>
				<?php } ?>
			</nav>

		</div>

	</div>

<?php get_footer(); ?>