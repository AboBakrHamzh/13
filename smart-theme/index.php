<?php
/**
 * Main Template File
 * 
 * @package Smart_Pro
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>

                <!-- الترقيم -->
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-right"></i> ' . __('السابق', 'smart-pro'),
                    'next_text' => __('التالي', 'smart-pro') . ' <i class="fas fa-chevron-left"></i>',
                    'class'     => 'pagination',
                ));
                ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <!-- الشريط الجانبي -->
        <?php if (is_active_sidebar('sidebar-main')) : ?>
            <aside id="secondary" class="widget-area sidebar">
                <?php dynamic_sidebar('sidebar-main'); ?>
            </aside>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
