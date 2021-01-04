<?php
	// Helper Variable(s)
	$categories = get_the_category();
	$thumbnail_size = ($counter == 1) ? 'nucleus-blog-grid-2x' : 'nucleus-blog-grid-1x';

?>

<!-- PORTFOLIO ENTRY -->
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

	<figure class="entry-thumbnail">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<img src="<?php the_post_thumbnail_url( $thumbnail_size ); ?>">
		</a>
	</figure>

	<div class="entry-content">

		<div class="entry-meta">
			<span class="category"><?php echo esc_html( $categories[0]->name ); ?></span>
			<span class="date">March 21, 2017</span>
		</div>

		<h3 class="entry-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h3>

		<div class="entry-excerpt"><?php the_excerpt(); ?></div>

		<a class="read-more" href="#">Read More</a>

	</div>	

</article>