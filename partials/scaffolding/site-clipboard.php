<!-- BEGIN: SITE CONTROLS -->
<div id="site-clipboard">

    <!-- Page Sidebar -->
    <?php if ( is_active_sidebar( 'blog-sidebar' ) && is_home() || is_singular('post') ) { ?>
        <a href="#open-sidebar" class="open-sidebar">
            <i class="fi fi-sidebar-arrow" aria-hidden="true"></i>
        </a>
        <aside id="page-sidebar">
            <a href="#close-sidebar" class="close-sidebar">
                <i class="fi fi-close" aria-hidden="true"></i>
            </a>
            <?php get_sidebar(); ?> 
        </aside>
    <?php } ?>

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
                            <?php wp_list_categories(array('child_of' => get_field('category'), 'depth' => 1, 'title_li' => '', 'style' => 'none', 'taxonomy' => 'category', 'show_option_none'   => '', 'walker' => new Nucleus_Category_Walker())); ?>
                        </ul>              
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>



    <!-- Mobile Menu -->
    <div id="responsive-menu">

        <div class="modal-controls">
            <a href="#" class="close-link"><i class="fi fi-close" aria-hidden="true"></i></a>
            <a href="#back" class="go-back">
                <span class="icon"><i class="fi fi-sidebar-arrow" aria-hidden="true"></i></span>
                <span class="text"><?php echo esc_html__('Go Back', 'nucleus'); ?></span>
            </a>
        </div>

        <div class="boxed">

            <div class="root-menu">

                <?php 
                $args = array(
                    'theme_location'  => 'nucleus-full-screen-menu',
                    'menu_id'         => 'full-screen-menu',
                    'fallback_cb'     => 'nucleus_default_menu'
                );

                wp_nav_menu($args);
                ?>

            </div>

            <div class="child-menus"></div>

        </div>

    </div>

</div>
<!-- END: SITE CLIPBOARD -->