<?php
/**
 * Template part for displaying testimonials
 * 
 * @package Smart_Pro
 */

$rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
$client_name = get_post_meta(get_the_ID(), '_testimonial_client_name', true);
$client_position = get_post_meta(get_the_ID(), '_testimonial_client_position', true);
$client_company = get_post_meta(get_the_ID(), '_testimonial_client_company', true);
$client_image = get_post_meta(get_the_ID(), '_testimonial_client_image', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('testimonial-card'); ?>>
    
    <div class="testimonial-content">
        <div class="testimonial-rating">
            <?php if ($rating) : ?>
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <i class="fas fa-star<?php echo ($i <= $rating) ? ' active' : ''; ?>"></i>
                <?php endfor; ?>
            <?php else : ?>
                <i class="fas fa-quote-right quote-icon"></i>
            <?php endif; ?>
        </div>

        <div class="testimonial-text">
            <?php the_content(); ?>
        </div>
    </div>

    <footer class="testimonial-footer">
        <div class="client-info">
            <?php if ($client_image) : ?>
                <div class="client-image">
                    <img src="<?php echo esc_url($client_image); ?>" alt="<?php echo esc_attr($client_name); ?>" class="rounded-circle">
                </div>
            <?php endif; ?>
            
            <div class="client-details">
                <?php if ($client_name) : ?>
                    <h4 class="client-name"><?php echo esc_html($client_name); ?></h4>
                <?php else : ?>
                    <h4 class="client-name"><?php the_title(); ?></h4>
                <?php endif; ?>
                
                <?php if ($client_position || $client_company) : ?>
                    <p class="client-position">
                        <?php echo esc_html($client_position); ?>
                        <?php if ($client_position && $client_company) echo ' - '; ?>
                        <?php echo esc_html($client_company); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </footer>
</article>
