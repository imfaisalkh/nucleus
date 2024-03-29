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

        <?php wp_body_open(); ?>

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

            <!-- BEGIN: SITE CONTAINER -->
            <main id="site-container">

                <!-- BEGIN: SITE BODY -->
                <section id="site-body">