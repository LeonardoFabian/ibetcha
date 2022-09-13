<?php if (!defined('ABSPATH')) { exit; }?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
    <title><?php bloginfo( 'name' ); ?><?php if(wp_title("", false)) { echo " | "; } ?><?php wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

    <!--favicon--> 
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>

    <!--IOS--> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="ibetcha">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />

    <!--Android--> 
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#03d4f2">
    <meta name="application-name" content="I-BETCHA">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/android-chrome-512x512.png" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="ibetcha_body">
    <div id="ibetcha-page" class="ibetcha-page">
        <div id="header">
            <header id="masthead" class="site-header" role="banner">
                <div class="container">
                    <div class="ibetcha-header-grid">
                        <div id="ibetcha-logo">
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
                        <!-- <div class="ibetcha-page-title text-center">
                            <h1>DOMINICAN BASEBALL LEAGUE (LIDOM)</h1>
                        </div> -->
                        <div class="ibetcha-header-options">
                            <?php if ( is_user_logged_in() ) : ?>
                                <div class="ibetcha-user-info text-right">
                                    <?php ibetcha_current_user_info(); ?>
                                </div>
                            <?php else : ?>
                                <a href="<?php echo home_url( '/wp-login.php'); ?>" class="btn btn-primary">Login</a>

                                <?php /* if ( has_nav_menu( 'auth-menu' ) ) : ?>
                                    <?php 
                                    
                                    $args = array(
                                        'theme_location' => 'auth-menu',
                                        'container' => 'nav',
                                        'container_class' => 'ibetcha-auth-menu',
                                        'container_id' => 'ibetcha-auth-menu'
                                    );
                                    wp_nav_menu( $args );
                                    ?>
                                <?php endif; */ ?>
                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>            
        </div><!--#header-->

        <div class="site-menu">
            <div class="container">
                <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'site-nav',
                    'container_id' => 'site-nav'
                );
                wp_nav_menu( $args );
                ?>
            </div>
        </div>

        <div id="content">

    