<?php
	
	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
	}

	// Custom Header - Meta Panel - (Original)
	$header_title	 		= get_field('header_title', $post_ID);
	$header_subtitle	 	= get_field('header_subtitle', $post_ID);
	$header_backdrop	 	= get_field('header_backdrop', $post_ID);
	$header_text_size	 	= get_field('header_text_size', $post_ID);
	$header_icon 			= get_field('header_icon', $post_ID);

	$header_button	 		= get_field('header_button', $post_ID);
	$button_title			= isset($header_button['title']) ? $header_button['title'] : '';
	$button_url				= isset($header_button['url']) ? $header_button['url'] : '';
	$button_target			= isset($header_button['target']) ? $header_button['target'] : '';

	$header_style			= get_field('header_style', $post_ID);
	$is_hero_standard		= ($header_style == 'is_standard');
	$is_hero_header			= ($header_style == 'is_hero');
	$is_blank_header		= ($header_style == 'is_blank');
	$is_disabled_header		= ($header_style == 'is_disabled');

	$header_style_class		= ($is_hero_header || $is_blank_header) ? 'fullscreen' : 'compact';

	$header_border			= get_field('header_disable_border');
	$header_border_class 	= $header_border || (is_singular('post') && has_post_thumbnail()) ? 'no-border' : '';

	$page_header_class		= $header_style_class .' '. $header_border_class;

	// Custom Header - Meta Panel - (Page Fallback)
	$header_title	 		= $header_title ? $header_title : get_the_title();

	// Custom Header - Meta Panel - (Folio Fallback)
	if( is_singular('portfolio') ) {
		$folio_terms 			= implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
		$header_subtitle	 	=  $header_subtitle ? $header_subtitle : $folio_terms;
	}

	// Custom Header - - Meta Panel - (General Fallback)
    if( is_search() ) {
        $header_title = esc_html__( 'Search Results.', '_nucleus' );
        $header_subtitle = sprintf( esc_html__( 'For the term "%s"', '_nucleus' ), get_search_query() );
    } else if( is_category() ) {
        $header_title = esc_html__( 'Category.', '_nucleus' );
        $header_subtitle = sprintf( esc_html__( 'Entries published in "%s" Category', '_nucleus' ), single_cat_title( '', false ) );
    } else if( is_tag() ) {
        $header_title = esc_html__( 'Tag.', '_nucleus' );
        $header_subtitle = sprintf( esc_html__( 'Entries published in "%s" Tag', '_nucleus' ), single_tag_title( '', false ) );
    } else if( is_date() ) {
        $header_title = esc_html__( 'Archive.', '_nucleus' );
        if ( is_day() ) {
            $header_subtitle = sprintf( esc_html__( 'Entries published in "%s"', '_nucleus' ), get_the_date() );
        } else if ( is_month() ) {
            $header_subtitle = sprintf( esc_html__( 'Entries published in "%s"', '_nucleus' ), get_the_date( 'F Y' ) );
        } else {
            $header_subtitle = sprintf( esc_html__( 'Entries published in "%s"', '_nucleus' ), get_the_date( 'Y' ) );
        }
    } else if( is_author() ) {
        $header_title = esc_html__( 'Author.', '_nucleus' );
        $header_subtitle = sprintf( esc_html__( 'Entries published by "%s"', '_nucleus' ), get_the_author() );
    } else if( is_home() ) {
        $header_title = esc_html__( 'My Journal.', '_nucleus' );
    }

	// Others
	$color_scheme_class		= is_page_template( 'template-portfolio.php' ) || is_singular('portfolio') ? 'dark' : 'light';
?>

<?php if ( !is_page_template( 'template-portfolio.php' ) && !$is_disabled_header ) { ?>

	<!-- Page Header -->
	<header id="page-header" class="<?php echo esc_attr($page_header_class); ?>" data-text-size="<?php echo esc_attr($header_text_size); ?>">
		<?php if ( !$is_blank_header ) { ?>
			<div class="inner-wrap">
				<?php if ( is_singular('post') ) { ?>
					<?php
						// Helper Variable(s)
						$category 	= get_the_category();
						$name 		= $category[0]->cat_name;
						$cat_id 	= get_cat_ID( $name );
						$link 		= get_category_link( $cat_id );
					?>
					<span class="category"><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html($name); ?></a></span>
				<?php } else if (is_home()) { ?>
					<?php
					    global $post;
						$loop = get_posts( 'numberposts=1&order=ASC' );
						$oldest_post_ID = $loop[0]->ID; 
					?>
					<span class="timestamp"><?php echo esc_html__('Since', '_nucleus'); ?> <?php echo get_the_date('Y', $oldest_post_ID); ?></span>
				<?php } ?>
				<?php if ($header_icon) { ?>
					<img src="<?php echo esc_url($header_icon); ?>" />
				<?php } ?>
				<?php if ($header_backdrop) { ?>
					<span class="backdrop"><?php echo esc_html($header_backdrop); ?></span>
				<?php } ?>
				<?php if ((!$header_backdrop && (is_home() || is_archive() || is_search())) || is_singular('post')) { ?>
					<span class="backdrop"><?php echo esc_html__('Blog', '_nucleus'); ?></span>
				<?php } ?>
				<h3 class="title"><?php echo wp_kses_post($header_title); ?></h3>
				<?php if (is_home() && get_theme_mod('nucleus_blog_featured_cats')) { ?>
					<ul class="categories">
						<li class="active"><a href="<?php echo esc_url( home_url('/') ); ?>">All</a></li>
						<?php wp_list_categories( array(
							'include'  => explode(',', get_theme_mod('nucleus_blog_featured_cats')),
							'title_li' => ''
						)); ?> 
					</ul>
				<?php } ?>
				<?php if ( $header_subtitle ) { ?>
					<p class="subtitle"><?php echo esc_html($header_subtitle); ?></p>
				<?php } ?>
				<?php if ( $button_title && $is_hero_header ) { ?>
					<a class="button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html($button_title); ?></a>
				<?php } ?>
				<?php if ( is_singular('post') ) { ?>
					<?php
						// Helper Variable(s)
						$post_author_ID = get_post_field( 'post_author', $post_ID );
					?>
					<div class="timestamp">
						<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', '_nucleus' ); ?>	
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if ( $is_hero_header || $is_blank_header ) { ?>
			<div class="scroll-indicator">
				<a href="#page-content">
					<span class="icon"><i class="fi fi-mouse" aria-hidden="true"></i></span>
				</a>
			</div>
		<?php } ?>
	</header>

<?php } ?>