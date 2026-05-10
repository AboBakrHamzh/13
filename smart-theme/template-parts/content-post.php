<?php
/**
 * Template part for displaying posts
 * 
 * @package Smart_Pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium-lg', array('class' => 'img-fluid')); ?>
            </a>
            <?php if (get_theme_mod('show_category_badge', true)) : ?>
                <div class="category-badge">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo esc_html($categories[0]->name);
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="entry-header">
            <div class="entry-meta">
                <?php smart_pro_posted_on(); ?>
            </div>
            
            <?php if (is_singular()) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php else : ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            <?php endif; ?>
        </header>

        <div class="entry-summary">
            <?php if (is_search() || is_archive()) : ?>
                <?php the_excerpt(); ?>
            <?php else : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
        </div>

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                <?php _e('اقرأ المزيد', 'smart-pro'); ?> <i class="fas fa-arrow-left"></i>
            </a>
        </footer>
    </div>
</article>
