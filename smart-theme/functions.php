<?php
/**
 * Smart Pro Theme Functions
 * 
 * @package Smart_Pro
 * @since 1.0.0
 */

// تعريف ثوابت القالب
define('SMART_PRO_VERSION', '1.0.0');
define('SMART_PRO_DIR', get_template_directory());
define('SMART_PRO_URI', get_template_directory_uri());

/**
 * تحميل الملفات الأساسية
 */
require_once SMART_PRO_DIR . '/inc/core-setup.php';
require_once SMART_PRO_DIR . '/inc/custom-post-types.php';
require_once SMART_PRO_DIR . '/inc/customizer.php';
require_once SMART_PRO_DIR . '/inc/template-functions.php';
require_once SMART_PRO_DIR . '/inc/ajax-handlers.php';

// دعم WooCommerce إذا كان مفعلاً
if (class_exists('WooCommerce')) {
    require_once SMART_PRO_DIR . '/inc/woocommerce-support.php';
}

/**
 * تحميل ملفات الترجمة
 */
function smart_pro_load_textdomain() {
    load_theme_textdomain('smart-pro', SMART_PRO_DIR . '/languages');
}
add_action('after_setup_theme', 'smart_pro_load_textdomain');