<?php
/**
 * Template part for displaying portfolio items
 * 
 * @package Smart_Pro
 */

$terms = get_the_terms(get_the_ID(), 'portfolio_category');
$term_slugs = array();
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        $term_slugs[] = $term->slug;
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item', implode(' ', $term_slugs)); ?>>
    
    <div class="portfolio-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('portfolio-thumb', array('class' => 'img-fluid')); ?>
            <?php else : ?>
                <img src="<?php echo SMART_PRO_URI; ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="img-fluid">
            <?php endif; ?>
        </a>
        
        <div class="portfolio-overlay">
            <div class="portfolio-info">
                <h3 class="portfolio-title"><?php the_title(); ?></h3>
                <?php if (!empty($terms)) : ?>
                    <span class="portfolio-category"><?php echo esc_html($terms[0]->name); ?></span>
                <?php endif; ?>
                <div class="portfolio-actions">
                    <a href="<?php the_permalink(); ?>" class="btn-view-project" title="<?php _e('عرض المشروع', 'smart-pro'); ?>">
                        <i class="fas fa-link"></i>
                    </a>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="btn-lightbox" title="<?php _e('تكبير الصورة', 'smart-pro'); ?>" data-fancybox="gallery">
                            <i class="fas fa-search-plus"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>
