<?php
/**
 * Template part for displaying no posts found
 * 
 * @package Smart_Pro
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e('لا يوجد محتوى', 'smart-pro'); ?></h1>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php _e('لم يتم العثور على نتائج لبحثك. يرجى تجربة كلمات بحث مختلفة.', 'smart-pro'); ?></p>
            
            <?php get_search_form(); ?>
            
        <?php elseif (is_home() && current_user_can('publish_posts')) : ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        __('هل أنت مستعد لنشر أول مقال لك؟ <a href="%1$s">ابدأ الآن</a>', 'smart-pro'),
                        array('a' => array('href' => array()))
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>
            
        <?php else : ?>
            <p><?php _e('يبدو أنه لا يمكن العثور على أي محتوى في هذا الموقع. ربما تريد استخدام البحث للعثور على ما تبحث عنه.', 'smart-pro'); ?></p>
            
            <?php get_search_form(); ?>
            
        <?php endif; ?>
    </div>
</section>
