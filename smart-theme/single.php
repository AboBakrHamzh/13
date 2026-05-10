<?php
/**
 * Single Post Template
 * 
 * @package Smart_Pro
 */

get_header();
?>

<main id="primary" class="site-main single-post">
    <div class="container">
        <div class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
                    
                    <!-- رأس المقال -->
                    <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail('large-xl', array('class' => 'img-fluid')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-meta-top">
                            <?php smart_pro_posted_on(); ?>
                            <?php smart_pro_posted_by(); ?>
                        </div>
                        
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <?php if (get_theme_mod('show_reading_time', true)) : ?>
                            <span class="reading-time">
                                <i class="far fa-clock"></i>
                                <?php echo smart_pro_reading_time(); ?>
                            </span>
                        <?php endif; ?>
                    </header>

                    <!-- محتوى المقال -->
                    <div class="entry-content">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('الصفحات:', 'smart-pro'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <!-- وسوم المقال -->
                    <?php if (has_tag()) : ?>
                        <footer class="entry-footer">
                            <div class="post-tags">
                                <i class="fas fa-tags"></i>
                                <?php the_tags('', ', ', ''); ?>
                            </div>
                        </footer>
                    <?php endif; ?>

                    <!-- مشاركة اجتماعية -->
                    <?php if (get_theme_mod('social_share_enabled', true)) : ?>
                        <div class="social-share">
                            <h4><?php _e('شارك هذا المقال:', 'smart-pro'); ?></h4>
                            <?php smart_pro_social_share(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- معلومات الكاتب -->
                    <?php if (get_theme_mod('author_box_enabled', true)) : ?>
                        <div class="author-box">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', array('class' => 'rounded-circle')); ?>
                            </div>
                            <div class="author-info">
                                <h4 class="author-name"><?php the_author(); ?></h4>
                                <p class="author-bio"><?php echo esc_html(get_the_author_meta('description')); ?></p>
                                <div class="author-social">
                                    <?php smart_pro_author_social_links(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- التنقل بين المنشورات -->
                    <nav class="post-navigation">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<i class="fas fa-chevron-right"></i> %title'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title <i class="fas fa-chevron-left"></i>'); ?>
                        </div>
                    </nav>

                </article>

                <!-- تعليقات -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
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
