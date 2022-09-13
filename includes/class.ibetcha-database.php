<?php 

if ( ! class_exists( 'IBETCHA_Database' ) ) {

    class IBETCHA_Database {

        protected $users;

        public function __construct() {

            global $wpdb;

            $this->users = "SELECT * FROM {$wpdb->prefix}users";
            
        }

        public function get_users() {

            global $wpdb;

            $sql = $this->users;
            $result = $wpdb->get_var( $sql, 2, 1 );
            var_dump( $result );

        }

    }

}