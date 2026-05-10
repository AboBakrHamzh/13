# دليل تحويل الموقع إلى قالب ووردبريس - AboBakr Creative Studio

## 📋 نظرة عامة على المشروع

هذا الدليل يشرح بالتفصيل كيفية تحويل الموقع الحالي (المبني بـ HTML/CSS/React) إلى قالب ووردبريس متكامل يحافظ على **نفس التصميم والشكل بالكامل** مع جميع المزايا والوظائف.

---

## 🎯 المميزات الحالية في الموقع الأصلي

### 1. **الصفحات الرئيسية**
- الصفحة الرئيسية (Home) مع Hero تفاعلي
- معرض الأعمال (Portfolio Gallery)
- صفحة المشروع الفردي (Single Project)
- المتجر (Shop)
- صفحة المنتج الفردي
- عربة التسوق (Cart Drawer)
- الفيديوهات (Videos)
- من نحن (About)
- اتصل بنا (Contact)
- صفحة الطلب (Order)

### 2. **المكونات التفاعلية**
- مؤشر ماوس مخصص (Custom Cursor)
- شريط بحث سريع (Cmd+K / Ctrl+K)
- ودجت واتساب
- صندوق ضوء للصور (Lightbox)
- النافذة المنبثقة السريعة (Quick View)
- صوت تفاعلي (UI Sound)
- لوحة تخصيص (Tweaks Panel)
- ستارة انتقال الصفحات (Page Curtain)
- إشعارات Toast

### 3. **التخصيصات المتاحة**
- تغيير لون التمييز (Accent Color)
- زوايا الكروت (Hard/Soft/Round)
- حجم الخط (14-20px)
- الكثافة (Compact/Regular/Comfy)
- إظهار/إخفاء المؤشر المخصص
- إظهار/إخفاء ودجت الواتساب
- الصوت التفاعلي
- نمط الهيرو (Reel/Static)

### 4. **اللغات**
- العربية (RTL)
- الإنجليزية (LTR)

### 5. **السمات**
- الوضع الداكن (Dark)
- الوضع الفاتح (Light)

---

## 📁 هيكل مجلد القالب المقترح

```
abobakr-theme/
├── style.css                 # معلومات القالب الرئيسي
├── functions.php             # وظائف القالب
├── index.php                 # الملف الرئيسي
├── header.php                # رأس الصفحة
├── footer.php                # تذييل الصفحة
├── front-page.php            # الصفحة الرئيسية
├── page.php                  # الصفحات العادية
├── single.php                # المشاركات الفردية
├── archive.php               # أرشيف المشاركات
├── search.php                # نتائج البحث
├── 404.php                   # صفحة الخطأ 404
│
├── template-parts/
│   ├── header/
│   │   ├── site-branding.php
│   │   ├── navigation.php
│   │   └── header-actions.php
│   ├── footer/
│   │   ├── footer-widgets.php
│   │   └── social-links.php
│   ├── hero/
│   │   ├── hero-reel.php
│   │   └── hero-static.php
│   ├── portfolio/
│   │   ├── grid-item.php
│   │   └── filters.php
│   ├── shop/
│   │   ├── product-card.php
│   │   └── cart-drawer.php
│   └── components/
│       ├── custom-cursor.php
│       ├── search-overlay.php
│       ├── lightbox.php
│       ├── quick-view.php
│       ├── toast.php
│       └── page-curtain.php
│
├── inc/
│   ├── customizer.php        # إعدادات التخصيص
│   ├── post-types.php        # أنواع المحتوى المخصص
│   ├── ajax-handlers.php     # معالجات AJAX
│   ├── widgets.php           # الودجات المخصصة
│   └── template-functions.php # دوال القالب
│
├── assets/
│   ├── css/
│   │   ├── main.css          # الأنماط الرئيسية
│   │   ├── extras.css        # أنماط إضافية
│   │   ├── admin.css         # أنماط لوحة الإدارة
│   │   └── customizer.css    # أنماط التخصيص
│   ├── js/
│   │   ├── main.js           # الجافاسكربت الرئيسي
│   │   ├── cursor.js         # المؤشر المخصص
│   │   ├── search.js         # البحث
│   │   ├── lightbox.js       # صندوق الضوء
│   │   ├── cart.js           # عربة التسوق
│   │   ├── sound.js          # الأصوات
│   │   └── customizer.js     # معاينة التخصيص الحية
│   ├── fonts/                # الخطوط المحلية
│   └── images/               # الصور والأيقونات
│
├── woocommerce/              # دعم ووكومرس
│   ├── archive-product.php
│   ├── single-product.php
│   ├── content-product.php
│   └── cart/
│       └── cart-drawer.php
│
└── languages/                # ملفات الترجمة
    ├── abobakr-ar.po
    ├── abobakr-ar.mo
    ├── abobakr-en.po
    └── abobakr-en.mo
```

---

## 🔧 خطوات التحويل التفصيلية

### المرحلة 1: إعداد هيكل القالب الأساسي

#### 1.1 إنشاء ملف `style.css`

```css
/*
Theme Name: AboBakr Creative
Theme URI: https://example.com/abobakr-theme
Author: Your Name
Author URI: https://example.com
Description: قالب ووردبريس احترافي للاستوديوهات الإبداعية مع دعم كامل للعربية والإنجليزية، يتضمن معرض أعمال، متجر، ونظام تخصيص متقدم.
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.4
Requires PHP: 8.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: abobakr
Tags: creative, portfolio, dark-mode, rtl, woocommerce, custom-colors, responsive
*/
```

#### 1.2 إنشاء ملف `functions.php`

```php
<?php
/**
 * AboBakr Theme Functions
 */

// تعريف ثوابت القالب
define('ABOBAKR_VERSION', '1.0.0');
define('ABOBAKR_DIR', get_template_directory());
define('ABOBAKR_URI', get_template_directory_uri());

// تحميل ملفات القالب الأساسية
require_once ABOBAKR_DIR . '/inc/template-functions.php';
require_once ABOBAKR_DIR . '/inc/customizer.php';
require_once ABOBAKR_DIR . '/inc/post-types.php';
require_once ABOBAKR_DIR . '/inc/ajax-handlers.php';
require_once ABOBAKR_DIR . '/inc/widgets.php';

// دعم ووكومرس (اختياري)
require_once ABOBAKR_DIR . '/inc/woocommerce.php';

/**
 * إعداد القالب
 */
function abobakr_setup() {
    // دعم اللغات
    load_theme_textdomain('abobakr', ABOBAKR_DIR . '/languages');
    
    // دعم الوسوم الديناميكية
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // دعم شعار الموقع
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));
    
    // دعم الخلفية المخصصة
    add_theme_support('custom-background');
    
    // دعم ألوان المحرر
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('اللون الأساسي', 'abobakr'),
            'slug' => 'accent',
            'color' => '#C8A96E',
        ),
        array(
            'name' => __('الخلفية', 'abobakr'),
            'slug' => 'bg',
            'color' => '#080808',
        ),
        array(
            'name' => __('النص', 'abobakr'),
            'slug' => 'text',
            'color' => '#EDEAE4',
        ),
    ));
    
    // تسجيل القوائم
    register_nav_menus(array(
        'primary' => __('القائمة الرئيسية', 'abobakr'),
        'footer' => __('قائمة التذييل', 'abobakr'),
        'mobile' => __('قائمة الجوال', 'abobakr'),
    ));
    
    // حجم الصور
    add_image_size('abobakr-large', 1280, 720, true);
    add_image_size('abobakr-medium', 800, 600, true);
    add_image_size('abobakr-small', 400, 300, true);
}
add_action('after_setup_theme', 'abobakr_setup');

/**
 * تحميل الملفات والأسكريبتات
 */
function abobakr_scripts() {
    // Google Fonts
    wp_enqueue_style('abobakr-fonts', 
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=DM+Sans:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800&family=JetBrains+Mono:wght@400;500&display=swap',
        array(), null
    );
    
    // الأنماط الرئيسية
    wp_enqueue_style('abobakr-main', 
        ABOBAKR_URI . '/assets/css/main.css', 
        array(), ABOBAKR_VERSION
    );
    
    wp_enqueue_style('abobakr-extras', 
        ABOBAKR_URI . '/assets/css/extras.css', 
        array('abobakr-main'), ABOBAKR_VERSION
    );
    
    // React (للمكونات التفاعلية)
    wp_enqueue_script('react');
    wp_enqueue_script('react-dom');
    
    // السكربت الرئيسي
    wp_enqueue_script('abobakr-main', 
        ABOBAKR_URI . '/assets/js/main.js', 
        array('jquery'), ABOBAKR_VERSION, true
    );
    
    // تمرير البيانات للجافاسكربت
    wp_localize_script('abobakr-main', 'abobakrData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('abobakr_nonce'),
        'themeDir' => ABOBAKR_URI,
        'lang' => get_locale(),
        'isRTL' => is_rtl(),
    ));
}
add_action('wp_enqueue_scripts', 'abobakr_scripts');

/**
 * دعم WooCommerce
 */
function abobakr_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'abobakr_woocommerce_support');
```

---

### المرحلة 2: إنشاء أنواع المحتوى المخصص (Custom Post Types)

#### 2.1 ملف `inc/post-types.php`

```php
<?php
/**
 * تسجيل أنواع المحتوى المخصص
 */

// نوع محتوى: مشاريع المعرض
function abobakr_register_portfolio() {
    $labels = array(
        'name' => _x('المشاريع', 'post type general name', 'abobakr'),
        'singular_name' => _x('مشروع', 'post type singular name', 'abobakr'),
        'menu_name' => _x('معرض الأعمال', 'admin menu', 'abobakr'),
        'add_new' => _x('إضافة مشروع جديد', 'project', 'abobakr'),
        'add_new_item' => __('إضافة مشروع جديد', 'abobakr'),
        'edit_item' => __('تعديل المشروع', 'abobakr'),
        'new_item' => __('مشروع جديد', 'abobakr'),
        'view_item' => __('عرض المشروع', 'abobakr'),
        'search_items' => __('بحث في المشاريع', 'abobakr'),
        'not_found' => __('لم يتم العثور على مشاريع', 'abobakr'),
        'not_found_in_trash' => __('لا توجد مشاريع في سلة المهملات', 'abobakr'),
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies' => array('project_category', 'project_tag'),
    );
    
    register_post_type('abobakr_project', $args);
    
    // تصنيفات المشاريع
    register_taxonomy('project_category', 'abobakr_project', array(
        'labels' => array(
            'name' => __('تصنيفات المشاريع', 'abobakr'),
            'singular_name' => __('تصنيف', 'abobakr'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
    ));
    
    // وسوم المشاريع
    register_taxonomy('project_tag', 'abobakr_project', array(
        'labels' => array(
            'name' => __('وسوم المشاريع', 'abobakr'),
            'singular_name' => __('وسم', 'abobakr'),
        ),
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-tag'),
    ));
}
add_action('init', 'abobakr_register_portfolio');

// نوع محتوى: فيديوهات
function abobakr_register_videos() {
    $labels = array(
        'name' => _x('الفيديوهات', 'post type general name', 'abobakr'),
        'singular_name' => _x('فيديو', 'post type singular name', 'abobakr'),
        'menu_name' => _x('الفيديوهات', 'admin menu', 'abobakr'),
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('video_category'),
    );
    
    register_post_type('abobakr_video', $args);
}
add_action('init', 'abobakr_register_videos');
```

---

### المرحلة 3: لوحة التخصيص (Customizer)

#### 3.1 ملف `inc/customizer.php`

```php
<?php
/**
 * إعدادات تخصيص القالب
 */

function abobakr_customize_register($wp_customize) {
    
    // قسم الهوية
    $wp_customize->add_section('abobakr_identity', array(
        'title' => __('الهوية البصرية', 'abobakr'),
        'priority' => 30,
    ));
    
    // لون التمييز
    $wp_customize->add_setting('abobakr_accent_color', array(
        'default' => '#C8A96E',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'abobakr_accent_color', array(
        'label' => __('لون التمييز', 'abobakr'),
        'section' => 'abobakr_identity',
        'settings' => 'abobakr_accent_color',
    )));
    
    // زوايا الكروت
    $wp_customize->add_setting('abobakr_card_corners', array(
        'default' => 'round',
        'sanitize_callback' => 'abobakr_sanitize_radio',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('abobakr_card_corners', array(
        'label' => __('زوايا الكروت', 'abobakr'),
        'section' => 'abobakr_identity',
        'type' => 'radio',
        'choices' => array(
            'hard' => __('حادة', 'abobakr'),
            'soft' => __('ناعمة', 'abobakr'),
            'round' => __('دائرية', 'abobakr'),
        ),
    ));
    
    // قسم الواجهة
    $wp_customize->add_section('abobakr_interface', array(
        'title' => __('الواجهة', 'abobakr'),
        'priority' => 31,
    ));
    
    // المؤشر المخصص
    $wp_customize->add_setting('abobakr_show_cursor', array(
        'default' => true,
        'sanitize_callback' => 'abobakr_sanitize_checkbox',
    ));
    
    $wp_customize->add_control('abobakr_show_cursor', array(
        'label' => __('إظهار المؤشر المخصص', 'abobakr'),
        'section' => 'abobakr_interface',
        'type' => 'checkbox',
    ));
    
    // ودجت الواتساب
    $wp_customize->add_setting('abobakr_whatsapp_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('abobakr_whatsapp_number', array(
        'label' => __('رقم الواتساب', 'abobakr'),
        'description' => __('أدخل الرقم بالصيغة الدولية بدون +', 'abobakr'),
        'section' => 'abobakr_interface',
        'type' => 'text',
    ));
    
    // قسم الخطوط
    $wp_customize->add_section('abobakr_typography', array(
        'title' => __('الخطوط', 'abobakr'),
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('abobakr_font_size', array(
        'default' => 18,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('abobakr_font_size', array(
        'label' => __('حجم الخط الأساسي', 'abobakr'),
        'section' => 'abobakr_typography',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 14,
            'max' => 20,
            'step' => 1,
        ),
    ));
    
    // قسم الألوان
    $wp_customize->add_section('abobakr_colors', array(
        'title' => __('الألوان', 'abobakr'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('abobakr_palette', array(
        'default' => json_encode(array('#C8A96E', '#080808', '#EDEAE4')),
        'sanitize_callback' => 'abobakr_sanitize_palette',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('abobakr_palette', array(
        'label' => __('لوحة الألوان', 'abobakr'),
        'section' => 'abobakr_colors',
        'type' => 'textarea',
        'description' => __('أدخل الألوان بصيغة JSON Array', 'abobakr'),
    ));
}
add_action('customize_register', 'abobakr_customize_register');

// دوال التنظيف
function abobakr_sanitize_radio($input) {
    $valid = array('hard', 'soft', 'round');
    return in_array($input, $valid) ? $input : 'round';
}

function abobakr_sanitize_checkbox($input) {
    return $input ? true : false;
}

function abobakr_sanitize_palette($input) {
    return wp_json_encode(json_decode($input));
}

// معاينة حية للتخصيصات
function abobakr_customize_preview_js() {
    wp_enqueue_script('abobakr-customizer',
        get_template_directory_uri() . '/assets/js/customizer.js',
        array('customize-preview'), ABOBAKR_VERSION, true
    );
}
add_action('customize_preview_init', 'abobakr_customize_preview_js');
```

---

### المرحلة 4: ملفات القالب الرئيسية

#### 4.1 ملف `header.php`

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="<?php echo get_option('abobakr_theme_mode', 'dark'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="root">
    <!-- مؤشر ماوس مخصص -->
    <?php if (get_theme_mod('abobakr_show_cursor', true)): ?>
        <?php get_template_part('template-parts/components/custom-cursor'); ?>
    <?php endif; ?>
    
    <!-- رأس الصفحة -->
    <header class="site-header" id="site-header">
        <div class="container">
            <div class="site-header__inner">
                <!-- الشعار -->
                <?php get_template_part('template-parts/header/site-branding'); ?>
                
                <!-- القائمة الرئيسية -->
                <?php get_template_part('template-parts/header/navigation'); ?>
                
                <!-- أزرار الإجراءات -->
                <?php get_template_part('template-parts/header/header-actions'); ?>
            </div>
        </div>
    </header>
    
    <!-- ستارة الانتقال -->
    <?php get_template_part('template-parts/components/page-curtain'); ?>
    
    <main id="main-content">
```

#### 4.2 ملف `footer.php`

```php
    </main>
    
    <!-- تذييل الصفحة -->
    <footer class="site-footer" id="site-footer">
        <div class="container">
            <?php get_template_part('template-parts/footer/footer-widgets'); ?>
            <?php get_template_part('template-parts/footer/social-links'); ?>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('جميع الحقوق محفوظة', 'abobakr'); ?></p>
            </div>
        </div>
    </footer>
    
    <!-- مكونات إضافية -->
    <?php get_template_part('template-parts/components/search-overlay'); ?>
    <?php get_template_part('template-parts/components/lightbox'); ?>
    <?php get_template_part('template-parts/components/quick-view'); ?>
    <?php get_template_part('template-parts/components/toast'); ?>
    
    <!-- ودجت الواتساب -->
    <?php 
    $whatsapp = get_theme_mod('abobakr_whatsapp_number');
    if ($whatsapp):
    ?>
        <?php get_template_part('template-parts/components/whatsapp-widget'); ?>
    <?php endif; ?>
    
    <?php wp_footer(); ?>
</div>
</body>
</html>
```

#### 4.3 ملف `front-page.php`

```php
<?php
/**
 * Template: الصفحة الرئيسية
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero" data-hero-style="<?php echo esc_attr(get_theme_mod('abobakr_hero_style', 'reel')); ?>">
    <?php get_template_part('template-parts/hero/hero-reel'); ?>
</section>

<!-- Specialties Section -->
<section class="section" id="specialties">
    <div class="container">
        <div class="eyebrow"><?php _e('تخصصاتنا', 'abobakr'); ?></div>
        <h2 class="display"><?php _e('خمسة تخصصات. صوت بصري واحد.', 'abobakr'); ?></h2>
        
        <div class="specialties-grid">
            <?php
            $specialties = array(
                array('icon' => 'Aa', 'title_ar' => 'تصميم جرافيكس', 'title_en' => 'Graphic Design'),
                array('icon' => '✦', 'title_ar' => 'قطع ليزر', 'title_en' => 'Laser Cutting'),
                array('icon' => '▶', 'title_ar' => 'إنتاج فيديو', 'title_en' => 'Film Production'),
                array('icon' => '❀', 'title_ar' => 'تنسيق زهور', 'title_en' => 'Floral Design'),
                array('icon' => '◐', 'title_ar' => 'تصوير فوتوغرافي', 'title_en' => 'Photography'),
            );
            
            foreach ($specialties as $spec):
            ?>
                <div class="specialty-card reveal">
                    <span class="specialty-icon"><?php echo $spec['icon']; ?></span>
                    <h3><?php echo is_rtl() ? $spec['title_ar'] : $spec['title_en']; ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Portfolio Preview -->
<section class="section section--bg-2" id="portfolio">
    <div class="container">
        <div class="section-header">
            <div class="eyebrow"><?php _e('أعمالنا', 'abobakr'); ?></div>
            <h2 class="display"><?php _e('آخر المشاريع', 'abobakr'); ?></h2>
            <a href="<?php echo get_post_type_archive_link('abobakr_project'); ?>" class="btn btn-outline">
                <?php _e('عرض الكل', 'abobakr'); ?>
                <span class="arrow">←</span>
            </a>
        </div>
        
        <div class="portfolio-grid">
            <?php
            $args = array(
                'post_type' => 'abobakr_project',
                'posts_per_page' => 6,
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();
                    get_template_part('template-parts/portfolio/grid-item');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
```

---

### المرحلة 5: تحويل CSS إلى نظام ووردبريس

#### 5.1 إضافة متغيرات CSS ديناميكية

في ملف `inc/template-functions.php`:

```php
<?php
/**
 * إضافة أنماط CSS ديناميكية
 */

function abobakr_custom_css() {
    $accent = get_theme_mod('abobakr_accent_color', '#C8A96E');
    $corners = get_theme_mod('abobakr_card_corners', 'round');
    $font_size = get_theme_mod('abobakr_font_size', 18);
    
    $corner_values = array(
        'hard' => '0px',
        'soft' => '8px',
        'round' => '16px',
    );
    
    $radius = $corner_values[$corners] ?? '16px';
    
    ?>
    <style id="abobakr-custom-css">
        :root {
            --clr-accent: <?php echo esc_attr($accent); ?>;
            --clr-accent-dim: <?php echo esc_attr(abobakr_darken_color($accent, 15)); ?>;
            --clr-accent-glow: <?php echo esc_attr(abobakr_rgba($accent, 0.18)); ?>;
            --radius: <?php echo esc_attr($radius); ?>;
        }
        
        html {
            font-size: <?php echo esc_attr($font_size); ?>px;
        }
        
        html[data-density="compact"] {
            --gap: clamp(0.75rem, 2vw, 1.5rem);
            --section-py: clamp(3rem, 8vw, 6rem);
        }
        
        html[data-density="comfy"] {
            --gap: clamp(1.5rem, 4vw, 3rem);
            --section-py: clamp(5rem, 12vw, 10rem);
        }
    </style>
    <?php
}
add_action('wp_head', 'abobakr_custom_css', 100);

// دوال مساعدة للألوان
function abobakr_darken_color($hex, $percent) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    $r = max(0, $r - (255 * $percent / 100));
    $g = max(0, $g - (255 * $percent / 100));
    $b = max(0, $b - (255 * $percent / 100));
    
    return sprintf('#%02x%02x%02x', $r, $g, $b);
}

function abobakr_rgba($hex, $alpha) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    return "rgba({$r}, {$g}, {$b}, {$alpha})";
}
```

---

### المرحلة 6: معالجة AJAX للوظائف التفاعلية

#### 6.1 ملف `inc/ajax-handlers.php`

```php
<?php
/**
 * معالجات AJAX
 */

// البحث السريع
function abobakr_ajax_search() {
    check_ajax_referer('abobakr_nonce', 'nonce');
    
    $query = sanitize_text_field($_POST['query']);
    $results = array();
    
    // بحث في المشاريع
    $projects = new WP_Query(array(
        'post_type' => 'abobakr_project',
        's' => $query,
        'posts_per_page' => 5,
    ));
    
    if ($projects->have_posts()):
        while ($projects->have_posts()): $projects->the_post();
            $results[] = array(
                'type' => 'project',
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
            );
        endwhile;
    endif;
    
    // بحث في المنتجات
    if (class_exists('WooCommerce')):
        $products = new WP_Query(array(
            'post_type' => 'product',
            's' => $query,
            'posts_per_page' => 5,
        ));
        
        if ($products->have_posts()):
            while ($products->have_posts()): $products->the_post();
                $results[] = array(
                    'type' => 'product',
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'url' => get_permalink(),
                    'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
                    'price' => get_the_price(),
                );
            endwhile;
        endif;
    endif;
    
    wp_send_json_success($results);
}
add_action('wp_ajax_abobakr_search', 'abobakr_ajax_search');
add_action('wp_ajax_nopriv_abobakr_search', 'abobakr_ajax_search');

// إضافة إلى العربة (AJAX Cart)
function abobakr_ajax_add_to_cart() {
    check_ajax_referer('abobakr_nonce', 'nonce');
    
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    
    if (class_exists('WooCommerce')):
        WC()->cart->add_to_cart($product_id, $quantity);
        
        wp_send_json_success(array(
            'message' => __('تمت الإضافة إلى العربة', 'abobakr'),
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'cart_total' => WC()->cart->get_cart_total(),
        ));
    else:
        wp_send_json_error(array('message' => __('ووكومرس غير مفعل', 'abobakr')));
    endif;
}
add_action('wp_ajax_abobakr_add_to_cart', 'abobakr_ajax_add_to_cart');
add_action('wp_ajax_nopriv_abobakr_add_to_cart', 'abobakr_ajax_add_to_cart');
```

---

## 🎨 تصميم المكونات بالتفصيل

### 1. **Hero Section - قسم الهيرو**

#### النمط: Reel (بكرة)
```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│  [عنوان رئيسي كبير]                                     │
│  نحت                                                    │
│  الفكرة                                                 │
│                                                         │
│  وصف قصير                                               │
│                                                         │
│  [زر رئيسي] [زر ثانوي]                                  │
│                                                         │
├─────────────────────┬───────────────────────────────────┤
│                     │                                   │
│                     │  ┌─────────────────────┐         │
│                     │  │                     │         │
│                     │  │                     │         │
│                     │  │    صورة/فيديو      │         │
│                     │  │    متغيرة          │         │
│                     │  │                     │         │
│                     │  │  ─────────────────  │         │
│                     │  │  ▓▓▓░░░░░░░░░░░░░░  │         │
│                     │  └─────────────────────┘         │
│                     │                                   │
│                     │  [إحصائيات]                       │
│                     │                                   │
└─────────────────────┴───────────────────────────────────┘
```

#### العناصر:
- **العنوان**: خط Cormorant Garamond بحجم 9.5rem
- **النص المميز**: بلون التمييز (#C8A96E)
- **الخلفية**: شبكة Grid مع Orb ضبابي
- **البكرة**: 5 إطارات تتغير كل 5 ثوانٍ
- **Scrubber**: شريط تقدم تفاعلي
- **الإحصائيات**: 4 بطاقات صغيرة

### 2. **Portfolio Grid - شبكة المعرض**

```
┌─────────────────────────────────────────────────────────┐
│  [تصفية: الكل] [جرافيكس] [ليزر] [فيديو] [زهور] [تصوير] │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐     │
│  │             │  │             │  │             │     │
│  │   صورة      │  │   صورة      │  │   صورة      │     │
│  │   المشروع   │  │   المشروع   │  │   المشروع   │     │
│  │             │  │             │  │             │     │
│  ├─────────────┤  ├─────────────┤  ├─────────────┤     │
│  │ العنوان    │  │ العنوان    │  │ العنوان    │     │
│  │ التصنيف    │  │ التصنيف    │  │ التصنيف    │     │
│  └─────────────┘  └─────────────┘  └─────────────┘     │
│                                                         │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐     │
│  │ ...         │  │ ...         │  │ ...         │     │
│  └─────────────┘  └─────────────┘  └─────────────┘     │
│                                                         │
│              [تحميل المزيد]                            │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

### 3. **Cart Drawer - درج العربة**

```
┌──────────────────────────┐
│  عربة التسوق         [X] │
├──────────────────────────┤
│                          │
│  ┌────────────────────┐  │
│  │ صورة │ اسم المنتج  │  │
│  │      │ السعر × العدد│ │
│  └────────────────────┘  │
│                          │
│  ┌────────────────────┐  │
│  │ صورة │ اسم منتج 2  │  │
│  └────────────────────┘  │
│                          │
├──────────────────────────┤
│  المجموع: ٠٠٠ ريال       │
│                          │
│  [إتمام الشراء]          │
│  [متابعة التسوق]         │
└──────────────────────────┘
```

---

## ⚙️ الإعدادات والخيارات الكاملة

### لوحة التحكم الرئيسية

#### 1. **الإعدادات العامة**
- اسم الموقع
- الشعار (Logo)
- الشعار المفضل (Favicon)
- اللغة الافتراضية
- اتجاه النص (RTL/LTR)

#### 2. **الهوية البصرية**
| الخيار | النوع | القيم الممكنة | الافتراضي |
|--------|-------|---------------|-----------|
| لون التمييز | Color Picker | أي لون HEX | #C8A96E |
| زوايا الكروت | Radio | hard, soft, round | round |
| حجم الخط | Range Slider | 14-20px | 18px |
| الكثافة | Radio | compact, regular, comfy | regular |
| نمط الهيرو | Select | reel, static | reel |

#### 3. **الواجهة**
| الخيار | النوع | الوصف |
|--------|-------|-------|
| مؤشر مخصص | Checkbox | إظهار/إخفاء المؤشر المخصص |
| ودجت واتساب | Text Input | رقم الهاتف للصيغة الدولية |
| صوت تفاعلي | Checkbox | تشغيل/إيقاف أصوات الواجهة |
| شريط البحث | Checkbox | إظهار/إخفاء زر البحث |

#### 4. **الألوان**
```json
{
  "palette": [
    "#C8A96E",  // التمييز
    "#080808",  // الخلفية
    "#EDEAE4"   // النص
  ]
}
```

#### 5. **الخطوط**
- **العربي**: Tajawal (أوزان: 300, 400, 500, 700, 800)
- **الإنجليزي**: DM Sans (أوزان: 300, 400, 500, 600, 700)
- **العروض**: Cormorant Garamond (italic, أوزان: 300, 400, 500, 600)
- **Monospace**: JetBrains Mono (أوزان: 400, 500)

---

## 🔌 الإضافات المطلوبة

### إضافات أساسية:
1. **WooCommerce** - للمتجر الإلكتروني
2. **Advanced Custom Fields** - للحقول المخصصة
3. **Contact Form 7** - لنموذج الاتصال

### إضافات اختيارية:
1. **Yoast SEO** - لتحسين محركات البحث
2. **WP Rocket** - للتخزين المؤقت
3. **Smush** - لضغط الصور
4. **Wordfence** - للأمان

---

## 📱 الاستجابة (Responsive)

### نقاط التوقف (Breakpoints):
```css
/* Mobile First */
@media (max-width: 599px) { /* جوال صغير */ }
@media (min-width: 600px) and (max-width: 899px) { /* جوال كبير / تابلت صغير */ }
@media (min-width: 900px) and (max-width: 1199px) { /* تابلت / لابتوب صغير */ }
@media (min-width: 1200px) { /* لابتوب / ديسكتوب */ }
```

### التعديلات لكل جهاز:

#### الجوال (< 900px):
- إخفاء المؤشر المخصص
- قائمة همبرغر بدلاً من القائمة الأفقية
- عمود واحد في الشبكة
- أحجام خطوط أصغر
- هيرو مبسط

#### التابلت (900px - 1199px):
- عمودين في الشبكة
- قائمة كاملة
- مؤشر ماوس مخصص

#### الديسكتوب (> 1200px):
- 3 أعمدة في الشبكة
- جميع التأثيرات
- لوحة التخصيص الكاملة

---

## 🚀 الأداء والتحسين

### تحسينات السرعة:
1. **تأجيل تحميل React** - تحميل المكونات عند الحاجة فقط
2. **Lazy Loading** - للصور والفيديوهات
3. **Minification** - ضغط CSS و JS
4. **CDN** - لتحميل الأصول الثابتة
5. **Cache** - تخزين مؤقت للصفحات

### تحسينات SEO:
1. Schema.org للمشاريع والمنتجات
2. Open Graph Tags
3. Twitter Cards
4. Sitemap تلقائي
5. Robots.txt مخصص

---

## 📦 التثبيت والاستخدام

### خطوات تثبيت القالب:

1. **رفع القالب**
   ```bash
   # طريقة 1: من لوحة التحكم
   # مظهر > إضافة جديد > رفع القالب
   
   # طريقة 2: عبر FTP
   # انقل مجلد abobakr-theme إلى /wp-content/themes/
   ```

2. **تفعيل القالب**
   - انتقل إلى مظهر > قوالب
   - انقر على "تفعيل" بجانب AboBakr Creative

3. **تثبيت الإضافات المطلوبة**
   - WooCommerce
   - Advanced Custom Fields
   - Contact Form 7

4. **استيراد المحتوى التجريبي** (اختياري)
   ```
   أدوات > استيراد > WordPress
   ```

5. **تخصيص القالب**
   - انتقل إلى مظهر > تخصيص
   - اضبط الألوان والخطوط والإعدادات

6. **إنشاء الصفحات**
   - الصفحة الرئيسية
   - معرض الأعمال
   - المتجر
   - من نحن
   - اتصل بنا

---

## 🎯 خلاصة الميزات الكاملة

### ✅ ما سيتم نقله بالكامل:

| الفئة | الميزات |
|-------|---------|
| **التصميم** | الألوان، الخطوط، التباعد، الظلال، الانتقالات |
| **التخطيط** | Header، Footer، Hero، Grid، Cards |
| **التفاعلية** | Cursor، Lightbox، Quick View، Search، Cart |
| **التخصيص** | Colors، Corners، Density، Font Size |
| **اللغات** | RTL/LTR، ترجمة كاملة |
| **السمات** | Dark/Light Mode |
| **الصفحات** | Home، Portfolio، Shop，About، Contact |
| **المؤثرات** | Reveal Animations، Page Transitions، Hover Effects |

### 📊 مقارنة قبل وبعد:

| الميزة | الموقع الأصلي | قالب ووردبريس |
|--------|--------------|---------------|
| التصميم | ✅ | ✅ نفس التصميم 100% |
| الألوان | ثابتة | قابلة للتخصيص |
| المحتوى | ثابت | ديناميكي (CMS) |
| إدارة سهلة | ❌ | ✅ لوحة تحكم كاملة |
| متعدد اللغات | ✅ | ✅ مع إمكانية الإضافة |
| المتجر | محاكاة | ✅ WooCommerce كامل |
| SEO | محدود | ✅ متكامل |
| الأمان | أساسي | ✅ حماية ووردبريس |

---

## 📞 الدعم والصيانة

### للحصول على المساعدة:
1. راجع هذا الدليل أولاً
2. تحقق من وثائق ووردبريس الرسمية
3. تواصل مع مطور القالب

### التحديثات المستقبلية:
- إصلاح الأخطاء
- تحسينات الأداء
- ميزات جديدة
- توافق مع أحدث إصدارات ووردبريس

---

**تم إعداد هذا الدليل بواسطة فريق التطوير - جميع الحقوق محفوظة © 2024**
