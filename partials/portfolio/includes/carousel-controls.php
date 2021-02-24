<div class="progress-bar">
    <span class="progress"></span>
</div>

<div class="all-works">
    <a class="trigger" href="#"><?php echo esc_html__('All Works', 'nucleus'); ?></a>
    <div class="content active">
        <?php
            
            // WP_QUERY Arguments
            $portfolio_all_works_args = array(
                'post_type' 	=> 'portfolio',
                'posts_per_page'    => -1,
            );
            
            // Source Variable(s)
            $portfolio_categories = get_field('portfolio_categories');

            if ($portfolio_categories) {
                $portfolio_all_works_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'portfolio_category',
                        'terms' => $portfolio_categories
                    )
                );
            }

            $portfolio_all_works = new WP_Query($portfolio_all_works_args);
        ?>
        <ul>
            <?php if ( $portfolio_all_works->have_posts() ) { ?>
                <?php while ( $portfolio_all_works->have_posts() ) : $portfolio_all_works->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <?php } else { ?>
                <li><?php echo esc_html__('No More Projects', 'nucleus'); ?></li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="counter">
    <span class="current"></span><span class="total"></span>
</div>