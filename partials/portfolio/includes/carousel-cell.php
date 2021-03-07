<?php
    // Color Scheme
    $base_color_scheme 	= get_field('base_color_scheme', get_the_ID());
    $base_colors   = get_field('base_colors', get_the_ID());

    // Temporary Placeholders
    $primary_accent = '';
    $secondary_accent = '';
    $background_color = '';
    $text_color = '';

    // Custom Colors
    if ($base_colors) {
        $primary_accent = isset($base_colors['primary_accent']) ? $base_colors['primary_accent'] : '';
        $secondary_accent = isset($base_colors['secondary_accent']) ? $base_colors['secondary_accent'] : '';
        $background_color = isset($base_colors['background_color']) ? $base_colors['background_color'] : '';
        $text_color = isset($base_colors['text_color']) ? $base_colors['text_color'] : '';
    }

    // Image Size
    $image_size = '';
    if ( isset($portfolio_style) ) {
        switch ($portfolio_style) {
            case 'columns':
                $image_size = 'nucleus-portfolio-portrait';
                break;
            case 'horizon':
            case 'spotlight':
            case 'textual':
            case 'forza':
                $image_size = 'nucleus-portfolio-carousel';
                break;
            case 'classic':
                $image_size = 'nucleus-portfolio-grid';
                break;
            case 'classic_slider':
                $image_size = 'nucleus-portfolio-grid-slider';
                break;
            default:
                $image_size = '';
        }
    }

    // Others
    $folio_terms = implode(', ', nucleus_get_term_fields('portfolio_category', 'name'));
    $folio_permalink = get_post_meta(get_the_ID(), 'custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'custom_url', true) ) : esc_url( get_permalink() );
    $folio_carousel_image = get_field('slider_image') ? get_field('slider_image') : get_the_post_thumbnail_url(get_the_ID(), $image_size);
?>

<article id="carousel-post-<?php the_ID(); ?>" <?php post_class("carousel-cell"); ?> data-primary-accent-color="<?php echo esc_attr($primary_accent); ?>" data-secondary-accent-color="<?php echo esc_attr($secondary_accent); ?>" data-bg-color="<?php echo esc_attr($background_color); ?>" data-text-color="<?php echo esc_attr($text_color); ?>">
    
    <figure class="entry-thumbnail" data-size="<?php echo esc_attr($image_size); ?>">
        <img class="primary" src="<?php echo esc_url($folio_carousel_image); ?>" alt="<?php the_title(); ?>">
    </figure>

    <a href="<?php echo esc_url($folio_permalink); ?>" title="<?php the_title(); ?>" >
        <header class="entry-caption">
            <?php if ( $portfolio_style != 'forza' ) { ?>
                    <div class="inner-wrap">
                        <h3 class="entry-title"><?php the_title(); ?></h3>
                        <?php if ( $folio_terms ) { ?>
                            <span class="entry-meta"><?php echo esc_html( $folio_terms ); ?></span>
                        <?php } ?>
                    </div>
            <?php } ?>

            <?php if ( $portfolio_style == 'forza' ) { ?>
                <div class="inner-wrap">
                    <span class="backdrop"><?php echo sprintf("%02d", $counter); ?></span>
                    <h3 class="entry-title"><?php the_title(); ?></h3>
                    <?php if ( $folio_terms ) { ?>
                        <span class="entry-meta"><?php echo esc_html( $folio_terms ); ?></span>
                    <?php } ?>
                    <div class="entry-caption"><?php the_excerpt(); ?></div>
                    <a href="<?php echo esc_url($folio_permalink); ?>" class="explore"><?php echo esc_html__('Open Case Study', '_nucleus'); ?></a>
                </div>
            <?php } ?>
        </header>
    </a>


</article>
