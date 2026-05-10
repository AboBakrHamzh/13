<?php
/**
 * Template part for displaying team members
 * 
 * @package Smart_Pro
 */

$position = get_post_meta(get_the_ID(), '_team_position', true);
$email = get_post_meta(get_the_ID(), '_team_email', true);
$phone = get_post_meta(get_the_ID(), '_team_phone', true);
$facebook = get_post_meta(get_the_ID(), '_team_facebook', true);
$twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
$linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
$instagram = get_post_meta(get_the_ID(), '_team_instagram', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('team-card'); ?>>
    
    <div class="team-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('team-photo', array('class' => 'img-fluid')); ?>
        <?php else : ?>
            <img src="<?php echo SMART_PRO_URI; ?>/assets/images/team-placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="img-fluid">
        <?php endif; ?>
        
        <div class="team-social">
            <?php if ($facebook) : ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($twitter) : ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($linkedin) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($instagram) : ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            <?php endif; ?>
            
            <?php if ($email) : ?>
                <a href="mailto:<?php echo esc_attr($email); ?>" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="team-content">
        <header class="entry-header">
            <h3 class="entry-title"><?php the_title(); ?></h3>
            <?php if ($position) : ?>
                <p class="team-position"><?php echo esc_html($position); ?></p>
            <?php endif; ?>
        </header>

        <?php if (get_the_excerpt()) : ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>
    </div>
</article>
