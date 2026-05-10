<?php
/**
 * Customizer Options
 * Advanced theme customization with live preview
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer sections, settings, and controls
 */
function smart_pro_customize_register($wp_customize) {
    
    // ===========================
    // Theme Colors Section
    // ===========================
    $wp_customize->add_section('smart_pro_colors', array(
        'title' => __('Theme Colors', 'smart-pro'),
        'priority' => 30,
        'description' => __('Customize your theme colors', 'smart-pro')
    ));
    
    // Primary Color
    $wp_customize->add_setting('smart_pro_primary_color', array(
        'default' => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'smart_pro_primary_color', array(
        'label' => __('Primary Color', 'smart-pro'),
        'section' => 'smart_pro_colors',
        'settings' => 'smart_pro_primary_color'
    )));
    
    // Secondary Color
    $wp_customize->add_setting('smart_pro_secondary_color', array(
        'default' => '#7c3aed',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'smart_pro_secondary_color', array(
        'label' => __('Secondary Color', 'smart-pro'),
        'section' => 'smart_pro_colors',
        'settings' => 'smart_pro_secondary_color'
    )));
    
    // Accent Color
    $wp_customize->add_setting('smart_pro_accent_color', array(
        'default' => '#f59e0b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'smart_pro_accent_color', array(
        'label' => __('Accent Color', 'smart-pro'),
        'section' => 'smart_pro_colors',
        'settings' => 'smart_pro_accent_color'
    )));
    
    // Text Color
    $wp_customize->add_setting('smart_pro_text_color', array(
        'default' => '#1f2937',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'smart_pro_text_color', array(
        'label' => __('Text Color', 'smart-pro'),
        'section' => 'smart_pro_colors',
        'settings' => 'smart_pro_text_color'
    )));
    
    // Background Color
    $wp_customize->add_setting('smart_pro_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'smart_pro_background_color', array(
        'label' => __('Background Color', 'smart-pro'),
        'section' => 'smart_pro_colors',
        'settings' => 'smart_pro_background_color'
    )));
    
    // ===========================
    // Typography Section
    // ===========================
    $wp_customize->add_section('smart_pro_typography', array(
        'title' => __('Typography', 'smart-pro'),
        'priority' => 31,
        'description' => __('Customize fonts and typography', 'smart-pro')
    ));
    
    // Body Font Family
    $wp_customize->add_setting('smart_pro_body_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_body_font', array(
        'label' => __('Body Font Family', 'smart-pro'),
        'section' => 'smart_pro_typography',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter',
            'Poppins' => 'Poppins',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Montserrat' => 'Montserrat'
        )
    ));
    
    // Heading Font Family
    $wp_customize->add_setting('smart_pro_heading_font', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_heading_font', array(
        'label' => __('Heading Font Family', 'smart-pro'),
        'section' => 'smart_pro_typography',
        'type' => 'select',
        'choices' => array(
            'Poppins' => 'Poppins',
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Playfair Display' => 'Playfair Display',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway'
        )
    ));
    
    // Body Font Size
    $wp_customize->add_setting('smart_pro_body_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_body_font_size', array(
        'label' => __('Body Font Size (px)', 'smart-pro'),
        'section' => 'smart_pro_typography',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 12,
            'max' => 24,
            'step' => 1
        )
    ));
    
    // ===========================
    // Header Settings
    // ===========================
    $wp_customize->add_section('smart_pro_header', array(
        'title' => __('Header Settings', 'smart-pro'),
        'priority' => 32,
        'description' => __('Customize header appearance and behavior', 'smart-pro')
    ));
    
    // Header Layout
    $wp_customize->add_setting('smart_pro_header_layout', array(
        'default' => 'centered',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_header_layout', array(
        'label' => __('Header Layout', 'smart-pro'),
        'section' => 'smart_pro_header',
        'type' => 'select',
        'choices' => array(
            'left' => __('Left Aligned', 'smart-pro'),
            'centered' => __('Centered', 'smart-pro'),
            'right' => __('Right Aligned', 'smart-pro'),
            'split' => __('Split (Logo Left, Menu Right)', 'smart-pro')
        )
    ));
    
    // Sticky Header
    $wp_customize->add_setting('smart_pro_sticky_header', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_sticky_header', array(
        'label' => __('Enable Sticky Header', 'smart-pro'),
        'section' => 'smart_pro_header',
        'type' => 'checkbox'
    ));
    
    // Header Transparency
    $wp_customize->add_setting('smart_pro_header_transparent', array(
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_header_transparent', array(
        'label' => __('Transparent Header on Front Page', 'smart-pro'),
        'section' => 'smart_pro_header',
        'type' => 'checkbox'
    ));
    
    // Show Top Bar
    $wp_customize->add_setting('smart_pro_show_top_bar', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_top_bar', array(
        'label' => __('Show Top Bar', 'smart-pro'),
        'section' => 'smart_pro_header',
        'type' => 'checkbox'
    ));
    
    // Top Bar Text
    $wp_customize->add_setting('smart_pro_top_bar_text', array(
        'default' => __('Welcome to our website!', 'smart-pro'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_top_bar_text', array(
        'label' => __('Top Bar Text', 'smart-pro'),
        'section' => 'smart_pro_header',
        'type' => 'text'
    ));
    
    // ===========================
    // Footer Settings
    // ===========================
    $wp_customize->add_section('smart_pro_footer', array(
        'title' => __('Footer Settings', 'smart-pro'),
        'priority' => 33,
        'description' => __('Customize footer appearance', 'smart-pro')
    ));
    
    // Footer Layout
    $wp_customize->add_setting('smart_pro_footer_layout', array(
        'default' => '4-columns',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_footer_layout', array(
        'label' => __('Footer Widget Layout', 'smart-pro'),
        'section' => 'smart_pro_footer',
        'type' => 'select',
        'choices' => array(
            '1-column' => __('1 Column', 'smart-pro'),
            '2-columns' => __('2 Columns', 'smart-pro'),
            '3-columns' => __('3 Columns', 'smart-pro'),
            '4-columns' => __('4 Columns', 'smart-pro')
        )
    ));
    
    // Copyright Text
    $wp_customize->add_setting('smart_pro_copyright_text', array(
        'default' => __('© 2024 Smart Pro Theme. All rights reserved.', 'smart-pro'),
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_copyright_text', array(
        'label' => __('Copyright Text', 'smart-pro'),
        'section' => 'smart_pro_footer',
        'type' => 'textarea'
    ));
    
    // Show Social Icons
    $wp_customize->add_setting('smart_pro_show_social', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_social', array(
        'label' => __('Show Social Media Icons', 'smart-pro'),
        'section' => 'smart_pro_footer',
        'type' => 'checkbox'
    ));
    
    // ===========================
    // Blog Settings
    // ===========================
    $wp_customize->add_section('smart_pro_blog', array(
        'title' => __('Blog Settings', 'smart-pro'),
        'priority' => 34,
        'description' => __('Customize blog appearance', 'smart-pro')
    ));
    
    // Blog Layout
    $wp_customize->add_setting('smart_pro_blog_layout', array(
        'default' => 'grid',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_blog_layout', array(
        'label' => __('Blog Layout', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'select',
        'choices' => array(
            'list' => __('List View', 'smart-pro'),
            'grid' => __('Grid View', 'smart-pro'),
            'masonry' => __('Masonry Grid', 'smart-pro')
        )
    ));
    
    // Posts Per Page
    $wp_customize->add_setting('smart_pro_posts_per_page', array(
        'default' => 9,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_posts_per_page', array(
        'label' => __('Posts Per Page', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 3,
            'max' => 20,
            'step' => 1
        )
    ));
    
    // Show Featured Image
    $wp_customize->add_setting('smart_pro_show_featured_image', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_featured_image', array(
        'label' => __('Show Featured Image', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'checkbox'
    ));
    
    // Show Author
    $wp_customize->add_setting('smart_pro_show_author', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_author', array(
        'label' => __('Show Author', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'checkbox'
    ));
    
    // Show Date
    $wp_customize->add_setting('smart_pro_show_date', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_date', array(
        'label' => __('Show Date', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'checkbox'
    ));
    
    // Show Categories
    $wp_customize->add_setting('smart_pro_show_categories', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_show_categories', array(
        'label' => __('Show Categories', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'checkbox'
    ));
    
    // Excerpt Length
    $wp_customize->add_setting('smart_pro_excerpt_length', array(
        'default' => 25,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_excerpt_length', array(
        'label' => __('Excerpt Length (words)', 'smart-pro'),
        'section' => 'smart_pro_blog',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 1
        )
    ));
    
    // ===========================
    // Hero Section
    // ===========================
    $wp_customize->add_section('smart_pro_hero', array(
        'title' => __('Hero Section', 'smart-pro'),
        'priority' => 35,
        'description' => __('Customize hero section on front page', 'smart-pro')
    ));
    
    // Hero Title
    $wp_customize->add_setting('smart_pro_hero_title', array(
        'default' => __('Welcome to Smart Pro', 'smart-pro'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_hero_title', array(
        'label' => __('Hero Title', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'type' => 'text'
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('smart_pro_hero_subtitle', array(
        'default' => __('Build amazing websites with our professional theme', 'smart-pro'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_hero_subtitle', array(
        'label' => __('Hero Subtitle', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'type' => 'textarea'
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('smart_pro_hero_button_text', array(
        'default' => __('Get Started', 'smart-pro'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_hero_button_text', array(
        'label' => __('Hero Button Text', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'type' => 'text'
    ));
    
    // Hero Button URL
    $wp_customize->add_setting('smart_pro_hero_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_hero_button_url', array(
        'label' => __('Hero Button URL', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'type' => 'url'
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('smart_pro_hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'smart_pro_hero_background', array(
        'label' => __('Hero Background Image', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'settings' => 'smart_pro_hero_background'
    )));
    
    // Enable Hero Section
    $wp_customize->add_setting('smart_pro_enable_hero', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_enable_hero', array(
        'label' => __('Enable Hero Section', 'smart-pro'),
        'section' => 'smart_pro_hero',
        'type' => 'checkbox'
    ));
    
    // ===========================
    // Performance Settings
    // ===========================
    $wp_customize->add_section('smart_pro_performance', array(
        'title' => __('Performance', 'smart-pro'),
        'priority' => 36,
        'description' => __('Optimize theme performance', 'smart-pro')
    ));
    
    // Lazy Load Images
    $wp_customize->add_setting('smart_pro_lazy_load', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_lazy_load', array(
        'label' => __('Enable Lazy Load for Images', 'smart-pro'),
        'section' => 'smart_pro_performance',
        'type' => 'checkbox'
    ));
    
    // Minify CSS
    $wp_customize->add_setting('smart_pro_minify_css', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_minify_css', array(
        'label' => __('Minify CSS', 'smart-pro'),
        'section' => 'smart_pro_performance',
        'type' => 'checkbox'
    ));
    
    // Preload Critical Resources
    $wp_customize->add_setting('smart_pro_preload', array(
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_preload', array(
        'label' => __('Preload Critical Resources', 'smart-pro'),
        'section' => 'smart_pro_performance',
        'type' => 'checkbox'
    ));
    
    // ===========================
    // Social Media Links
    // ===========================
    $wp_customize->add_section('smart_pro_social', array(
        'title' => __('Social Media', 'smart-pro'),
        'priority' => 37,
        'description' => __('Add your social media profiles', 'smart-pro')
    ));
    
    $social_networks = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin' => 'LinkedIn',
        'youtube' => 'YouTube',
        'pinterest' => 'Pinterest',
        'github' => 'GitHub',
        'dribbble' => 'Dribbble'
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('smart_pro_social_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh'
        ));
        
        $wp_customize->add_control('smart_pro_social_' . $network, array(
            'label' => sprintf(__('%s URL', 'smart-pro'), $label),
            'section' => 'smart_pro_social',
            'type' => 'url'
        ));
    }
    
    // ===========================
    // Contact Information
    // ===========================
    $wp_customize->add_section('smart_pro_contact', array(
        'title' => __('Contact Information', 'smart-pro'),
        'priority' => 38,
        'description' => __('Add contact details for footer', 'smart-pro')
    ));
    
    $wp_customize->add_setting('smart_pro_contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_contact_email', array(
        'label' => __('Email Address', 'smart-pro'),
        'section' => 'smart_pro_contact',
        'type' => 'email'
    ));
    
    $wp_customize->add_setting('smart_pro_contact_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_contact_phone', array(
        'label' => __('Phone Number', 'smart-pro'),
        'section' => 'smart_pro_contact',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('smart_pro_contact_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control('smart_pro_contact_address', array(
        'label' => __('Address', 'smart-pro'),
        'section' => 'smart_pro_contact',
        'type' => 'textarea'
    ));
}
add_action('customize_register', 'smart_pro_customize_register');

/**
 * Output customizer CSS
 */
function smart_pro_customizer_css() {
    $primary_color = get_theme_mod('smart_pro_primary_color', '#2563eb');
    $secondary_color = get_theme_mod('smart_pro_secondary_color', '#7c3aed');
    $accent_color = get_theme_mod('smart_pro_accent_color', '#f59e0b');
    $text_color = get_theme_mod('smart_pro_text_color', '#1f2937');
    $background_color = get_theme_mod('smart_pro_background_color', '#ffffff');
    $body_font = get_theme_mod('smart_pro_body_font', 'Inter');
    $heading_font = get_theme_mod('smart_pro_heading_font', 'Poppins');
    $body_font_size = get_theme_mod('smart_pro_body_font_size', 16);
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --text-color: <?php echo esc_attr($text_color); ?>;
            --background-color: <?php echo esc_attr($background_color); ?>;
            --body-font: '<?php echo esc_attr($body_font); ?>', sans-serif;
            --heading-font: '<?php echo esc_attr($heading_font); ?>', sans-serif;
            --body-font-size: <?php echo intval($body_font_size); ?>px;
        }
        
        body {
            font-family: var(--body-font);
            font-size: var(--body-font-size);
            color: var(--text-color);
            background-color: var(--background-color);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--heading-font);
        }
        
        a {
            color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .text-accent {
            color: var(--accent-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'smart_pro_customizer_css');

/**
 * Enqueue customizer controls JS
 */
function smart_pro_customizer_controls_js() {
    wp_enqueue_script('smart-pro-customizer', SMART_PRO_URI . '/assets/js/customizer.js', array('jquery', 'customize-controls'), SMART_PRO_VERSION, true);
}
add_action('customize_controls_enqueue_scripts', 'smart_pro_customizer_controls_js');

/**
 * Enqueue customizer preview JS
 */
function smart_pro_customizer_preview_js() {
    wp_enqueue_script('smart-pro-customizer-preview', SMART_PRO_URI . '/assets/js/customizer-preview.js', array('jquery', 'customize-preview'), SMART_PRO_VERSION, true);
}
add_action('customize_preview_init', 'smart_pro_customizer_preview_js');
