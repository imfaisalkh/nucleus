<?php get_header(); ?>

<?php

	// Original Variable(s)
	$portfolio_page_global	= get_permalink( get_theme_mod('nucleus_portfolio_page') );
	$portfolio_page 		= get_field('portfolio_page') ? get_field('portfolio_page') : $portfolio_page_global;
	$custom_url 			= get_field('custom_url');

	// Entry Navigation
	$is_prev_entry = !empty( get_adjacent_post(false,'',false) );
	$is_next_entry = !empty( get_adjacent_post(false,'',true) );

	$prev_entry_class = $is_prev_entry ? '' : 'no-more-content';
	$next_entry_class = $is_next_entry ? '' : 'no-more-content';

?>

	<div id="main-content">

		<?php get_template_part( 'partials/scaffolding/page-header' ); ?>

		<!-- Page Content -->
		<div id="page-content" class="full-width">

			<?php while( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

			<?php if( empty( get_the_content() ) ) : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<nav class="navigation">
				<div class="prev <?php echo $prev_entry_class; ?>"><a href="<?php echo get_permalink( get_adjacent_post(false,'',false) ); ?>"><?php esc_html_e('Prev', 'nucleus'); ?><i class="fi fi-back"></i></a></div>
				<div class="index"><a href="<?php echo esc_url( $portfolio_page ); ?>"><i class="fi fi-grid"></i></a></div>
				<div class="next <?php echo $next_entry_class; ?>"><a href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?> "><i class="fi fi-next"></i><?php esc_html_e('Next', 'nucleus'); ?></a></div>
			</nav>

		</div>

	</div>

<?php get_footer(); ?>