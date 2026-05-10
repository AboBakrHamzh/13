<?php
/**
 * WooCommerce Support
 * Full integration with WooCommerce for e-commerce functionality
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Declare WooCommerce support
 */
function smart_pro_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'smart_pro_woocommerce_support');

/**
 * WooCommerce specific styles
 */
function smart_pro_woocommerce_scripts() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('smart-pro-woocommerce', SMART_PRO_URI . '/assets/css/woocommerce.css', array('smart-pro-style'), SMART_PRO_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'smart_pro_woocommerce_scripts');

/**
 * Change WooCommerce wrapper to match theme
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'smart_pro_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'smart_pro_woocommerce_wrapper_end', 10);

function smart_pro_woocommerce_wrapper_start() {
    echo '<main id="primary" class="site-main woocommerce-main">';
}

function smart_pro_woocommerce_wrapper_end() {
    echo '</main>';
}

/**
 * Remove default WooCommerce sidebar
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Customize number of products per page
 */
function smart_pro_products_per_page() {
    return get_theme_mod('smart_pro_woo_products_per_page', 12);
}
add_filter('loop_shop_per_page', 'smart_pro_products_per_page');

/**
 * Customize columns in product loop
 */
function smart_pro_loop_columns() {
    return get_theme_mod('smart_pro_woo_columns', 4);
}
add_filter('loop_shop_columns', 'smart_pro_loop_columns');

/**
 * Remove WooCommerce default styles
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add custom product badge
 */
function smart_pro_product_badge() {
    global $product;
    
    if (!$product) {
        return;
    }
    
    $badge = '';
    
    // Sale badge
    if ($product->is_on_sale()) {
        $badge .= '<span class="product-badge sale-badge">' . __('Sale!', 'smart-pro') . '</span>';
    }
    
    // New badge
    $created = strtotime($product->get_date_created());
    if ((time() - (60 * 60 * 24 * 30)) < $created) {
        $badge .= '<span class="product-badge new-badge">' . __('New!', 'smart-pro') . '</span>';
    }
    
    // Out of stock badge
    if (!$product->is_in_stock()) {
        $badge .= '<span class="product-badge outofstock-badge">' . __('Out of Stock', 'smart-pro') . '</span>';
    }
    
    echo $badge;
}
add_action('woocommerce_before_shop_loop_item_title', 'smart_pro_product_badge', 5);

/**
 * Customize add to cart button text
 */
function smart_pro_add_to_cart_text($text, $product) {
    if ($product->is_type('simple')) {
        return __('Add to Cart', 'smart-pro');
    }
    return $text;
}
add_filter('woocommerce_product_add_to_cart_text', 'smart_pro_add_to_cart_text', 10, 2);
add_filter('woocommerce_product_single_add_to_cart_text', 'smart_pro_add_to_cart_text', 10, 2);

/**
 * Add quick view button
 */
function smart_pro_quick_view_button() {
    global $product;
    
    if (!$product) {
        return;
    }
    
    ?>
    <a href="#" class="quick-view-button" data-product-id="<?php echo $product->get_id(); ?>" aria-label="<?php esc_attr_e('Quick View', 'smart-pro'); ?>">
        <i class="fas fa-eye"></i>
        <span><?php _e('Quick View', 'smart-pro'); ?></span>
    </a>
    <?php
}
add_action('woocommerce_shop_loop_item_title', 'smart_pro_quick_view_button', 15);

/**
 * Customize product image gallery
 */
function smart_pro_woocommerce_image_dimensions() {
    return array(
        'thumbnail' => array(
            'width' => 300,
            'height' => 300,
            'crop' => true
        ),
        'single' => array(
            'width' => 800,
            'height' => 800,
            'crop' => true
        ),
        'catalog' => array(
            'width' => 600,
            'height' => 600,
            'crop' => true
        )
    );
}
add_filter('woocommerce_get_image_size_thumbnail', 'smart_pro_woocommerce_image_dimensions');

/**
 * Add trust badges to product page
 */
function smart_pro_trust_badges() {
    ?>
    <div class="trust-badges">
        <div class="trust-badge">
            <i class="fas fa-shield-alt"></i>
            <span><?php _e('Secure Payment', 'smart-pro'); ?></span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-truck"></i>
            <span><?php _e('Free Shipping', 'smart-pro'); ?></span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-undo"></i>
            <span><?php _e('Easy Returns', 'smart-pro'); ?></span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-headset"></i>
            <span><?php _e('24/7 Support', 'smart-pro'); ?></span>
        </div>
    </div>
    <?php
}
add_action('woocommerce_single_product_summary', 'smart_pro_trust_badges', 25);

/**
 * Add estimated delivery date
 */
function smart_pro_estimated_delivery() {
    global $product;
    
    if (!$product->is_in_stock()) {
        return;
    }
    
    $days = 3; // Default delivery time
    $estimated_date = date_i18n(get_option('date_format'), strtotime("+{$days} days"));
    
    ?>
    <div class="estimated-delivery">
        <i class="fas fa-calendar-check"></i>
        <span><?php printf(__('Estimated delivery: %s', 'smart-pro'), $estimated_date); ?></span>
    </div>
    <?php
}
add_action('woocommerce_single_product_summary', 'smart_pro_estimated_delivery', 23);

/**
 * Related products arguments
 */
function smart_pro_related_products_args($args) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'smart_pro_related_products_args');

/**
 * Upsells products arguments
 */
function smart_pro_upsells_products_args($args) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}
add_filter('woocommerce_upsell_display_args', 'smart_pro_upsells_products_args');

/**
 * Mini cart in header
 */
function smart_pro_header_cart() {
    if (!class_exists('WooCommerce')) {
        return;
    }
    
    ?>
    <div class="header-cart">
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'smart-pro'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
        </a>
        
        <div class="site-header-cart dropdown">
            <?php the_widget('WC_Widget_Cart'); ?>
        </div>
    </div>
    <?php
}

/**
 * Custom checkout fields
 */
function smart_pro_checkout_fields($fields) {
    // Add company name field
    $fields['billing']['billing_company'] = array(
        'label' => __('Company Name', 'smart-pro'),
        'placeholder' => __('Company Name', 'smart-pro'),
        'required' => false,
        'class' => array('form-row-wide'),
        'priority' => 35
    );
    
    // Simplify fields
    unset($fields['billing']['billing_company']);
    
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'smart_pro_checkout_fields');

/**
 * Add custom order meta
 */
function smart_pro_order_meta($order_id) {
    if (!empty($_POST['custom_field'])) {
        update_post_meta($order_id, 'Custom Field', sanitize_text_field($_POST['custom_field']));
    }
}
add_action('woocommerce_checkout_update_order_meta', 'smart_pro_order_meta');

/**
 * Product categories widget
 */
function smart_pro_product_categories_widget_args($args) {
    $args['title'] = __('Product Categories', 'smart-pro');
    return $args;
}
add_filter('woocommerce_product_categories_widget_args', 'smart_pro_product_categories_widget_args');

/**
 * Enable AJAX add to cart on archives
 */
add_filter('woocommerce_add_to_cart_fragments', 'smart_pro_cart_fragments');

function smart_pro_cart_fragments($fragments) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    
    ob_start();
    ?>
    <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
    <?php
    $fragments['.cart-total'] = ob_get_clean();
    
    return $fragments;
}

/**
 * Custom login/register forms for WooCommerce
 */
function smart_pro_woocommerce_login_form_defaults($args) {
    $args['label_username'] = __('Username or Email', 'smart-pro');
    $args['label_password'] = __('Password', 'smart-pro');
    $args['label_remember'] = __('Remember Me', 'smart-pro');
    $args['label_submit'] = __('Login', 'smart-pro');
    return $args;
}
add_filter('woocommerce_login_form_defaults', 'smart_pro_woocommerce_login_form_defaults');

/**
 * Add social login buttons (placeholder for integration)
 */
function smart_pro_social_login_buttons() {
    ?>
    <div class="social-login-buttons">
        <p class="divider"><span><?php _e('Or login with', 'smart-pro'); ?></span></p>
        <a href="#" class="social-login-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="#" class="social-login-btn google"><i class="fab fa-google"></i> Google</a>
    </div>
    <?php
}
add_action('woocommerce_login_form', 'smart_pro_social_login_buttons');
add_action('woocommerce_register_form', 'smart_pro_social_login_buttons');
