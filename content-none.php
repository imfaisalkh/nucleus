<div class="no-content">

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( wp_kses_post( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '_nucleus' ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_page_template( 'template-portfolio.php' ) && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( wp_kses_post( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', '_nucleus' ) ), esc_url( admin_url( 'post-new.php?post_type=portfolio' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_nucleus' ); ?></p>
	<?php elseif ( is_singular() ) : ?>
		<p><?php esc_html_e( 'It seems you have not defined any content. Please define the post content and refresh this page.', '_nucleus' ); ?></p>
	<?php else : ?>
		<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', '_nucleus' ); ?></p>
	<?php endif; ?>

</div>