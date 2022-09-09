<?php 

class IBETCHA_Public {

    private $theme_name;
    private $version;

    public function __construct( $theme_name, $version ) {
        $this->theme_name = $theme_name;
        $this->version = $version;
    }

    /**
     * Enqueue theme public styles
     */
    public function ibetcha_enqueue_styles() {
        /* STYLES */

        wp_enqueue_style( 'dashicons' );

        wp_enqueue_style( 
            'normalize', 
            IBETCHA_DIR_URI .'public/css/normalize.css', 
            array(), 
            '8.0.1',
            'all'
        );

        // Fontawesome
        wp_enqueue_style( 
            'fontawesome', 
            IBETCHA_DIR_URI .'helpers/fontawesome-5.15.4/css/fontawesome.min.css', 
            array(), 
            '5.15.4',
            'all'
        );
        wp_enqueue_style( 
            'fontawesome-brands', 
            IBETCHA_DIR_URI .'helpers/fontawesome-5.15.4/css/brands.min.css', 
            array(), 
            '5.15.4',
            'all'
        );

        wp_enqueue_style( 
            'googlefonts', 
            'https://fonts.googleapis.com/css2?family=Amiko&family=Lora:ital@1&family=Montserrat:wght@700&display=swap', 
            array(), 
            '1.0.0',
            'all'
        );

        wp_enqueue_style( 
            'slicknav', 
            IBETCHA_DIR_URI .'public/css/slicknav.min.css', 
            array( 'normalize' ), 
            '1.0.10',
            'all'
        );

        // wp_enqueue_style( 
        //     'datepicker-ui-css', 
        //     IBETCHA_DIR_URI .'public/css/jquery-ui.css', 
        //     array(), 
        //     '1.13.2',
        //     'all'
        // );

        // wp_enqueue_style( 
        //     'datepicker-theme', 
        //     IBETCHA_DIR_URI .'public/css/jquery-ui.theme.css', 
        //     array(), 
        //     '1.13.2',
        //     'all'
        // );

        // wp_enqueue_style( 
        //     'datepicker-structure', 
        //     IBETCHA_DIR_URI .'public/css/jquery-ui.structure.css', 
        //     array(), 
        //     '1.13.2',
        //     'all'
        // );

        wp_enqueue_style( 
            $this->theme_name . '-css', 
            IBETCHA_DIR_URI .'public/css/ibetcha-public.css', 
            array( 'normalize' ),
            $this->version, 
            'all' 
        );

        wp_enqueue_style( 
            $this->theme_name . 'styles', 
            get_stylesheet_uri(), 
            array( 'normalize'), 
            $this->version,
            'all'
        );
    }

    /**
     * Enqueue theme public scripts
     * @since       1.0.0
     */
    public function ibetcha_enqueue_scripts() {        

        /* SCRIPTS */

        wp_enqueue_script( 
            'slicknav', 
            IBETCHA_DIR_URI . 'public/js/jquery.slicknav.min.js', 
            array( 'jquery' ), 
            '1.0.10', 
            true 
        );

        // wp_enqueue_script( 
        //     'datepicker-ui-js', 
        //     IBETCHA_DIR_URI . 'public/js/jquery-ui.js', 
        //     array( 'jquery' ), 
        //     '1.13.2' 
        // );

        // wp_enqueue_script( 
        //     'datepicker-custom-js', 
        //     IBETCHA_DIR_URI . 'public/js/custom-datepicker.js', 
        //     array( 'jquery' ), 
        //     '1.13.2' 
        // );

        wp_enqueue_script( 
            $this->theme_name . '-js', 
            IBETCHA_DIR_URI . 'public/js/ibetcha-public.js', 
            array( 'jquery' ), 
            $this->version, 
            true 
        );

        wp_enqueue_script( 
            'scripts', 
            IBETCHA_DIR_URI . 'public/js/scripts.js', 
            array( 'jquery' ), 
            $this->version, 
            true 
        );

        // Fontawesome scripts
        wp_enqueue_script( 
            'fontawesome', 
            IBETCHA_DIR_URI . 'helpers/fontawesome-5.15.4/js/fontawesome.min.js', 
            array( 'jquery' ), 
            '5.15.4', 
            true 
        );
        wp_enqueue_script( 
            'fontawesome-brands', 
            IBETCHA_DIR_URI . 'helpers/fontawesome-5.15.4/js/brands.min.js', 
            array( 'jquery' ), 
            '5.15.4', 
            true 
        );
    }

    /**
     * Register frontend theme menus
     */
    public function ibetcha_register_nav_menus() {

        register_nav_menus( array(
            'main-menu' => __( 'Main menu', 'ibetcha' ),
            'auth-menu' => __( 'Authentication menu', 'ibetcha' ),
            'sidebar-menu' => __( 'Sidebar menu', 'ibetcha' ),
            'footer-support-menu' => __( 'Footer support menu', 'ibetcha' ),
            'footer-company-menu' => __( 'Footer company menu', 'ibetcha' ),
            'footer-sports-menu' => __( 'Footer sports menu', 'ibetcha' ),
            'footer-social-network' => __( 'Footer Social Network menu', 'ibetcha' )
        ) );

        $logo = [
            'width' => 230,
            'height' => 80,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array( 'IBETCHA', 'P2P SPORTS ENTERTAINMENT' )
        ];

        add_theme_support( 'custom-logo', $logo );

    }


}