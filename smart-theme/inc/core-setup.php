<?php
/**
 * Core Setup - الإعدادات الأساسية للقالب
 * 
 * @package Smart_Pro
 */

if (!defined('ABSPATH')) exit;

/**
 * إعدادات القالب الأساسية
 */
function smart_pro_setup() {
    // دعم الصور البارزة
    add_theme_support('post-thumbnails');
    
    // دعم عنوان الصفحة
    add_theme_support('title-tag');
    
    // دعم HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // دعم تنسيق المنشورات
    add_theme_support('post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'
    ));
    
    // دعم التغذية التلقائية RSS
    add_theme_support('automatic-feed-links');
    
    // دعم عرض مخصص
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // دعم الشعار المخصص
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // دعم الهيدر المخصص
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'width'              => 1920,
        'height'             => 400,
        'flex-height'        => true,
        'flex-width'         => true,
    ));
    
    // تسجيل القوائم
    register_nav_menus(array(
        'primary'   => __('القائمة الرئيسية', 'smart-pro'),
        'footer'    => __('قائمة الفوتر', 'smart-pro'),
        'mobile'    => __('قائمة الجوال', 'smart-pro'),
        'social'    => __('روابط التواصل', 'smart-pro'),
    ));
    
    // حجم الصور
    add_image_size('thumbnail-sm', 300, 200, true);
    add_image_size('medium-lg', 600, 400, true);
    add_image_size('large-xl', 1200, 600, true);
    add_image_size('hero-size', 1920, 800, true);
    add_image_size('portfolio-thumb', 400, 300, true);
    add_image_size('team-photo', 300, 350, true);
    
    // دعم Gutenberg
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // دعم WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'smart_pro_setup');

/**
 * تحميل ملفات CSS و JavaScript
 */
function smart_pro_scripts() {
    // تحميل Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Tajawal:wght@300;400;500;700&display=swap', array(), null);
    
    // ملف الـ CSS الرئيسي
    wp_enqueue_style('smart-pro-style', get_stylesheet_uri(), array(), SMART_PRO_VERSION);
    
    // مكتبة أيقونات Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // مكتبة Animate.css للحركات
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
    
    // ملف JavaScript الرئيسي
    wp_enqueue_script('smart-pro-main', SMART_PRO_URI . '/assets/js/main.js', array('jquery'), SMART_PRO_VERSION, true);
    
    // AJAX URL
    wp_localize_script('smart-pro-main', 'smartProAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('smart_pro_nonce'),
        'homeUrl' => home_url('/'),
        'siteUrl' => site_url(),
    ));
    
    // تحميل التعليقات إذا كانت مفعلة
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'smart_pro_scripts');

/**
 * إنشاء مناطق ودجات
 */
function smart_pro_widgets_init() {
    register_sidebar(array(
        'name'          => __('الشريط الجانبي الرئيسي', 'smart-pro'),
        'id'            => 'sidebar-main',
        'description'   => __('أضف الودجات هنا للظهور في الشريط الجانبي', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('فوتر 1', 'smart-pro'),
        'id'            => 'footer-1',
        'description'   => __('منطقة الفوتر الأولى', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('فوتر 2', 'smart-pro'),
        'id'            => 'footer-2',
        'description'   => __('منطقة الفوتر الثانية', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('فوتر 3', 'smart-pro'),
        'id'            => 'footer-3',
        'description'   => __('منطقة الفوتر الثالثة', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('فوتر 4', 'smart-pro'),
        'id'            => 'footer-4',
        'description'   => __('منطقة الفوتر الرابعة', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('قبل المحتوى', 'smart-pro'),
        'id'            => 'before-content',
        'description'   => __('يظهر قبل محتوى الصفحة', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('بعد المحتوى', 'smart-pro'),
        'id'            => 'after-content',
        'description'   => __('يظهر بعد محتوى الصفحة', 'smart-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'smart_pro_widgets_init');

/**
 * إضافة خيارات للقائمة
 */
function smart_pro_nav_menu_items($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'smart_pro_nav_menu_items', 10, 3);

/**
 * تخصيص مقتطف المنشور
 */
function smart_pro_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'smart_pro_excerpt_length', 999);

/**
 * إضافة [...] بعد المقتطف
 */
function smart_pro_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '" class="read-more">' . __('اقرأ المزيد', 'smart-pro') . '</a>';
}
add_filter('excerpt_more', 'smart_pro_excerpt_more');

/**
 * تحسين SEO بإزالة روابط غير ضرورية
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

/**
 * دعم RTL للغات العربية
 */
function smart_pro_rtl_setup() {
    if (is_rtl()) {
        wp_enqueue_style('smart-pro-rtl', SMART_PRO_URI . '/assets/css/rtl.css', array(), SMART_PRO_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'smart_pro_rtl_setup');
