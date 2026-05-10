<?php
/**
 * Header Template
 * 
 * @package Smart_Pro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('انتقل للمحتوى', 'smart-pro'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-container">
            <!-- الشعار -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- القائمة الرئيسية -->
            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                    <span class="screen-reader-text"><?php _e('القائمة', 'smart-pro'); ?></span>
                </button>
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'smart_pro_fallback_menu',
                ));
                ?>
            </nav>

            <!-- أدوات الهيدر -->
            <div class="header-tools">
                <!-- زر البحث -->
                <button class="search-toggle" aria-label="<?php _e('بحث', 'smart-pro'); ?>">
                    <i class="fas fa-search"></i>
                </button>

                <!-- سلة التسوق (إذا كان WooCommerce مفعلاً) -->
                <?php if (class_exists('WooCommerce')) : ?>
                    <a class="cart-toggle" href="<?php echo wc_get_cart_url(); ?>" aria-label="<?php _e('السلة', 'smart-pro'); ?>">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                <?php endif; ?>

                <!-- زر تسجيل الدخول -->
                <?php if (!is_user_logged_in()) : ?>
                    <a class="login-btn" href="<?php echo wp_login_url(); ?>">
                        <i class="fas fa-user"></i>
                        <span class="desktop-only"><?php _e('دخول', 'smart-pro'); ?></span>
                    </a>
                <?php else : ?>
                    <a class="account-btn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <i class="fas fa-user-circle"></i>
                        <span class="desktop-only"><?php _e('حسابي', 'smart-pro'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- نموذج البحث المنبثق -->
        <div class="search-overlay">
            <div class="search-form-container">
                <button class="search-close" aria-label="<?php _e('إغلاق', 'smart-pro'); ?>">
                    <i class="fas fa-times"></i>
                </button>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>
