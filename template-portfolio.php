<?php 
/*
Template Name: Portfolio
*/
?>

<?php
// Helper Variable(s)
$portfolio_style = get_field('portfolio_style');
$footer_version = ($portfolio_style == 'classic') ? '' : 'minimal'

?>

<?php get_header(); ?>

    <div id="main-content">

        <!-- Page Content -->
        <div id="page-content">

            <?php get_template_part( "partials/portfolio/layout", $portfolio_style ); ?>

        </div>

    </div>

<?php get_footer($footer_version); ?>