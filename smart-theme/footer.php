<?php
/**
 * Footer Template
 * 
 * @package Smart_Pro
 */
?>

    <footer id="colophon" class="site-footer">
        <!-- منطقة الفوتر العلوية -->
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
            <div class="footer-widgets">
                <div class="container">
                    <div class="footer-grid">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-4')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-4'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- شريط الفوتر السفلي -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <!-- حقوق النشر -->
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. <?php _e('جميع الحقوق محفوظة', 'smart-pro'); ?></p>
                    </div>

                    <!-- قائمة الفوتر -->
                    <?php if (has_nav_menu('footer')) : ?>
                        <nav class="footer-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'depth'          => 1,
                            ));
                            ?>
                        </nav>
                    <?php endif; ?>

                    <!-- روابط التواصل الاجتماعي -->
                    <?php if (has_nav_menu('social')) : ?>
                        <div class="social-links">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'social',
                                'menu_class'     => 'social-menu',
                                'container'      => false,
                                'link_before'    => '<i class="fab ',
                                'link_after'     => '"></i>',
                                'depth'          => 1,
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- زر الصعود للأعلى -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php _e('العودة للأعلى', 'smart-pro'); ?>">
        <i class="fas fa-arrow-up"></i>
    </button>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
