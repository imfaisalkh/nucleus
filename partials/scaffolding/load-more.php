<?php

	global $wp_query;

	// Identity Variable(s)
	$is_posts_page = is_home() || is_archive() || is_search();
	$post_type = (get_post_type() == 'post') ? 'post' : 'portfolio';

	// Source Variable(s)
	$portfolio_categories = get_field('portfolio_categories') ? get_field('portfolio_categories') : '';
	
	// Style Variable(s)
	$blog_layout = get_query_var('blog') ? get_query_var('blog') : get_theme_mod('nucleus_blog_layout', 'minimal');
	$loop_style = get_field('portfolio_style') ? get_field('portfolio_style') : $blog_layout;

	// Other Variable(s)
	$total_pages = $is_posts_page ? $wp_query->max_num_pages : $portfolio_query->max_num_pages;
	$posts_count = ($post_type == 'portfolio') ? $portfolio_count : get_option('posts_per_page');
	$term_IDs = ($post_type == 'portfolio' && is_array($portfolio_categories)) ? implode(',', $portfolio_categories) : '';
 
	if ($pagination_type == 'number' && !is_front_page()) {
		$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
	} else {
		$current_page = get_query_var('page') ? get_query_var('page') : 1;
	}
 ?>

<!--- Load More Pagination --->
<?php if ( $current_page < $total_pages ) { ?>
	<?php if ($pagination_type == 'button' || $pagination_type == 'scroll') { ?>

		<!-- Infinite Scroll - (Status) -->
		<div class="page-load-status">
			<div class="infinite-scroll-request">
				<div class="loader-icon">
					<div class="dot-1"></div>
					<div class="dot-2"></div>
					<div class="dot-3"></div>
				</div> 
			</div>
		</div>

		<!-- Load More - (Button) -->
		<div id="load-more" class="load-more" data-current-page="<?php echo esc_attr($current_page); ?>" data-total-pages="<?php echo esc_attr($total_pages); ?>" data-post-type="<?php echo esc_attr($post_type); ?>" data-page-id="<?php echo get_queried_object_id(); ?>" data-posts-per-page="<?php echo esc_attr($posts_count); ?>" data-term-ids="<?php echo esc_attr($term_IDs); ?>" data-loop-style="<?php echo esc_attr($loop_style); ?>">
			<?php if (!$is_posts_page) {
				next_post_types_link( __('Load More &#8230;', '_nucleus'), $total_pages, $current_page, $portfolio_query );
			} else {
				next_posts_link( __('Load More &#8230;', '_nucleus'), $total_pages );
			} ?>
		</div>

	<?php } ?>
<?php } ?>


<!--- Numberd Pagination --->
<?php if ( $total_pages > 1 ) { ?>
	<?php if ($pagination_type == 'number') { ?>
		<div id="numbered-pagination">
			<span class="label"><?php echo esc_html__('Pages:', '_nucleus'); ?></span>
			<nav class="links">
				<?php
					echo paginate_links(array(
						'base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ),
						'format' => '?page=%#%',
						'current' => $current_page,
						'total' => $total_pages,
					));
				?> 
			</nav>
		</div>
	<?php } ?>
<?php } ?>
