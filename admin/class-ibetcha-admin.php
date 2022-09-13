<?php 

class IBETCHA_Admin {

    private $theme_name;
    private $version;
    private $build_menupage;

    public function __construct( $theme_name, $version ) {
        $this->theme_name = $theme_name;
        $this->version = $version;
        $this->build_menupage = new Ibetcha_Build_Menupage();
    }

    /**
     * Registra los estilos de la administración
     */
    public function enqueue_styles( $hook ) {

        if ( 
            $hook != 'toplevel_page_ibetcha_options_page' &&
            $hook != 'manage-template_page_ibetcha_template_options_page' &&
            $hook != 'manage-template_page_ibetcha_advanced_options_page'
        ) {
            return;
        }

        wp_enqueue_style(
            $this->theme_name . '-admin',
            IBETCHA_DIR_URI . 'admin/css/ibetcha-admin.css',
            array(),
            $this->version,
            'all'
        );

    }

    /**
     * Registra los scripts de la administración
     */
    public function enqueue_scripts( $hook ) {

        if ( 
            $hook != 'toplevel_page_ibetcha_options_page' &&
            $hook != 'manage-template_page_ibetcha_template_options_page' &&
            $hook != 'manage-template_page_ibetcha_advanced_options_page'
        ) {
            return;
        }

        wp_enqueue_script(
            $this->theme_name . '-admin',
            IBETCHA_DIR_URI . 'admin/js/ibetcha-admin.js',
            ['jquery'],
            $this->version,
            true
        );
        
    }

    public function add_menu() {

        $this->build_menupage->add_menu_page(
            __( 'Template', 'ibetcha' ),
            __( 'Manage template', 'ibetcha' ),
            'manage_options',
            'ibetcha_options_page',
            [$this, 'ibetcha_options_display'],
            'dashicons-admin-generic',
            '15'
        );

        $this->build_menupage->add_submenu_page(
            'ibetcha_options_page',
            __( 'Customize template', 'ibetcha' ),
            __( 'Customize template', 'ibetcha' ),
            'manage_options',
            // 'ibetcha_template_options_page',
            // [$this, 'ibetcha_template_options_display']
            '?page=ibetcha_options_page&tab=customize_template',
            null,
            null
        );

        $this->build_menupage->add_submenu_page(
            'ibetcha_options_page',
            __( 'Coin', 'ibetcha' ),
            __( 'Coin', 'ibetcha' ),
            'manage_options',
            // 'ibetcha_coin_page',
            // [$this, 'ibetcha_coin_display']
            '?page=ibetcha_options_page&tab=coin',
            null,
            null
        );

        $this->build_menupage->add_submenu_page(
            'ibetcha_options_page',
            __( 'Payments', 'ibetcha' ),
            __( 'Payments', 'ibetcha' ),
            'manage_options',
            // 'ibetcha_payment_options_page',
            // [$this, 'ibetcha_payment_options_display']
            '?page=ibetcha_options_page&tab=payment_options',
            null,
            null
        );

        $this->build_menupage->add_submenu_page(
            'ibetcha_options_page',
            __( 'Advanced options', 'ibetcha' ),
            __( 'Advanced options', 'ibetcha' ),
            'manage_options',
            // 'ibetcha_advanced_options_page',
            // [$this, 'ibetcha_advanced_options_display']
            '?page=ibetcha_options_page&tab=advanced_options',
            null,
            null
        );

        $this->build_menupage->run();
  
    }

    public function ibetcha_options_display() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( isset( $_GET['settings-updated'] ) ) {
            add_settings_error( 'ibetcha_template_options', 'ibetcha_message', 'Settings Saved', 'success' );
        }

        settings_errors( 'ibetcha_template_options' );

        require( IBETCHA_DIR_PATH . 'admin/partials/ibetcha-options-display.php' );

    }

    public function ibetcha_template_options_display() {

        require_once IBETCHA_DIR_PATH . 'admin/partials/ibetcha-template-options-display.php';
        
    }

    public function ibetcha_coin_display() {
        require_once IBETCHA_DIR_PATH . 'admin/partials/ibetcha-coin-display.php';
    }

    public function ibetcha_payment_options_display() {
        require_once IBETCHA_DIR_PATH . 'admin/partials/ibetcha-payment-options-display.php';
    }

    public function ibetcha_advanced_options_display() {

        require_once IBETCHA_DIR_PATH . 'admin/partials/ibetcha-advanced-options-display.php';
        
    }


}