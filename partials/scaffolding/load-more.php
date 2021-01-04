<?php

	global $wp_query;

	$is_posts_page = is_home() || is_archive() || is_search();

	$total_pages = $is_posts_page ? $wp_query->max_num_pages : $portfolio_query->max_num_pages;
	$current_page = get_query_var('page') ? get_query_var('page') : 1;

	// var_dump( $total_pages );

 ?>

<?php if ( $current_page < $total_pages ) { ?>

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
	<div id="load-more" class="load-more" data-current-page="<?php echo $current_page; ?>" data-total-pages="<?php echo $total_pages; ?>" data-post-type="<?php echo get_post_type(); ?>" data-page-id="<?php echo get_queried_object_id(); ?>">
		<?php 
		if (!$is_posts_page) {
			next_post_types_link( __('Load More &#8230;', 'nucleus'), $total_pages, $current_page, $portfolio_query );
		} else {
			next_posts_link( __('Load More &#8230;', 'nucleus'), $total_pages );
		}
		?>
	</div>
	
<?php } ?>


