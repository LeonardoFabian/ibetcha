    </div><!--.content-->

    <?php wp_footer(); ?>
    
    <footer class="site-footer">
        <div class="site-footer-info">
            <div class="container">
                <div class="site-footer-info-grid">
                    <div id="ibetcha-site-info">
                        <div class="footer-logo">
                            <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $custom_logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                            ?>
                            <a href="<?php echo esc_url(  home_url('/') ); ?>">
                                <?php if ( $custom_logo ) : ?>
                                    <?php the_custom_logo(); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/logo-dark.svg" alt="<?php __( 'IBETCHA', 'ibetcha' ) ?>" />
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="ibetcha-about">
                            <p>
                                I-BETCHA y sus asociados (en lo adelante “I-BETCHA”) somos una empresa, dedicada al entreteniiento deportivo en general. estamos comprometidos con la protección de su privacidad en línea, así como de dar cumplimiento a las leyes de protección de datos personales. 
                            </p>
                        </div>
                    </div><!--.ibetcha-site-info-->
                    <?php if ( has_nav_menu( 'footer-support-menu' ) ) : ?>
                        <div class="ibetcha-support-nav">
                            <h3><?php echo esc_html( 'Support', 'ibetcha' ); ?></h3>
                            <?php 
                            $args = array(
                                'theme_location' => 'footer-support-menu',
                                'container' => 'nav',
                                'container_class' => 'ibetcha-support-menu',
                                'container_id' => 'ibetcha-support-menu'
                            );
                            wp_nav_menu( $args );
                            ?>
                        </div><!--.ibetcha-support-nav-->
                    <?php endif; ?>
                    <?php if ( has_nav_menu( 'footer-company-menu' ) ) : ?>
                        <div class="ibetcha-company-nav">
                            <h3><?php echo esc_html( 'Company', 'ibetcha' ); ?></h3>
                            <?php 
                            $args = array(
                                'theme_location' => 'footer-company-menu',
                                'container' => 'nav',
                                'container_class' => 'ibetcha-company-menu',
                                'container_id' => 'ibetcha-company-menu'
                            );
                            wp_nav_menu( $args );
                            ?>
                        </div><!--.ibetcha-company-nav-->
                    <?php endif; ?>
                    <?php if ( has_nav_menu( 'footer-sports-menu' ) ) : ?>
                        <div class="ibetcha-company-nav">
                            <h3><?php echo esc_html( 'Sports', 'ibetcha' ); ?></h3>
                            <?php 
                            $args = array(
                                'theme_location' => 'footer-sports-menu',
                                'container' => 'nav',
                                'container_class' => 'ibetcha-sports-menu',
                                'container_id' => 'ibetcha-sports-menu'
                            );
                            wp_nav_menu( $args );
                            ?>
                        </div><!--.ibetcha-company-nav-->
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="site-footer-banners"></div>
        <!--footer CTA section -->
        <div class="site-footer-cta section">
            <div class="container">
                <?php if ( has_nav_menu( 'footer-social-network' ) ) : ?>
                    <div class="social-network-nav-wrapper">
                        <h3><?php echo esc_html( 'Follow Us', 'ibetcha' ); ?></h3>
                        <?php 
                        $args = array(
                            'theme_location' => 'footer-social-network',
                            'menu_class' => 'social-network-menu'
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="site-footer-bottom">
            <div class="container">
                <p class="copyright">
                    &copy; <?php echo date_i18n( 'Y' ); ?>. <?php _e( 'All rights reserved'); ?>
                </p>
            </div>
        </div>
    </footer>
    
</body>
</html>