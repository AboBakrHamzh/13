<?php
/**
 * Template part for displaying services
 * 
 * @package Smart_Pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('service-card'); ?>>
    
    <div class="service-icon">
        <?php 
        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
        if ($icon) : ?>
            <i class="<?php echo esc_attr($icon); ?>"></i>
        <?php else : ?>
            <i class="fas fa-star"></i>
        <?php endif; ?>
    </div>

    <div class="service-content">
        <header class="entry-header">
            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

        <?php 
        $price = get_post_meta(get_the_ID(), '_service_price', true);
        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
        ?>
        
        <?php if ($price || $duration) : ?>
            <div class="service-meta">
                <?php if ($price) : ?>
                    <span class="service-price">
                        <i class="fas fa-tag"></i> <?php echo esc_html($price); ?>
                    </span>
                <?php endif; ?>
                
                <?php if ($duration) : ?>
                    <span class="service-duration">
                        <i class="far fa-clock"></i> <?php echo esc_html($duration); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                <?php _e('المزيد من التفاصيل', 'smart-pro'); ?>
            </a>
        </footer>
    </div>
</article>
