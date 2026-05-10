<?php
/**
 * Page Template
 * 
 * @package Smart_Pro
 */

get_header();
?>

<main id="primary" class="site-main page-template">
    <div class="container">
        <div class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                    
                    <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large-xl', array('class' => 'img-fluid')); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('الصفحات:', 'smart-pro'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                </article>

                <!-- تعليقات الصفحات -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
        </div>

        <!-- الشريط الجانبي للصفحات -->
        <?php if (is_active_sidebar('sidebar-main')) : ?>
            <aside id="secondary" class="widget-area sidebar">
                <?php dynamic_sidebar('sidebar-main'); ?>
            </aside>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
