<?php
    // Widget Variable(s)
    // $portfolio_category = $this->get_settings( 'category' );
    $portfolio_columns = 4;
    $portfolio_gutter = 30;
    $portfolio_count = 8;
    $portfolio_load_more = "button"; // scroll, button

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

    <section class="grid" data-col="<?php echo esc_attr( $portfolio_columns ); ?>" data-margin="<?php echo esc_attr( $portfolio_gutter ); ?>" data-load-trigger="<?php echo esc_attr( $portfolio_load_more ); ?>" style="grid-gap: <?php echo esc_attr( $portfolio_gutter ); ?>px;">

        <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
            <?php include(locate_template( 'partials/portfolio/includes/classic-loop.php' )); ?>
        <?php endwhile; ?>

    </section>

    <?php include(locate_template( 'partials/scaffolding/load-more.php' )); ?>

<?php else: ?>

    <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>