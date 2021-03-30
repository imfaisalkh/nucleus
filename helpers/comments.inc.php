<?php
#-------------------------------------------------------------------------------#
#  Comments Navigation
#-------------------------------------------------------------------------------#


	if ( ! function_exists( 'nucleus_comment_nav' ) ) {

		function nucleus_comment_nav() {
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '_nucleus' ); ?></h2>
				<div class="nav-links">
					<?php
						if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', '_nucleus' ) ) ) :
							printf( '<div class="nav-previous">%s</div>', $prev_link );
						endif;

						if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', '_nucleus' ) ) ) :
							printf( '<div class="nav-next">%s</div>', $next_link );
						endif;
					?>
				</div><!-- .nav-links -->
			</nav><!-- .comment-navigation -->
			<?php
			endif;
		}

	}



#-------------------------------------------------------------------------------#
#  Disable URL field from comments form
#-------------------------------------------------------------------------------#


	function nucleus_disable_comment_url($fields) { 
	    unset($fields['url']);
	    return $fields;
	}
	add_filter('comment_form_default_fields','nucleus_disable_comment_url');
