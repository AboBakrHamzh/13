<?php
/**
 * Core setup and initialization
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom image sizes
 */
function smart_pro_image_sizes() {
    // Already defined in style.css, additional sizes here
    add_image_size('smart-pro-banner', 1600, 600, true);
    add_image_size('smart-pro-featured', 800, 600, true);
}
add_action('after_setup_theme', 'smart_pro_image_sizes');

/**
 * Custom excerpt length
 */
function smart_pro_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'smart_pro_excerpt_length');

/**
 * Custom excerpt more
 */
function smart_pro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'smart_pro_excerpt_more');

/**
 * Add body classes
 */
function smart_pro_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    }
    
    // Browser detection
    global $is_ie, $is_edge;
    if ($is_ie) {
        $classes[] = 'ie';
    }
    if ($is_edge) {
        $classes[] = 'edge';
    }
    
    return $classes;
}
add_filter('body_class', 'smart_pro_body_classes');

/**
 * Preload key resources
 */
function smart_pro_preload_resources() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link rel="preload" href="' . SMART_PRO_ASSETS . '/css/custom.css" as="style">';
}
add_action('wp_head', 'smart_pro_preload_resources', 1);

/**
 * Remove unnecessary WordPress features for performance
 */
function smart_pro_cleanup() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    
    // Remove Gutenberg block library CSS if not needed
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('init', 'smart_pro_cleanup');

/**
 * Add async/defer to scripts
 */
function smart_pro_script_async_defer($tag, $handle, $src) {
    if ('smart-pro-main' === $handle) {
        return '<script src="' . esc_url($src) . '" id="' . esc_attr($handle) . '-js" async></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'smart_pro_script_async_defer', 10, 3);

/**
 * Register theme locations for Gutenberg
 */
function smart_pro_register_block_patterns() {
    register_block_pattern_category('smart-pro', array(
        'label' => __('Smart Pro', 'smart-pro'),
        'description' => __('Custom block patterns for Smart Pro theme.', 'smart-pro')
    ));
}
add_action('init', 'smart_pro_register_block_patterns');

/**
 * Add custom admin styles
 */
function smart_pro_admin_styles() {
    wp_enqueue_style('smart-pro-admin', SMART_PRO_URI . '/assets/css/admin.css', array(), SMART_PRO_VERSION);
}
add_action('admin_enqueue_scripts', 'smart_pro_admin_styles');

/**
 * Custom login page styling
 */
function smart_pro_login_logo() {
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(' . get_custom_logo() . ');
            height: 80px;
            width: 200px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'smart_pro_login_logo');

/**
 * Add dashboard widgets
 */
function smart_pro_add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'smart_pro_dashboard_widget',
        __('Theme Quick Tips', 'smart-pro'),
        'smart_pro_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'smart_pro_add_dashboard_widgets');

function smart_pro_dashboard_widget_content() {
    echo '<p>' . __('Welcome to Smart Pro Theme! Here are some quick tips:', 'smart-pro') . '</p>';
    echo '<ul>';
    echo '<li>' . __('Go to Appearance > Customize to configure theme options', 'smart-pro') . '</li>';
    echo '<li>' . __('Create custom post types from the dashboard', 'smart-pro') . '</li>';
    echo '<li>' . __('Use Gutenberg blocks for advanced layouts', 'smart-pro') . '</li>';
    echo '<li>' . __('Enable WooCommerce for e-commerce features', 'smart-pro') . '</li>';
    echo '</ul>';
}
