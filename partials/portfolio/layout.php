<?php
    // Widget Variable(s)
    // $portfolio_category = $this->get_settings( 'category' );
    $portfolio_caption = get_query_var('caption') ? get_query_var('caption') : 'overlay';
    $portfolio_filter = get_query_var('filter') ? get_query_var('filter') : '';
    $portfolio_effect = get_query_var('effect') ? get_query_var('effect') : '';
    $portfolio_columns = 4;
    $portfolio_gutter = 30;
    $portfolio_count = 8;
    $pagination_type = get_query_var('pagination') ? get_query_var('pagination') : get_field('portfolio_pagination'); // scroll, button

    // WP_QUERY Arguments
    $portfolio_args = array(
        'post_type' 		=> 'portfolio',
        'posts_per_page'    => $portfolio_count,
        'paged' 		    => is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' )
    );

    $portfolio_query = new WP_Query($portfolio_args);
?>

<?php include(locate_template( 'partials/portfolio/includes/classic-slider.php' )); ?>

<?php if ( $portfolio_query->have_posts() ) : ?>

    <section class="portfolio-container grid" data-col="<?php echo esc_attr( $portfolio_columns ); ?>" data-margin="<?php echo esc_attr( $portfolio_gutter ); ?>" data-load-trigger="<?php echo esc_attr( $pagination_type ); ?>" style="grid-gap: <?php echo esc_attr( $portfolio_gutter ); ?>px;" data-caption="<?php echo esc_attr($portfolio_caption); ?>" data-filter="<?php echo esc_attr($portfolio_filter); ?>" data-effect="<?php echo esc_attr($portfolio_effect); ?>">

        <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
            <?php include(locate_template( 'partials/portfolio/includes/classic-loop.php' )); ?>
        <?php endwhile; ?>

    </section>

    <?php include(locate_template( 'partials/scaffolding/load-more.php' )); ?>

<?php else: ?>

    <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>