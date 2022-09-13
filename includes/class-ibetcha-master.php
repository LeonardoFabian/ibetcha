<?php 

class IBETCHA_Master {

    protected $loader;
    protected $theme_name;
    protected $version;

    public function __construct() {
        $this->theme_name = 'Ibetcha';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->load_instances();
        $this->set_languages();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load all theme dependencies
     */
    public function load_dependencies() {
        
        // class responsible for iterating the actions and filters of the theme core
        require_once IBETCHA_DIR_PATH . 'includes/class-ibetcha-loader.php';

        // class responsible for defining the internationalization functionality of the theme
        require_once IBETCHA_DIR_PATH . 'includes/class-ibetcha-i18n.php';

        // class responsible for registering the menus and submenus in the admin area
        require_once IBETCHA_DIR_PATH . 'includes/class-ibetcha-build-menupage.php';

        // class responsible for defining all actions in the admin area
        require_once IBETCHA_DIR_PATH . 'admin/class-ibetcha-admin.php';

        // class responsible for defining all plugin settings
        require_once IBETCHA_DIR_PATH . 'admin/class.ibetcha-settings.php';

        // class responsible for defining all actions in the client/public area
        require_once IBETCHA_DIR_PATH . 'public/class-ibetcha-public.php';

        // class responsible for request data from the database
        require_once IBETCHA_DIR_PATH . 'includes/class.ibetcha-database.php';
        
    }

    /**
     * Set theme language
     */
    private function set_languages() {
        $ibetcha_i18n = new IBETCHA_i18n();
        $this->loader->add_action( 'after_setup_theme', $ibetcha_i18n, 'load_theme_textdomain' );
    }

    /**
     * Load public, admin and loader instances
     */
    private function load_instances() {
        $this->loader           = new IBETCHA_Loader;
        $this->ibetcha_admin    = new IBETCHA_Admin( $this->get_theme_name(), $this->get_version() );
        $this->ibetcha_public   = new IBETCHA_Public( $this->get_theme_name(), $this->get_version() );
        $this->ibetcha_settings = new IBETCHA_Settings();
        $this->ibetcha_database = new IBETCHA_Database();
    }

    /**
     * Define admin hooks
     */
    private function define_admin_hooks() {
        // theme scripts
        $this->loader->add_action( 'admin_enqueue_scripts', $this->ibetcha_admin, 'enqueue_styles');
        $this->loader->add_action( 'admin_enqueue_scripts', $this->ibetcha_admin, 'enqueue_scripts');

        // theme menupage
        $this->loader->add_action( 'admin_menu', $this->ibetcha_admin, 'add_menu');

        // theme options 
        $this->loader->add_action( 'admin_init', $this->ibetcha_settings, 'admin_init' );
    }

    /**
     * Define public hooks
     */
    private function define_public_hooks() {
        $this->loader->add_action( 'wp_enqueue_scripts', $this->ibetcha_public, 'ibetcha_enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $this->ibetcha_public, 'ibetcha_enqueue_scripts' );

        // theme support
        $this->loader->add_action( 'init', $this->ibetcha_public, 'ibetcha_theme_support' );
    }

    /**
     * Get theme name
     */
    public function get_theme_name() {
        return $this->theme_name;
    }

    /**
     * Get theme version
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * Get loader
     *
     * @return void
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Execute loader run method
     *
     * @return void
     */
    public function run() {
        $this->loader->run();
    }

}