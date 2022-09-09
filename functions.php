<?php 
/**
 * IBETCHA functions and definitions
 * 
 * @since IBETCHA 1.0.0
 */

$ibetcha_dir_path = ( substr( get_template_directory(), -1 ) === '/' ) ? get_template_directory() : get_template_directory() . '/';
$ibetcha_dir_uri = ( substr( get_template_directory_uri(), -1 ) === '/' ) ? get_template_directory_uri() : get_template_directory_uri() . '/';

define( 'IBETCHA_DIR_PATH', $ibetcha_dir_path );
define( 'IBETCHA_DIR_URI', $ibetcha_dir_uri );

// manage all theme hooks
require_once IBETCHA_DIR_PATH . 'includes/class-ibetcha-master.php';

if ( ! function_exists( 'ibetcha_run_master' ) ) {
    /**
     * Execute master run method
     */
    function ibetcha_run_master() {
        $ibetcha_master = new IBETCHA_Master;
        $ibetcha_master->run();
    }
}

ibetcha_run_master();

require get_template_directory() . '/includes/queries.php';



add_action( 'after_setup_theme', 'ibetcha_after_setup' );
if ( ! function_exists( 'ibetcha_after_setup' ) )
{
    /**
     * Enable after setup theme support
     * @since       1.0.0
     */
    function ibetcha_after_setup()
    {
        // CEO page title
        add_theme_support( 'title-tag' );

        // Featured image
        add_theme_support( 'post-thumbnails' );

        // Image sizes
        add_image_size( 'team-logo', 100, 100 );
        add_image_size( 'hero', 1920, 600, true );
        add_image_size( 'background', 1920, 1080, true );
        add_image_size( 'header', 1048, 250, true );
        add_image_size( 'blog', 1200, 630, true );
        add_image_size( 'landscape', 1200, 900, true );
        add_image_size( 'portrait', 900, 1200, true );

        add_image_size( 'facebook', 492, 276, true );
        add_image_size( 'twitter', 506, 254, true );
    }
}

add_action( 'widgets_init', 'ibetcha_widgets' );
if ( ! function_exists( 'ibetcha_widgets' ) )
{
    /**
     * Theme widgets areas
     */
    function ibetcha_widgets()
    {
        register_sidebar( array(
            'name' => 'Blog Sidebar',
            'id' => 'blog_sidebar',
            'before_widget' => '<div class="ibetcha-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="ibetcha-widget-title">',
            'after_title' => '</h3>'
        ));

        register_sidebar( array(
            'name' => 'Matches Content Sidebar',
            'id' => 'matches_content_sidebar',
            'before_widget' => '<div class="ibetcha-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="ibetcha-widget-title">',
            'after_title' => '</h3>'
        ));
    }
}

/**
 * FILTERS
 */

add_filter( 'body_class', 'ibetcha_modify_body_classes', 10, 2 );
if ( ! function_exists( 'ibetcha_modify_body_classes' ) )
{
    /**
     * Body Classes filter
     */
    function ibetcha_modify_body_classes( $classes, $class )
    {
        if( is_home() ) {
            $class[] = 'ibetcha-home';
            $classes = array_merge( $classes, $class );
        }
        if ( is_single() ) {
            $class[] = 'ibetcha-single';
            $classes = array_merge( $classes, $class );
        }
        if( is_page() ) {
            $class[] = 'ibetcha-page';
            $classes = array_merge( $classes, $class );
        }

        return $classes;
    }
}

add_filter( 'content_save_pre', 'ibetcha_sanitize_content' );
if ( ! function_exists( 'ibetcha_sanitize_content' ) )
{
    /**
     * Format content before save in the database
     */
    function ibetcha_sanitize_content( $content ) {
        return str_replace( "<br>", "</p><p>", $content );
    }
}

add_filter( 'next_posts_link_attributes', 'ibetcha_custom_paginate_links' );
add_filter( 'previous_posts_link_attributes', 'ibetcha_custom_paginate_links' );
if ( ! function_exists( 'ibetcha_custom_paginate_links' ) )
{
    /**
     * Add buttons to post paginate links
     */
    function ibetcha_custom_paginate_links()
    {
        return 'class="btn btn-link"';
    }
}

?>