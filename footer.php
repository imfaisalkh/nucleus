                    
                </section>
                <!-- END: SITE BODY -->

                <!-- BEGIN: SITE FOOTER -->
                <?php $footer_style = get_field('footer_style') ? get_field('footer_style') : get_theme_mod('nucleus_footer_style', 'center'); ?>
                
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