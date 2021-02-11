<?php
    // Color Scheme
    $color_scheme 	= get_field('color_scheme', get_the_ID());
    $custom_color   = get_field('custom_colors', get_the_ID());

    // Temporary Placeholders
    $primary_accent = '';
    $secondary_accent = '';
    $background_color = '';
    $text_color = '';

    // Custom Colors
    if ($custom_color) {
        $primary_accent = $custom_color['primary_accent'];
        $secondary_accent = $custom_color['secondary_accent'];
        $background_color = $custom_color['background_color'];
        $text_color = $custom_color['text_color'];
    }

    // Others
    $folio_terms = implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
    $folio_permalink = get_post_meta(get_the_ID(), 'custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'custom_url', true) ) : esc_url( get_permalink() );
    $folio_carousel_image = get_field('slider_image') ? get_field('slider_image') : get_the_post_thumbnail_url();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("carousel-cell"); ?> data-primary-accent-color="<?php echo esc_attr($primary_accent); ?>" data-secondary-accent-color="<?php echo esc_attr($secondary_accent); ?>" data-bg-color="<?php echo esc_attr($background_color); ?>" data-text-color="<?php echo esc_attr($text_color); ?>">
    
    <figure class="entry-thumbnail">
        <img class="primary" src="<?php echo esc_url($folio_carousel_image); ?>">
    </figure>

    <header class="entry-caption">
        <a href="<?php echo esc_url($folio_permalink); ?>" title="<?php the_title(); ?>" >
            <div class="inner-wrap">
                <h3 class="entry-title"><?php the_title(); ?></h3>
                <?php if ( $folio_terms ) { ?>
                    <span class="entry-meta"><?php echo esc_html( $folio_terms ); ?></span>
                <?php } ?>
            </div>
        </a>
    </header>

</article>
