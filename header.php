<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <!-- Pingback
        ================================================== -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <!-- WP Head
        ================================================== -->
        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

        <!-- BEGIN: ROOT CONTAINER -->
        <div id="root-container">

            <!-- PRELOADER -->
            <div class="preloader">
                <div class="loader-icon">
                    <div class="dot-1"></div>
                    <div class="dot-2"></div>
                    <div class="dot-3"></div>
                </div>            
            </div>

            <!-- HERO HEADER -->
            <?php $background_video = get_field('background_video') ? get_field('background_video') : false; ?>
            <div class="hero-header">
                <?php if ($background_video) { ?>
                    <video class="background-video media" playsinline autoplay muted loop>
                        <source src="<?php echo esc_url($background_video); ?>" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                <?php } else { ?>
                    <div class="background-image media"></div>
                <?php } ?>
            </div>

            <!-- BEGIN: SITE CONTAINER -->
            <main id="site-container">

                <!-- BEGIN: SITE HEADER -->
                <header id="site-header">

                    <?php get_template_part( 'partials/scaffolding/primary-navigation' ); ?>

                </header>
                <!-- END: SITE HEADER -->


                <!-- BEGIN: SITE BODY -->
                <section id="site-body">