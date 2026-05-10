<?php
/**
 * Template Functions
 * 
 * @package Smart_Pro
 */

if (!defined('ABSPATH')) exit;

/**
 * عرض تاريخ النشر
 */
function smart_pro_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    
    printf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );
}

/**
 * عرض اسم الكاتب
 */
function smart_pro_posted_by() {
    echo sprintf(
        '<span class="byline"> ' . __('بواسطة', 'smart-pro') . ' <span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span></span>',
        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        esc_html(get_the_author())
    );
}

/**
 * حساب وقت القراءة
 */
function smart_pro_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_speed = 200; // كلمة في الدقيقة
    $reading_time = ceil($word_count / $reading_speed);
    
    return sprintf(
        _n('%d دقيقة قراءة', '%d دقائق قراءة', $reading_time, 'smart-pro'),
        $reading_time
    );
}

/**
 * أزرار المشاركة الاجتماعية
 */
function smart_pro_social_share() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    ?>
    <div class="social-share-buttons">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener" class="share-facebook" title="<?php _e('مشاركة على فيسبوك', 'smart-pro'); ?>">
            <i class="fab fa-facebook-f"></i>
        </a>
        
        <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-twitter" title="<?php _e('مشاركة على تويتر', 'smart-pro'); ?>">
            <i class="fab fa-twitter"></i>
        </a>
        
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-linkedin" title="<?php _e('مشاركة على لينكدإن', 'smart-pro'); ?>">
            <i class="fab fa-linkedin-in"></i>
        </a>
        
        <a href="https://wa.me/?text=<?php echo $title . ' - ' . $url; ?>" target="_blank" rel="noopener" class="share-whatsapp" title="<?php _e('مشاركة على واتساب', 'smart-pro'); ?>">
            <i class="fab fa-whatsapp"></i>
        </a>
        
        <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $url; ?>" class="share-email" title="<?php _e('مشاركة عبر البريد', 'smart-pro'); ?>">
            <i class="fas fa-envelope"></i>
        </a>
    </div>
    <?php
}

/**
 * روابط التواصل الاجتماعي للكاتب
 */
function smart_pro_author_social_links() {
    $facebook = get_the_author_meta('facebook');
    $twitter = get_the_author_meta('twitter');
    $linkedin = get_the_author_meta('linkedin');
    $instagram = get_the_author_meta('instagram');
    
    if ($facebook || $twitter || $linkedin || $instagram) :
    ?>
        <div class="author-social-links">
            <?php if ($facebook) : ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener">
                    <i class="fab fa-facebook-f"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($twitter) : ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">
                    <i class="fab fa-twitter"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($linkedin) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($instagram) : ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener">
                    <i class="fab fa-instagram"></i>
                </a>
            <?php endif; ?>
        </div>
    <?php
    endif;
}

/**
 * قائمة بديلة عند عدم وجود قائمة
 */
function smart_pro_fallback_menu() {
    echo '<ul id="primary-menu" class="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('الرئيسية', 'smart-pro') . '</a></li>';
    
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
    ));
    
    echo '</ul>';
}

/**
 * Breadcrumb للتنقل
 */
function smart_pro_breadcrumb() {
    if (is_front_page()) return;
    
    echo '<nav class="breadcrumb" aria-label="' . __('مسار التنقل', 'smart-pro') . '">';
    echo '<a href="' . esc_url(home_url('/')) . '"><i class="fas fa-home"></i> ' . __('الرئيسية', 'smart-pro') . '</a>';
    
    if (is_category() || is_single()) {
        echo ' <span class="separator"><i class="fas fa-chevron-left"></i></span> ';
        the_category(' <span class="separator"><i class="fas fa-chevron-left"></i></span> ');
        
        if (is_single()) {
            echo ' <span class="separator"><i class="fas fa-chevron-left"></i></span> ';
            the_title('<span>', '</span>');
        }
    } elseif (is_page()) {
        echo ' <span class="separator"><i class="fas fa-chevron-left"></i></span> ';
        the_title('<span>', '</span>');
    } elseif (is_search()) {
        echo ' <span class="separator"><i class="fas fa-chevron-left"></i></span> ';
        printf(__('نتائج البحث عن "%s"', 'smart-pro'), get_search_query());
    } elseif (is_archive()) {
        echo ' <span class="separator"><i class="fas fa-chevron-left"></i></span> ';
        post_type_archive_title();
    }
    
    echo '</nav>';
}

/**
 * تحسين محتوى الصور
 */
function smart_pro_content_img_class($html) {
    $html = str_replace('class="', 'class="img-fluid ', $html);
    return $html;
}
add_filter('the_content', 'smart_pro_content_img_class');

/**
 * إضافة فئات مخصصة للجسم
 */
function smart_pro_body_classes($classes) {
    if (is_rtl()) {
        $classes[] = 'rtl';
    }
    
    if (is_singular()) {
        $classes[] = 'singular';
    }
    
    return $classes;
}
add_filter('body_class', 'smart_pro_body_classes');
