<?php
/**
 * AJAX Handlers
 * Handle AJAX requests for load more, search, and other dynamic features
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * AJAX Load More Posts
 */
function smart_pro_load_more_posts() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $posts_per_page = get_theme_mod('smart_pro_posts_per_page', 9);
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    if ($category) {
        $args['category_name'] = $category;
    }
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', 'post');
        endwhile;
        
        $html = ob_get_clean();
        
        wp_send_json_success(array(
            'html' => $html,
            'max_pages' => $query->max_num_pages,
            'current_page' => $paged
        ));
    } else {
        wp_send_json_error(array('message' => __('No more posts found', 'smart-pro')));
    }
    
    wp_die();
}
add_action('wp_ajax_load_more_posts', 'smart_pro_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'smart_pro_load_more_posts');

/**
 * AJAX Search
 */
function smart_pro_ajax_search() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'any';
    $posts_per_page = 5;
    
    $args = array(
        's' => $search_query,
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish'
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        ?>
        <div class="ajax-search-results">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="ajax-search-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="ajax-search-thumbnail">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="ajax-search-info">
                        <h4 class="ajax-search-title"><?php the_title(); ?></h4>
                        <span class="ajax-search-type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                    </div>
                </a>
            <?php endwhile; ?>
            <a href="<?php echo esc_url(home_url('/?s=' . urlencode($search_query))); ?>" class="ajax-search-view-all">
                <?php _e('View All Results', 'smart-pro'); ?> <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <?php
        $html = ob_get_clean();
        
        wp_send_json_success(array('html' => $html));
    } else {
        wp_send_json_success(array(
            'html' => '<p class="ajax-search-no-results">' . __('No results found for "' . esc_html($search_query) . '"', 'smart-pro') . '</p>'
        ));
    }
    
    wp_die();
}
add_action('wp_ajax_smart_pro_search', 'smart_pro_ajax_search');
add_action('wp_ajax_nopriv_smart_pro_search', 'smart_pro_ajax_search');

/**
 * AJAX Contact Form Handler
 */
function smart_pro_contact_form_submit() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    
    // Validation
    $errors = array();
    
    if (empty($name)) {
        $errors[] = __('Please enter your name', 'smart-pro');
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = __('Please enter a valid email address', 'smart-pro');
    }
    
    if (empty($message)) {
        $errors[] = __('Please enter your message', 'smart-pro');
    }
    
    if (!empty($errors)) {
        wp_send_json_error(array('errors' => $errors));
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $email_subject = sprintf(__('New Contact Form Submission: %s', 'smart-pro'), $subject);
    
    $email_body = sprintf(__('Name: %s', 'smart-pro'), $name) . "\n";
    $email_body .= sprintf(__('Email: %s', 'smart-pro'), $email) . "\n";
    if ($phone) {
        $email_body .= sprintf(__('Phone: %s', 'smart-pro'), $phone) . "\n";
    }
    $email_body .= sprintf(__('Subject: %s', 'smart-pro'), $subject) . "\n\n";
    $email_body .= sprintf(__('Message:', 'smart-pro')) . "\n" . $message;
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email
    );
    
    // Send email
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        wp_send_json_success(array('message' => __('Thank you! Your message has been sent successfully.', 'smart-pro')));
    } else {
        wp_send_json_error(array('message' => __('There was an error sending your message. Please try again.', 'smart-pro')));
    }
    
    wp_die();
}
add_action('wp_ajax_smart_pro_contact_form', 'smart_pro_contact_form_submit');
add_action('wp_ajax_nopriv_smart_pro_contact_form', 'smart_pro_contact_form_submit');

/**
 * AJAX Newsletter Subscription
 */
function smart_pro_newsletter_subscribe() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    
    if (empty($email) || !is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address', 'smart-pro')));
    }
    
    // Check if already subscribed
    $subscribers = get_option('smart_pro_newsletter_subscribers', array());
    
    if (in_array($email, $subscribers)) {
        wp_send_json_error(array('message' => __('This email is already subscribed', 'smart-pro')));
    }
    
    // Add subscriber
    $subscribers[] = $email;
    update_option('smart_pro_newsletter_subscribers', $subscribers);
    
    // Send confirmation email
    $subject = __('Welcome to our newsletter!', 'smart-pro');
    $message = sprintf(__('Thank you for subscribing to our newsletter. We\'ll keep you updated with our latest news.', 'smart-pro'));
    
    wp_mail($email, $subject, $message);
    
    wp_send_json_success(array('message' => __('Thank you for subscribing!', 'smart-pro')));
    
    wp_die();
}
add_action('wp_ajax_smart_pro_newsletter', 'smart_pro_newsletter_subscribe');
add_action('wp_ajax_nopriv_smart_pro_newsletter', 'smart_pro_newsletter_subscribe');

/**
 * AJAX Portfolio Filter
 */
function smart_pro_filter_portfolio() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $posts_per_page = -1;
    
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish'
    );
    
    if ($category && $category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', 'portfolio');
        endwhile;
        
        $html = ob_get_clean();
        
        wp_send_json_success(array('html' => $html));
    } else {
        wp_send_json_error(array('message' => __('No portfolio items found', 'smart-pro')));
    }
    
    wp_die();
}
add_action('wp_ajax_filter_portfolio', 'smart_pro_filter_portfolio');
add_action('wp_ajax_nopriv_filter_portfolio', 'smart_pro_filter_portfolio');

/**
 * AJAX Add to Cart (WooCommerce Integration)
 */
function smart_pro_ajax_add_to_cart() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error(array('message' => __('WooCommerce is not active', 'smart-pro')));
    }
    
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    if (!$product_id) {
        wp_send_json_error(array('message' => __('Invalid product ID', 'smart-pro')));
    }
    
    WC()->cart->add_to_cart($product_id, $quantity);
    
    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_total = WC()->cart->get_cart_total();
    
    wp_send_json_success(array(
        'message' => __('Product added to cart successfully', 'smart-pro'),
        'cart_count' => $cart_count,
        'cart_total' => $cart_total
    ));
    
    wp_die();
}
add_action('wp_ajax_smart_pro_add_to_cart', 'smart_pro_ajax_add_to_cart');
add_action('wp_ajax_nopriv_smart_pro_add_to_cart', 'smart_pro_ajax_add_to_cart');

/**
 * AJAX Quick View Product (WooCommerce)
 */
function smart_pro_quick_view_product() {
    check_ajax_referer('smart_pro_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error(array('message' => __('WooCommerce is not active', 'smart-pro')));
    }
    
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    
    if (!$product_id) {
        wp_send_json_error(array('message' => __('Invalid product ID', 'smart-pro')));
    }
    
    $product = wc_get_product($product_id);
    
    if (!$product) {
        wp_send_json_error(array('message' => __('Product not found', 'smart-pro')));
    }
    
    ob_start();
    ?>
    <div class="quick-view-product">
        <div class="quick-view-image">
            <?php echo $product->get_image('large'); ?>
        </div>
        <div class="quick-view-details">
            <h3><?php echo $product->get_name(); ?></h3>
            <div class="quick-view-price"><?php echo $product->get_price_html(); ?></div>
            <div class="quick-view-description"><?php echo wpautop($product->get_short_description()); ?></div>
            
            <?php if ($product->is_in_stock()) : ?>
                <form class="cart" method="post">
                    <input type="hidden" name="add-to-cart" value="<?php echo $product->get_id(); ?>">
                    <button type="submit" class="single_add_to_cart_button button alt">
                        <?php _e('Add to Cart', 'smart-pro'); ?>
                    </button>
                </form>
            <?php else : ?>
                <p class="out-of-stock"><?php _e('Out of Stock', 'smart-pro'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success(array('html' => $html));
    
    wp_die();
}
add_action('wp_ajax_smart_pro_quick_view', 'smart_pro_quick_view_product');
add_action('wp_ajax_nopriv_smart_pro_quick_view', 'smart_pro_quick_view_product');
