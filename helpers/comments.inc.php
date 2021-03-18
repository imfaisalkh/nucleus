<?php

#-----------------------------------------------------------------#
# Comment Template
#-----------------------------------------------------------------#


	if ( !function_exists('nucleus_comments') ) {

		function nucleus_comments($comment, $args, $depth) {
		
	        $isByAuthor = false;

	        if($comment->comment_author_email == get_the_author_meta('email')) {
	            $isByAuthor = true;
	        }

	        $GLOBALS['comment'] = $comment; ?>

	        <?php if ( $comment->comment_type == 'pingback' || $comment->comment_type == 'trackback' ) { ?>

	        	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	        		<div class="author"><?php esc_html_e('Pingback:', '_nucleus') ?> <?php echo wp_kses( get_comment_author_link(), 'general' ); ?></div>

	        <?php } else { ?>

		        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

		            <div class="comment-wrap">

		            	<div class="comment-header">
		            		
		                    <!-- Avatar -->
		                    <?php if ( $args['avatar_size'] != 0 ) : ?>

			                    <div class="author-avatar">
			                        <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			                    </div>

		                    <?php endif; ?>

				            <!-- Meta -->
				            <div class="comment-meta">
				                <div class="author"><?php echo wp_kses( get_comment_author_link(), 'general' ); ?></div>
				                <div class="time">
									<?php
										// Helper Variable(s)
										$date_format = get_theme_mod('nucleus_blog_date_format', 'standard');
									?>
									<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
										<?php if ($date_format == 'human') { ?>
											<?php printf( _x( '%s ago', '%s = human-readable time difference', '_nucleus' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
										<?php } else { ?>
											<?php echo get_comment_date(); ?>	
										<?php } ?>
									</a>
				                </div>
				            </div>

		            	</div>

		                <!-- Body -->
		                <div class="comment-body">

		                    <?php if ($comment->comment_approved == '0') : ?>
		                        <em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.', '_nucleus') ?></em><br />
		                    <?php endif; ?>

		                    <div class="comment-content">
		                        <?php comment_text() ?>
		                    </div>

		                  	<span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', '_nucleus'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>

		                </div>

		            </div>
	        	

	        <?php } ?>

		<?php
		}
	}



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
