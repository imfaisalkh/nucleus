<!-- BEGIN: SITE CONTROLS -->
<div id="site-clipboard">

    <!-- Custom Cursor -->
    <div class="cursor">
        <div class="cursor-helper cursor-view">
            <span>VIEW</span>
        </div>

        <div class="cursor-helper cursor-close">
            <span>CLOSE</span>
        </div>

        <div class="cursor-helper cursor-link"></div>
    </div>

    <?php if ( !get_theme_mod('nucleus_notification_disable') ) { ?>

        <!-- Seacrh Filter -->
        <div id="site-notification">
            <a href="#" class="close"><i class="fi fi-close" aria-hidden="true"></i></a>
            <div class="inner-wrap">
                <h3 class="title"><?php echo get_theme_mod('nucleus_notification_title'); ?></h3>
                <div class="content">
                    <?php echo get_theme_mod('nucleus_notification_content'); ?>
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- Seacrh Filter -->
    <div id="search-filter">

        <div class="inner-wrap">

            <a href="#" class="close-link"><i class="fi fi-close" aria-hidden="true"></i></a>

            <!-- SEARCH WIDGET -->
            <div class="search-widget-wrap widget-wrap">  
                <form id="search-widget" class="modal-widget" role="search" method="get" action="<?php echo esc_url( home_url() ); ?>/">
                    <h4 class="widget-title"><?php esc_html_e( 'Type & Hit Enter', 'nucleus' ); ?></h4>
                    <div class="widget-fields">
                        <input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search Term', 'nucleus'); ?>">
                        <input id="searchsubmit" value="<?php esc_html_e('Go', 'nucleus'); ?>" type="submit">
                    </div>
                </form> 
            </div>

            <?php if ( is_page_template( 'template-portfolio.php' ) || is_singular( 'portfolio' ) ) { ?>

                <!-- PORTFOLIO WIDGET -->
                <div class="portfolio-widget-wrap widget-wrap">
                    <div id="portfolio-widget" class="modal-widget">
                        <h4 class="widget-title"><?php esc_html_e( 'Categories', 'nucleus' ); ?></h4>
                        <ul class="widget-list">
                            <li><a data-filter="*" class="active"><?php esc_html_e('All', 'nucleus'); ?></a></li>
                            <?php wp_list_categories(array('child_of' => get_field('portfolio_category'), 'title_li' => '', 'style' => 'none', 'taxonomy' => 'portfolio_category', 'show_option_none'   => '', 'walker' => new Nucleus_Category_Walker())); ?>
                        </ul>              
                    </div>
                </div>

            <?php } else { ?>

                <!-- BLOG WIDGET -->
                <div class="blog-widget-wrap widget-wrap">
                    <div id="blog-widget" class="modal-widget">
                        <h4 class="widget-title"><?php esc_html_e( 'Categories', 'nucleus' ); ?></h4>
                        <ul class="widget-list">
                            <?php wp_list_categories(array('child_of' => get_field('category'), 'title_li' => '', 'style' => 'none', 'taxonomy' => 'category', 'show_option_none'   => '', 'walker' => new Nucleus_Category_Walker())); ?>
                        </ul>              
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>



    <!-- Mobile Menu -->
    <div id="mobile-menu">

        <a href="#" class="close-link"><i class="fi fi-close" aria-hidden="true"></i></a>

        <div class="inner-wrap">

            <div class="menu-wrap">

                <?php 
                $args = array(
                    'theme_location'  => 'nucleus-mobile-navigation',
                    'menu_id'         => 'main-menu',
                    'menu_class'      => 'tn-menu',
                    'fallback_cb'     => 'nucleus_default_menu'
                );

                wp_nav_menu($args);
                ?>


                <div class="menu-caption">
                    <p>We are a Multidisciplinary Design Agency based in United States.</p>
                </div>

            </div>
            
        </div>

    </div>

</div>
<!-- END: SITE CLIPBOARD -->