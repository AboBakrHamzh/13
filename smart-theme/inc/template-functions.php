<?php
/**
 * Template Functions
 * Helper functions for theme templates
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display post thumbnail with lazy load
 */
function smart_pro_post_thumbnail($size = 'smart-pro-card', $attrs = array()) {
    if (has_post_thumbnail()) {
        $default_attrs = array(
            'loading' => 'lazy',
            'class' => 'post-thumbnail'
        );
        $attrs = wp_parse_args($attrs, $default_attrs);
        the_post_thumbnail($size, $attrs);
    }
}

/**
 * Get post categories as links
 */
function smart_pro_get_categories($post_id = null, $separator = ', ') {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $categories = get_the_category($post_id);
    if (!empty($categories)) {
        $links = array();
        foreach ($categories as $category) {
            $links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
        }
        return implode($separator, $links);
    }
    return '';
}

/**
 * Get reading time estimate
 */
function smart_pro_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    if ($reading_time < 1) {
        $reading_time = 1;
    }
    
    return sprintf(
        _n('%d min read', '%d mins read', $reading_time, 'smart-pro'),
        $reading_time
    );
}

/**
 * Display social share buttons
 */
function smart_pro_social_share() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    
    ?>
    <div class="social-share">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on Facebook', 'smart-pro'); ?>">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on Twitter', 'smart-pro'); ?>">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on LinkedIn', 'smart-pro'); ?>">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&description=<?php echo $title; ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on Pinterest', 'smart-pro'); ?>">
            <i class="fab fa-pinterest-p"></i>
        </a>
        <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $url; ?>" aria-label="<?php esc_attr_e('Share via Email', 'smart-pro'); ?>">
            <i class="fas fa-envelope"></i>
        </a>
    </div>
    <?php
}

/**
 * Display breadcrumb navigation
 */
function smart_pro_breadcrumb() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumb" aria-label="' . esc_attr__('Breadcrumb', 'smart-pro') . '">';
    echo '<ol class="breadcrumb-list">';
    echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'smart-pro') . '</a></li>';
    
    if (is_category() || is_single()) {
        echo '<li class="breadcrumb-item">' . __('Blog', 'smart-pro') . '</li>';
        if (is_single()) {
            the_category('<li class="breadcrumb-item">');
            echo '</li><li class="breadcrumb-item active">' . get_the_title() . '</li>';
        } elseif (is_category()) {
            echo '<li class="breadcrumb-item active">' . single_cat_title('', false) . '</li>';
        }
    } elseif (is_page()) {
        echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb-item active">' . __('Search Results', 'smart-pro') . '</li>';
    } elseif (is_404()) {
        echo '<li class="breadcrumb-item active">' . __('404', 'smart-pro') . '</li>';
    } elseif (is_archive()) {
        echo '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}

/**
 * Display author box
 */
function smart_pro_author_box() {
    $author_id = get_the_author_meta('ID');
    $author_bio = get_the_author_meta('user_description');
    
    if ($author_bio) {
        ?>
        <div class="author-box">
            <div class="author-avatar">
                <?php echo get_avatar($author_id, 80, '', '', array('class' => 'avatar')); ?>
            </div>
            <div class="author-info">
                <h4 class="author-name"><?php the_author(); ?></h4>
                <p class="author-bio"><?php echo esc_html($author_bio); ?></p>
                <div class="author-social">
                    <?php
                    $website = get_the_author_meta('user_url');
                    if ($website) {
                        echo '<a href="' . esc_url($website) . '" target="_blank" rel="noopener"><i class="fas fa-globe"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Display related posts
 */
function smart_pro_related_posts($count = 3) {
    $post_id = get_the_ID();
    $categories = wp_get_post_categories($post_id);
    
    if (empty($categories)) {
        return;
    }
    
    $args = array(
        'post_type' => 'post',
        'post__not_in' => array($post_id),
        'category__in' => $categories,
        'posts_per_page' => $count,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $related_query = new WP_Query($args);
    
    if ($related_query->have_posts()) {
        ?>
        <section class="related-posts">
            <h3 class="related-posts-title"><?php _e('Related Posts', 'smart-pro'); ?></h3>
            <div class="related-posts-grid">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <article class="related-post-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="related-post-thumbnail">
                                <?php smart_pro_post_thumbnail('smart-pro-thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="related-post-content">
                            <h4 class="related-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="related-post-meta">
                                <span class="related-post-date"><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
        <?php
        wp_reset_postdata();
    }
}

/**
 * Display portfolio item meta
 */
function smart_pro_portfolio_meta() {
    $portfolio_categories = get_the_terms(get_the_ID(), 'portfolio_category');
    $portfolio_tags = get_the_terms(get_the_ID(), 'portfolio_tag');
    
    if ($portfolio_categories || $portfolio_tags) {
        ?>
        <div class="portfolio-meta">
            <?php if ($portfolio_categories) : ?>
                <div class="portfolio-categories">
                    <strong><?php _e('Categories:', 'smart-pro'); ?></strong>
                    <?php
                    $cat_links = array();
                    foreach ($portfolio_categories as $category) {
                        $cat_links[] = '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                    }
                    echo implode(', ', $cat_links);
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if ($portfolio_tags) : ?>
                <div class="portfolio-tags">
                    <strong><?php _e('Tags:', 'smart-pro'); ?></strong>
                    <?php
                    $tag_links = array();
                    foreach ($portfolio_tags as $tag) {
                        $tag_links[] = '<a href="' . esc_url(get_term_link($tag)) . '">' . esc_html($tag->name) . '</a>';
                    }
                    echo implode(', ', $tag_links);
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

/**
 * Display testimonial data
 */
function smart_pro_testimonial_display($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $client_name = get_post_meta($post_id, '_testimonial_client_name', true);
    $client_position = get_post_meta($post_id, '_testimonial_client_position', true);
    $company_name = get_post_meta($post_id, '_testimonial_company_name', true);
    $rating = get_post_meta($post_id, '_testimonial_rating', true);
    
    ?>
    <div class="testimonial-content">
        <?php if ($rating) : ?>
            <div class="testimonial-rating">
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <i class="fas fa-star <?php echo ($i < $rating) ? 'active' : ''; ?>"></i>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
        
        <div class="testimonial-text">
            <?php the_content(); ?>
        </div>
        
        <div class="testimonial-author">
            <?php if (has_post_thumbnail()) : ?>
                <div class="testimonial-author-image">
                    <?php the_post_thumbnail('thumbnail', array('class' => 'rounded-circle')); ?>
                </div>
            <?php endif; ?>
            
            <div class="testimonial-author-info">
                <?php if ($client_name) : ?>
                    <h5 class="testimonial-author-name"><?php echo esc_html($client_name); ?></h5>
                <?php endif; ?>
                
                <?php if ($client_position || $company_name) : ?>
                    <p class="testimonial-author-position">
                        <?php echo esc_html($client_position); ?>
                        <?php if ($client_position && $company_name) echo ' - '; ?>
                        <?php echo esc_html($company_name); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Display service details
 */
function smart_pro_service_display($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $service_icon = get_post_meta($post_id, '_service_icon', true);
    $service_price = get_post_meta($post_id, '_service_price', true);
    $service_duration = get_post_meta($post_id, '_service_duration', true);
    $featured = get_post_meta($post_id, '_featured_service', true);
    
    ?>
    <div class="service-card <?php echo $featured ? 'featured' : ''; ?>">
        <?php if ($service_icon) : ?>
            <div class="service-icon">
                <i class="fas <?php echo esc_attr($service_icon); ?>"></i>
            </div>
        <?php endif; ?>
        
        <h3 class="service-title">
            <a href="<?php the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
        </h3>
        
        <div class="service-excerpt">
            <?php echo wp_trim_words(get_the_excerpt($post_id), 15); ?>
        </div>
        
        <?php if ($service_price || $service_duration) : ?>
            <div class="service-meta">
                <?php if ($service_price) : ?>
                    <span class="service-price"><?php echo esc_html($service_price); ?></span>
                <?php endif; ?>
                
                <?php if ($service_duration) : ?>
                    <span class="service-duration"><i class="far fa-clock"></i> <?php echo esc_html($service_duration); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <a href="<?php the_permalink($post_id); ?>" class="btn btn-primary"><?php _e('Learn More', 'smart-pro'); ?></a>
    </div>
    <?php
}

/**
 * Display team member details
 */
function smart_pro_team_display($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $position = get_post_meta($post_id, '_team_position', true);
    $email = get_post_meta($post_id, '_team_email', true);
    $phone = get_post_meta($post_id, '_team_phone', true);
    $linkedin = get_post_meta($post_id, '_team_linkedin', true);
    $twitter = get_post_meta($post_id, '_team_twitter', true);
    $facebook = get_post_meta($post_id, '_team_facebook', true);
    
    ?>
    <div class="team-member-card">
        <div class="team-member-image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('smart-pro-square'); ?>
            <?php else : ?>
                <div class="team-member-placeholder">
                    <i class="fas fa-user"></i>
                </div>
            <?php endif; ?>
            
            <?php if ($linkedin || $twitter || $facebook) : ?>
                <div class="team-member-social">
                    <?php if ($linkedin) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                    
                    <?php if ($twitter) : ?>
                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    
                    <?php if ($facebook) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="team-member-info">
            <h3 class="team-member-name"><?php the_title(); ?></h3>
            
            <?php if ($position) : ?>
                <p class="team-member-position"><?php echo esc_html($position); ?></p>
            <?php endif; ?>
            
            <?php if (has_excerpt()) : ?>
                <p class="team-member-excerpt"><?php the_excerpt(); ?></p>
            <?php endif; ?>
            
            <?php if ($email || $phone) : ?>
                <div class="team-member-contact">
                    <?php if ($email) : ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>"><i class="fas fa-envelope"></i></a>
                    <?php endif; ?>
                    
                    <?php if ($phone) : ?>
                        <a href="tel:<?php echo esc_attr($phone); ?>"><i class="fas fa-phone"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/**
 * Get social media links from customizer
 */
function smart_pro_get_social_links() {
    $social_networks = array(
        'facebook' => array('url' => get_theme_mod('smart_pro_social_facebook'), 'icon' => 'fa-facebook-f'),
        'twitter' => array('url' => get_theme_mod('smart_pro_social_twitter'), 'icon' => 'fa-twitter'),
        'instagram' => array('url' => get_theme_mod('smart_pro_social_instagram'), 'icon' => 'fa-instagram'),
        'linkedin' => array('url' => get_theme_mod('smart_pro_social_linkedin'), 'icon' => 'fa-linkedin-in'),
        'youtube' => array('url' => get_theme_mod('smart_pro_social_youtube'), 'icon' => 'fa-youtube'),
        'pinterest' => array('url' => get_theme_mod('smart_pro_social_pinterest'), 'icon' => 'fa-pinterest-p'),
        'github' => array('url' => get_theme_mod('smart_pro_social_github'), 'icon' => 'fa-github'),
        'dribbble' => array('url' => get_theme_mod('smart_pro_social_dribbble'), 'icon' => 'fa-dribbble')
    );
    
    $links = array();
    foreach ($social_networks as $network => $data) {
        if (!empty($data['url'])) {
            $links[] = array(
                'network' => $network,
                'url' => esc_url($data['url']),
                'icon' => $data['icon']
            );
        }
    }
    
    return $links;
}

/**
 * Display social media icons
 */
function smart_pro_display_social_icons($class = '') {
    $social_links = smart_pro_get_social_links();
    
    if (empty($social_links)) {
        return;
    }
    
    echo '<div class="social-icons ' . esc_attr($class) . '">';
    foreach ($social_links as $link) {
        echo '<a href="' . esc_url($link['url']) . '" target="_blank" rel="noopener" aria-label="' . esc_attr($link['network']) . '">';
        echo '<i class="fab ' . esc_attr($link['icon']) . '"></i>';
        echo '</a>';
    }
    echo '</div>';
}

/**
 * Schema.org structured data for posts
 */
function smart_pro_schema_markup() {
    if (is_singular()) {
        global $post;
        
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            )
        );
        
        if (has_post_thumbnail()) {
            $schema['image'] = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'smart_pro_schema_markup');
