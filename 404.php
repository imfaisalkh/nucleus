<?php get_header(); ?>


	<div id="main-content">

		<!-- Page Content -->
		<div id="page-content">
			<h1 class="title"><?php esc_html_e( '404', 'nucleus' ); ?></h1>
			<p class="caption"><?php esc_html_e( 'The page you are looking for is not available.', 'nucleus' ); ?></p>
			<a class="button rounded" href="<?php echo esc_url( home_url('/') ); ?>" role="button"><?php esc_html_e( 'Go Back Home', 'nucleus' ); ?></a>
		</div>

	</div>

<?php get_footer(); ?>