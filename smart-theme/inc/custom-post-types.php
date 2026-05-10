<?php
/**
 * Custom Post Types Registration
 * Advanced post types with full Gutenberg support, REST API, and custom taxonomies
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Portfolio Post Type
 */
function smart_pro_register_portfolio() {
    $labels = array(
        'name' => _x('Portfolio', 'post type general name', 'smart-pro'),
        'singular_name' => _x('Portfolio Item', 'post type singular name', 'smart-pro'),
        'menu_name' => _x('Portfolio', 'admin menu', 'smart-pro'),
        'name_admin_bar' => _x('Portfolio Item', 'add new on admin bar', 'smart-pro'),
        'add_new' => _x('Add New', 'portfolio item', 'smart-pro'),
        'add_new_item' => __('Add New Portfolio Item', 'smart-pro'),
        'new_item' => __('New Portfolio Item', 'smart-pro'),
        'edit_item' => __('Edit Portfolio Item', 'smart-pro'),
        'view_item' => __('View Portfolio Item', 'smart-pro'),
        'all_items' => __('All Portfolio Items', 'smart-pro'),
        'search_items' => __('Search Portfolio Items', 'smart-pro'),
        'parent_item_colon' => __('Parent Portfolio Items:', 'smart-pro'),
        'not_found' => __('No portfolio items found.', 'smart-pro'),
        'not_found_in_trash' => __('No portfolio items found in Trash.', 'smart-pro'),
        'featured_image' => __('Featured Image', 'smart-pro'),
        'set_featured_image' => __('Set featured image', 'smart-pro'),
        'remove_featured_image' => __('Remove featured image', 'smart-pro'),
        'use_featured_image' => __('Use as featured image', 'smart-pro'),
        'archives' => __('Portfolio Archives', 'smart-pro'),
        'insert_into_item' => __('Insert into portfolio item', 'smart-pro'),
        'uploaded_to_this_item' => __('Uploaded to this portfolio item', 'smart-pro'),
        'filter_items_list' => __('Filter items list', 'smart-pro'),
        'items_list_navigation' => __('Items list navigation', 'smart-pro'),
        'items_list' => __('Items list', 'smart-pro'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions', 'page-attributes'),
        'show_in_rest' => true,
        'rest_base' => 'portfolio',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'template' => array(
            array('core/image', array('align' => 'full')),
            array('core/paragraph', array('placeholder' => __('Add project description...', 'smart-pro'))),
            array('core/gallery', array()),
        ),
        'template_lock' => false,
    );

    register_post_type('portfolio', $args);

    // Register Portfolio Taxonomy
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name' => _x('Portfolio Categories', 'taxonomy general name', 'smart-pro'),
            'singular_name' => _x('Portfolio Category', 'taxonomy singular name', 'smart-pro'),
            'search_items' => __('Search Portfolio Categories', 'smart-pro'),
            'all_items' => __('All Portfolio Categories', 'smart-pro'),
            'parent_item' => __('Parent Portfolio Category', 'smart-pro'),
            'parent_item_colon' => __('Parent Portfolio Category:', 'smart-pro'),
            'edit_item' => __('Edit Portfolio Category', 'smart-pro'),
            'update_item' => __('Update Portfolio Category', 'smart-pro'),
            'add_new_item' => __('Add New Portfolio Category', 'smart-pro'),
            'new_item_name' => __('New Portfolio Category Name', 'smart-pro'),
            'menu_name' => __('Categories', 'smart-pro'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-category'),
        'show_in_rest' => true,
    ));

    // Register Portfolio Tags
    register_taxonomy('portfolio_tag', 'portfolio', array(
        'labels' => array(
            'name' => _x('Portfolio Tags', 'taxonomy general name', 'smart-pro'),
            'singular_name' => _x('Portfolio Tag', 'taxonomy singular name', 'smart-pro'),
            'search_items' => __('Search Portfolio Tags', 'smart-pro'),
            'all_items' => __('All Portfolio Tags', 'smart-pro'),
            'edit_item' => __('Edit Portfolio Tag', 'smart-pro'),
            'update_item' => __('Update Portfolio Tag', 'smart-pro'),
            'add_new_item' => __('Add New Portfolio Tag', 'smart-pro'),
            'new_item_name' => __('New Portfolio Tag Name', 'smart-pro'),
            'menu_name' => __('Tags', 'smart-pro'),
        ),
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-tag'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'smart_pro_register_portfolio');

/**
 * Register Testimonials Post Type
 */
function smart_pro_register_testimonials() {
    $labels = array(
        'name' => _x('Testimonials', 'post type general name', 'smart-pro'),
        'singular_name' => _x('Testimonial', 'post type singular name', 'smart-pro'),
        'menu_name' => _x('Testimonials', 'admin menu', 'smart-pro'),
        'add_new' => _x('Add New', 'testimonial', 'smart-pro'),
        'add_new_item' => __('Add New Testimonial', 'smart-pro'),
        'new_item' => __('New Testimonial', 'smart-pro'),
        'edit_item' => __('Edit Testimonial', 'smart-pro'),
        'view_item' => __('View Testimonial', 'smart-pro'),
        'all_items' => __('All Testimonials', 'smart-pro'),
        'search_items' => __('Search Testimonials', 'smart-pro'),
        'not_found' => __('No testimonials found.', 'smart-pro'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'smart-pro'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions'),
        'show_in_rest' => true,
        'rest_base' => 'testimonials',
    );

    register_post_type('testimonials', $args);

    // Add custom meta boxes for testimonial data
    add_action('add_meta_boxes', 'smart_pro_testimonial_meta_boxes');
}
add_action('init', 'smart_pro_register_testimonials');

function smart_pro_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'smart-pro'),
        'smart_pro_testimonial_details_callback',
        'testimonials',
        'normal',
        'high'
    );
}

function smart_pro_testimonial_details_callback($post) {
    wp_nonce_field('smart_pro_testimonial_meta', 'smart_pro_testimonial_nonce');
    
    $client_name = get_post_meta($post->ID, '_testimonial_client_name', true);
    $client_position = get_post_meta($post->ID, '_testimonial_client_position', true);
    $company_name = get_post_meta($post->ID, '_testimonial_company_name', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    ?>
    <p>
        <label for="client_name"><?php _e('Client Name:', 'smart-pro'); ?></label><br>
        <input type="text" id="client_name" name="client_name" value="<?php echo esc_attr($client_name); ?>" class="widefat">
    </p>
    <p>
        <label for="client_position"><?php _e('Client Position:', 'smart-pro'); ?></label><br>
        <input type="text" id="client_position" name="client_position" value="<?php echo esc_attr($client_position); ?>" class="widefat">
    </p>
    <p>
        <label for="company_name"><?php _e('Company Name:', 'smart-pro'); ?></label><br>
        <input type="text" id="company_name" name="company_name" value="<?php echo esc_attr($company_name); ?>" class="widefat">
    </p>
    <p>
        <label for="rating"><?php _e('Rating (1-5):', 'smart-pro'); ?></label><br>
        <select id="rating" name="rating" class="widefat">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> <?php _e('Stars', 'smart-pro'); ?></option>
            <?php endfor; ?>
        </select>
    </p>
    <?php
}

function smart_pro_save_testimonial_meta($post_id) {
    if (!isset($_POST['smart_pro_testimonial_nonce']) || !wp_verify_nonce($_POST['smart_pro_testimonial_nonce'], 'smart_pro_testimonial_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['client_name'])) {
        update_post_meta($post_id, '_testimonial_client_name', sanitize_text_field($_POST['client_name']));
    }
    
    if (isset($_POST['client_position'])) {
        update_post_meta($post_id, '_testimonial_client_position', sanitize_text_field($_POST['client_position']));
    }
    
    if (isset($_POST['company_name'])) {
        update_post_meta($post_id, '_testimonial_company_name', sanitize_text_field($_POST['company_name']));
    }
    
    if (isset($_POST['rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['rating']));
    }
}
add_action('save_post_testimonials', 'smart_pro_save_testimonial_meta');

/**
 * Register Services Post Type
 */
function smart_pro_register_services() {
    $labels = array(
        'name' => _x('Services', 'post type general name', 'smart-pro'),
        'singular_name' => _x('Service', 'post type singular name', 'smart-pro'),
        'menu_name' => _x('Services', 'admin menu', 'smart-pro'),
        'add_new' => _x('Add New', 'service', 'smart-pro'),
        'add_new_item' => __('Add New Service', 'smart-pro'),
        'new_item' => __('New Service', 'smart-pro'),
        'edit_item' => __('Edit Service', 'smart-pro'),
        'view_item' => __('View Service', 'smart-pro'),
        'all_items' => __('All Services', 'smart-pro'),
        'search_items' => __('Search Services', 'smart-pro'),
        'not_found' => __('No services found.', 'smart-pro'),
        'not_found_in_trash' => __('No services found in Trash.', 'smart-pro'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'show_in_rest' => true,
        'rest_base' => 'services',
    );

    register_post_type('services', $args);

    // Service Meta Boxes
    add_action('add_meta_boxes', 'smart_pro_service_meta_boxes');
}
add_action('init', 'smart_pro_register_services');

function smart_pro_service_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Service Details', 'smart-pro'),
        'smart_pro_service_details_callback',
        'services',
        'normal',
        'high'
    );
}

function smart_pro_service_details_callback($post) {
    wp_nonce_field('smart_pro_service_meta', 'smart_pro_service_nonce');
    
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    $service_price = get_post_meta($post->ID, '_service_price', true);
    $service_duration = get_post_meta($post->ID, '_service_duration', true);
    $featured_service = get_post_meta($post->ID, '_featured_service', true);
    
    ?>
    <p>
        <label for="service_icon"><?php _e('Icon Class (Font Awesome):', 'smart-pro'); ?></label><br>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" class="widefat" placeholder="fa-star">
    </p>
    <p>
        <label for="service_price"><?php _e('Price:', 'smart-pro'); ?></label><br>
        <input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" class="widefat" placeholder="$99.00">
    </p>
    <p>
        <label for="service_duration"><?php _e('Duration:', 'smart-pro'); ?></label><br>
        <input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($service_duration); ?>" class="widefat" placeholder="1 hour">
    </p>
    <p>
        <label for="featured_service">
            <input type="checkbox" id="featured_service" name="featured_service" value="1" <?php checked($featured_service, '1'); ?>>
            <?php _e('Featured Service', 'smart-pro'); ?>
        </label>
    </p>
    <?php
}

function smart_pro_save_service_meta($post_id) {
    if (!isset($_POST['smart_pro_service_nonce']) || !wp_verify_nonce($_POST['smart_pro_service_nonce'], 'smart_pro_service_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    
    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
    }
    
    if (isset($_POST['service_duration'])) {
        update_post_meta($post_id, '_service_duration', sanitize_text_field($_POST['service_duration']));
    }
    
    if (isset($_POST['featured_service'])) {
        update_post_meta($post_id, '_featured_service', '1');
    } else {
        delete_post_meta($post_id, '_featured_service');
    }
}
add_action('save_post_services', 'smart_pro_save_service_meta');

/**
 * Register Team Members Post Type
 */
function smart_pro_register_team() {
    $labels = array(
        'name' => _x('Team Members', 'post type general name', 'smart-pro'),
        'singular_name' => _x('Team Member', 'post type singular name', 'smart-pro'),
        'menu_name' => _x('Team', 'admin menu', 'smart-pro'),
        'add_new' => _x('Add New', 'team member', 'smart-pro'),
        'add_new_item' => __('Add New Team Member', 'smart-pro'),
        'new_item' => __('New Team Member', 'smart-pro'),
        'edit_item' => __('Edit Team Member', 'smart-pro'),
        'view_item' => __('View Team Member', 'smart-pro'),
        'all_items' => __('All Team Members', 'smart-pro'),
        'search_items' => __('Search Team Members', 'smart-pro'),
        'not_found' => __('No team members found.', 'smart-pro'),
        'not_found_in_trash' => __('No team members found in Trash.', 'smart-pro'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions'),
        'show_in_rest' => true,
        'rest_base' => 'team',
    );

    register_post_type('team', $args);

    // Team Meta Boxes
    add_action('add_meta_boxes', 'smart_pro_team_meta_boxes');
}
add_action('init', 'smart_pro_register_team');

function smart_pro_team_meta_boxes() {
    add_meta_box(
        'team_details',
        __('Team Member Details', 'smart-pro'),
        'smart_pro_team_details_callback',
        'team',
        'normal',
        'high'
    );
}

function smart_pro_team_details_callback($post) {
    wp_nonce_field('smart_pro_team_meta', 'smart_pro_team_nonce');
    
    $position = get_post_meta($post->ID, '_team_position', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    $twitter = get_post_meta($post->ID, '_team_twitter', true);
    $facebook = get_post_meta($post->ID, '_team_facebook', true);
    
    ?>
    <p>
        <label for="position"><?php _e('Position:', 'smart-pro'); ?></label><br>
        <input type="text" id="position" name="position" value="<?php echo esc_attr($position); ?>" class="widefat">
    </p>
    <p>
        <label for="email"><?php _e('Email:', 'smart-pro'); ?></label><br>
        <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="widefat">
    </p>
    <p>
        <label for="phone"><?php _e('Phone:', 'smart-pro'); ?></label><br>
        <input type="tel" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" class="widefat">
    </p>
    <p>
        <label for="linkedin"><?php _e('LinkedIn URL:', 'smart-pro'); ?></label><br>
        <input type="url" id="linkedin" name="linkedin" value="<?php echo esc_attr($linkedin); ?>" class="widefat">
    </p>
    <p>
        <label for="twitter"><?php _e('Twitter URL:', 'smart-pro'); ?></label><br>
        <input type="url" id="twitter" name="twitter" value="<?php echo esc_attr($twitter); ?>" class="widefat">
    </p>
    <p>
        <label for="facebook"><?php _e('Facebook URL:', 'smart-pro'); ?></label><br>
        <input type="url" id="facebook" name="facebook" value="<?php echo esc_attr($facebook); ?>" class="widefat">
    </p>
    <?php
}

function smart_pro_save_team_meta($post_id) {
    if (!isset($_POST['smart_pro_team_nonce']) || !wp_verify_nonce($_POST['smart_pro_team_nonce'], 'smart_pro_team_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['position'])) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['position']));
    }
    
    if (isset($_POST['email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['email']));
    }
    
    if (isset($_POST['phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['phone']));
    }
    
    if (isset($_POST['linkedin'])) {
        update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['linkedin']));
    }
    
    if (isset($_POST['twitter'])) {
        update_post_meta($post_id, '_team_twitter', esc_url_raw($_POST['twitter']));
    }
    
    if (isset($_POST['facebook'])) {
        update_post_meta($post_id, '_team_facebook', esc_url_raw($_POST['facebook']));
    }
}
add_action('save_post_team', 'smart_pro_save_team_meta');

/**
 * Flush rewrite rules on theme activation
 */
function smart_pro_flush_rewrite_rules() {
    smart_pro_register_portfolio();
    smart_pro_register_testimonials();
    smart_pro_register_services();
    smart_pro_register_team();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'smart_pro_flush_rewrite_rules');
