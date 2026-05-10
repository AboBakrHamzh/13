<?php
/**
 * Front Page Template
 * 
 * @package Smart_Pro
 */

get_header();
?>

<main id="primary" class="site-main front-page">
    
    <!-- قسم Hero -->
    <?php if (get_theme_mod('hero_enabled', true)) : ?>
        <section class="hero-section" style="<?php if (get_theme_mod('hero_bg_image')) : ?>background-image: url('<?php echo esc_url(get_theme_mod('hero_bg_image')); ?>');<?php endif; ?>">
            <div class="container">
                <div class="hero-content animate__animated animate__fadeInUp">
                    <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', __('مرحباً بكم في موقعنا', 'smart-pro'))); ?></h1>
                    <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', __('نقدم أفضل الخدمات لك', 'smart-pro'))); ?></p>
                    <?php if (get_theme_mod('hero_button_text')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#')); ?>" class="btn btn-primary">
                            <?php echo esc_html(get_theme_mod('hero_button_text')); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- قسم الخدمات -->
    <?php if (get_theme_mod('services_section_enabled', true)) : ?>
        <section class="services-section section-padding">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('services_title', __('خدماتنا', 'smart-pro'))); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('services_subtitle', '')); ?></p>
                </div>
                
                <div class="services-grid">
                    <?php
                    $services_args = array(
                        'post_type'      => 'service',
                        'posts_per_page' => get_theme_mod('services_count', 3),
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    );
                    $services_query = new WP_Query($services_args);
                    
                    if ($services_query->have_posts()) :
                        while ($services_query->have_posts()) : $services_query->the_post();
                            get_template_part('template-parts/content', 'service');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- قسم معرض الأعمال -->
    <?php if (get_theme_mod('portfolio_section_enabled', true)) : ?>
        <section class="portfolio-section section-padding bg-light">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('portfolio_title', __('أعمالنا', 'smart-pro'))); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('portfolio_subtitle', '')); ?></p>
                </div>
                
                <div class="portfolio-filters">
                    <button class="filter-btn active" data-filter="all"><?php _e('الكل', 'smart-pro'); ?></button>
                    <?php
                    $portfolio_cats = get_terms(array(
                        'taxonomy'   => 'portfolio_category',
                        'hide_empty' => false,
                        'number'     => 5,
                    ));
                    foreach ($portfolio_cats as $cat) :
                    ?>
                        <button class="filter-btn" data-filter="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
                    <?php endforeach; ?>
                </div>
                
                <div class="portfolio-grid">
                    <?php
                    $portfolio_args = array(
                        'post_type'      => 'portfolio',
                        'posts_per_page' => get_theme_mod('portfolio_count', 6),
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $portfolio_query = new WP_Query($portfolio_args);
                    
                    if ($portfolio_query->have_posts()) :
                        while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                            get_template_part('template-parts/content', 'portfolio');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- قسم آراء العملاء -->
    <?php if (get_theme_mod('testimonials_section_enabled', true)) : ?>
        <section class="testimonials-section section-padding">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('testimonials_title', __('آراء عملائنا', 'smart-pro'))); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('testimonials_subtitle', '')); ?></p>
                </div>
                
                <div class="testimonials-slider">
                    <?php
                    $testimonials_args = array(
                        'post_type'      => 'testimonial',
                        'posts_per_page' => get_theme_mod('testimonials_count', 4),
                        'orderby'        => 'rand',
                    );
                    $testimonials_query = new WP_Query($testimonials_args);
                    
                    if ($testimonials_query->have_posts()) :
                        while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                            get_template_part('template-parts/content', 'testimonial');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- قسم فريق العمل -->
    <?php if (get_theme_mod('team_section_enabled', true)) : ?>
        <section class="team-section section-padding bg-light">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('team_title', __('فريقنا', 'smart-pro'))); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('team_subtitle', '')); ?></p>
                </div>
                
                <div class="team-grid">
                    <?php
                    $team_args = array(
                        'post_type'      => 'team_member',
                        'posts_per_page' => get_theme_mod('team_count', 4),
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    );
                    $team_query = new WP_Query($team_args);
                    
                    if ($team_query->have_posts()) :
                        while ($team_query->have_posts()) : $team_query->the_post();
                            get_template_part('template-parts/content', 'team');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- قسم الدعوة للإجراء CTA -->
    <?php if (get_theme_mod('cta_section_enabled', true)) : ?>
        <section class="cta-section section-padding" style="background-color: <?php echo esc_attr(get_theme_mod('cta_bg_color', '#2c3e50')); ?>;">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title"><?php echo esc_html(get_theme_mod('cta_title', __('هل أنت مستعد للبدء؟', 'smart-pro'))); ?></h2>
                    <p class="cta-text"><?php echo esc_html(get_theme_mod('cta_text', __('تواصل معنا اليوم للحصول على استشارة مجانية', 'smart-pro'))); ?></p>
                    <a href="<?php echo esc_url(get_theme_mod('cta_button_url', '#contact')); ?>" class="btn btn-white">
                        <?php echo esc_html(get_theme_mod('cta_button_text', __('تواصل معنا', 'smart-pro'))); ?>
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- آخر المقالات -->
    <?php if (get_theme_mod('blog_section_enabled', true)) : ?>
        <section class="blog-section section-padding">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('blog_title', __('آخر المقالات', 'smart-pro'))); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('blog_subtitle', '')); ?></p>
                </div>
                
                <div class="posts-grid">
                    <?php
                    $blog_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => get_theme_mod('blog_count', 3),
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $blog_query = new WP_Query($blog_args);
                    
                    if ($blog_query->have_posts()) :
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                            get_template_part('template-parts/content', 'post');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                
                <?php if (get_option('page_for_posts')) : ?>
                    <div class="text-center mt-5">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary">
                            <?php _e('عرض جميع المقالات', 'smart-pro'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php
get_footer();
