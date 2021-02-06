                    
                </section>
                <!-- END: SITE BODY -->

                <!-- BEGIN: SITE FOOTER -->
                <?php
                    // Helper Variable(s)
                    if (get_query_var('footer') && (get_query_var('footer') == 'center' || get_query_var('footer') == 'full-width')) {
                        $footer_style = get_query_var('footer');
                    } else {
                        $footer_style = (get_field('site_footer') == 'center' || get_field('site_footer') == 'full-width') ? get_field('site_footer') : get_theme_mod('nucleus_footer_style', 'center');
                    }
                ?>

                <footer id="site-footer" data-footer-style="<?php echo $footer_style; ?>">

                    <?php include(locate_template( 'partials/scaffolding/primary-footer.php' )); ?>

                </footer>
                <!-- END: SITE FOOTER -->

    		</main>
    		<!-- END: SITE CONTAINER -->

            <?php get_template_part( 'partials/scaffolding/site-controls' ); ?>
            <?php get_template_part( 'partials/scaffolding/site-clipboard' ); ?>

        </div>
        <!-- END: ROOT CONTAINER -->

		<!-- WP Footer
		================================================== -->
		<?php wp_footer(); ?>

    </body>

</html>