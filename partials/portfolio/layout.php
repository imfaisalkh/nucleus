<?php
    // Source Variable(s)
    $portfolio_categories = get_field('portfolio_categories') ? get_field('portfolio_categories') : '';
    
    // Hover Variable(s)
    $portfolio_caption = isset($_GET['caption']) ? $_GET['caption'] : (get_field('portfolio_caption_style') ? get_field('portfolio_caption_style') : 'overlay');
    $portfolio_filter = isset($_GET['filter']) ? $_GET['filter'] : (get_field('portfolio_image_filters') ? get_field('portfolio_image_filters') : '');
    $portfolio_effect = isset($_GET['effect']) ? $_GET['effect'] : (get_field('portfolio_image_effects') ? get_field('portfolio_image_effects') : '');
    
    // Layout Variable(s)
    $portfolio_columns = get_field('portfolio_columns_count') ? get_field('portfolio_columns_count') : 4;
    $portfolio_gutter = (get_field('portfolio_gutter_size') || get_field('portfolio_gutter_size') == 0) ? get_field('portfolio_gutter_size') : 30;
    $portfolio_count = get_field('portfolio_count') ? get_field('portfolio_count') : 8;
    $pagination_type = isset($_GET['pagination']) ? $_GET['pagination'] : (get_field('portfolio_pagination') ? get_field('portfolio_pagination') : 'button'); // scroll, button

    // WP_QUERY Arguments
    $portfolio_args = array(
        'post_type' 		=> 'portfolio',
        'posts_per_page'    => $portfolio_count,
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'terms' => $portfolio_categories
            )
        ),
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