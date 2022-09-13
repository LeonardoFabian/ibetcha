<?php 

if ( ! class_exists( 'IBETCHA_Settings' ) ) {

    class IBETCHA_Settings {

        public static $template_options;
        public static $coin_options;
        public static $payment_options;
        public static $advanced_options;
    
        public function __construct() {

            self::$template_options = get_option( 'ibetcha_template_options' );
            self::$coin_options = get_option( 'ibetcha_coin_options' );
            self::$payment_options = get_option( 'ibetcha_payment_options' );
            self::$advanced_options = get_option( 'ibetcha_advanced_options' );
            
        }

        public function admin_init() {

            register_setting( 'ibetcha_template_info_group', 'ibetcha_template_info_options' );
            register_setting( 'ibetcha_options_group', 'ibetcha_template_options', array( $this, 'ibetcha_options_validate' ) );
            register_setting( 'ibetcha_coin_group', 'ibetcha_coin_options', array( $this, 'ibetcha_coin_options_validate' ) );
            register_setting( 'ibetcha_payment_group', 'ibetcha_payment_options', array( $this, 'ibetcha_payment_options_validate' ) );
            register_setting( 'ibetcha_advanced_options_group', 'ibetcha_advanced_options', array( $this, 'ibetcha_advanced_options_validate' ) );

            // SECTIONS

            add_settings_section(
                'ibetcha_manage_template_section',
                'Manage template',
                null,
                'ibetcha_options_page'
            );

            add_settings_section(
                'ibetcha_customize_template_section',
                'Customize Template',
                null,
                'ibetcha_template_options_page'
            );

            add_settings_section(
                'ibetcha_coin_section',
                'Coin Settings',
                null,
                'ibetcha_coin_page'
            );

            add_settings_section(
                'ibetcha_payment_options_section',
                'Payment Options',
                null,
                'ibetcha_payment_options_page'
            );

            add_settings_section(
                'ibetcha_advanced_options_section',
                'Advanced Options',
                null,
                'ibetcha_advanced_options_page'
            );

            // FIELDS 

            // Manage template section fields
            add_settings_field(
                'ibetcha_template_info',
                'Welcome',
                array( $this, 'ibetcha_template_info_callback'),
                'ibetcha_options_page', // section
                'ibetcha_manage_template_section' // page
            );

            add_settings_field(
                'ibetcha_shortcodes',
                'Shortcodes',
                array($this, 'ibetcha_shortcodes_callback'),
                'ibetcha_options_page', // section
                'ibetcha_manage_template_section' // page
            );

            // Customize template section fields
            add_settings_field(
                'ibetcha_primary_color',
                'Primary color',
                array($this, 'ibetcha_primary_color_callback'),
                'ibetcha_template_options_page', // section
                'ibetcha_customize_template_section', // page
                array(
                    'label_for' => 'ibetcha_primary_color'
                )
            );

            add_settings_field(
                'ibetcha_secondary_color',
                'Secondary color',
                array($this, 'ibetcha_secondary_color_callback'),
                'ibetcha_template_options_page', // section
                'ibetcha_customize_template_section', // page
                array(
                    'label_for' => 'ibetcha_secondary_color'
                )
            );

            add_settings_field(
                'ibetcha_accent_color',
                'Accent color',
                array($this, 'ibetcha_accent_color_callback'),
                'ibetcha_template_options_page', // section
                'ibetcha_customize_template_section', // page
                array(
                    'label_for' => 'ibetcha_accent_color'
                )
            );

            // Coin section fields
            add_settings_field(
                'ibetcha_coin_name',
                'Coin name',
                array($this, 'ibetcha_coin_name_callback'),
                'ibetcha_coin_page', // section
                'ibetcha_coin_section', // page
                array(
                    'label_for' => 'ibetcha_coin_name'
                )
            );

            add_settings_field(
                'ibetcha_coin_value',
                'Coin value (US$)',
                array($this, 'ibetcha_coin_value_callback'),
                'ibetcha_coin_page', // section
                'ibetcha_coin_section', // page
                array(
                    'label_for' => 'ibetcha_coin_value'
                )
            );

            // Payment options section fields
            add_settings_field(
                'ibetcha_payments_rate',
                'Rate (%)',
                array($this, 'ibetcha_payments_rate_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section', // page
                array(
                    'label_for' => 'ibetcha_payments_rate'
                )
            );

            add_settings_field(
                'ibetcha_payments_apply_rate',
                'Apply rate?',
                array($this, 'ibetcha_payments_apply_rate_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section', // page
                array(
                    'label_for' => 'ibetcha_payment_apply_rate'
                )
            );

            add_settings_field(
                'ibetcha_payment_method_title',
                'Payment method title',
                array($this, 'ibetcha_payment_method_title_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section', // page
                array(
                    'label_for' => 'ibetcha_payment_method_title'
                )
            );

            add_settings_field(
                'ibetcha_payment_method_enabled',
                'Enable payment method?',
                array($this, 'ibetcha_payment_method_enabled_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section', // page
                array(
                    'label_for' => 'ibetcha_payment_method_enabled'
                )
            );


            // Advanced options section fields
            add_settings_field(
                'ibetcha_disclosure',
                'Disclosure',
                array($this, 'ibetcha_disclosure_callback'),
                'ibetcha_advanced_options_page', // section
                'ibetcha_advanced_options_section', // page
                array(
                    'label_for' => 'ibetcha_disclosure'
                )
            );

            // var_dump(self::$options);

        }

        /**
         * Manage template callback functions
         *
         * @return void
         */
        public function ibetcha_template_info_callback() {
            ?>
                <span><?php echo esc_html( 'Welcome to the configuration page of the IBETCHA template. Here you can set all the general options of the template.', 'ibetcha' ); ?></span>
            <?php
        }

        public function ibetcha_shortcodes_callback() {
            ?>
                <span><?php echo esc_html( 'Use the shortcode [betp2p_bet_form] to display the bet maker form, use the [betp2p_odds] shortcode to display an odds list and use the [betp2p_take_bet_form] shortcode to display the bet taker form.', 'ibetcha' ); ?></span>
            <?php
        }

        /**
         * Customize Template callback functions 
         */
        public function ibetcha_primary_color_callback($args) {
            ?>
                <input type="color" id="ibetcha_primary_color" name="ibetcha_template_options[ibetcha_primary_color]" value="<?php echo isset( self::$template_options['ibetcha_primary_color'] ) ? esc_attr( self::$template_options['ibetcha_primary_color'] ) : '#335580'; ?>">
            <?php
        }

        public function ibetcha_secondary_color_callback($args) {
            ?>
                <input type="color" id="ibetcha_secondary_color" name="ibetcha_template_options[ibetcha_secondary_color]" 
                value="<?php echo isset( self::$template_options['ibetcha_secondary_color'] ) ? esc_attr( self::$template_options['ibetcha_secondary_color'] ) : '#c8001c'; ?>">
            <?php
        }

        public function ibetcha_accent_color_callback($args) {
            ?>
                <input type="color" id="ibetcha_accent_color" name="ibetcha_template_options[ibetcha_accent_color]" 
                value="<?php echo isset( self::$template_options['ibetcha_accent_color'] ) ? esc_attr( self::$template_options['ibetcha_accent_color'] ) : '#00d4f3'; ?>">
            <?php
        }

        /**
         * Coin callback functions 
         */
        public function ibetcha_coin_name_callback($args) {
            ?>
                <input type="text" id="ibetcha_coin_name" name="ibetcha_coin_options[ibetcha_coin_name]"
                value="<?php echo isset( self::$coin_options['ibetcha_coin_name'] ) ? esc_attr( self::$coin_options['ibetcha_coin_name'] ) : ''; ?>">
            <?php
        }

        public function ibetcha_coin_value_callback($args) {
            ?>
                <input type="text" id="ibetcha_coin_value" name="ibetcha_coin_options[ibetcha_coin_value]"
                value="<?php echo isset( self::$coin_options['ibetcha_coin_value'] ) ? esc_attr( self::$coin_options['ibetcha_coin_value'] ) : ''; ?>">
            <?php
        }

        /**
         * Payment Options callback functions
         */
        public function ibetcha_payments_rate_callback($args) {
            ?> 
                <input type="text" id="ibetcha_payment_rate" name="ibetcha_payment_options[ibetcha_payment_rate]"
                value="<?php echo isset( self::$payment_options['ibetcha_payment_rate'] ) ? esc_attr( self::$payment_options['ibetcha_payment_rate'] ) : ''; ?>">
            <?php
        }

        public function ibetcha_payments_apply_rate_callback($args) {
            ?>
                <input type="checkbox" name="ibetcha_payment_options[ibetcha_payment_apply_rate]" id="ibetcha_payment_apply_rate" value="1"
                <?php 
                if ( isset( self::$payment_options['ibetcha_payment_apply_rate'] ) ) {
                    checked( "1", self::$payment_options['ibetcha_payment_apply_rate'], true ); 
                }                
                ?> />
                <label for="ibetcha_payment_apply_rate">
                    <?php echo esc_html__( 'Whether to apply rate or not') ?>
                </label>
            <?php
        }

        public function ibetcha_payment_method_title_callback($args) {
            ?>
                <input type="text" id="ibetcha_payment_method_title" name="ibetcha_payment_options[payment_method_title]"
                value="<?php echo isset( self::$payment_options['payment_method_title'] ) ? esc_attr( self::$payment_options['payment_method_title'] ) : ''; ?>">
            <?php
        }

        public function ibetcha_payment_method_enabled_callback($args) {
            ?>
                <input type="checkbox" name="ibetcha_payment_options[payment_method_enabled]" id="ibetcha_payment_method_enabled" value="1"
                <?php 
                if ( isset( self::$payment_options['payment_method_enabled'] ) ) {
                    checked( "1", self::$payment_options['payment_method_enabled'], true ); 
                }                
                ?> />
                <label for="ibetcha_payment_method_enabled">
                    <?php echo esc_html__( 'Whether to enable payment method or not. This fee will be applied to each player who places a bet') ?>
                </label>
            <?php
        }

        /**
         * Advanced Options callback functions 
         *
         * @return void
         */
        public function ibetcha_disclosure_callback( $args ) {

            ?>
                <textarea name="ibetcha_advanced_options[ibetcha_disclosure]" id="ibetcha_disclosure" rows="5" cols="30">
                    <?php echo isset( self::$advanced_options['ibetcha_disclosure'] ) ? esc_html( self::$advanced_options['ibetcha_disclosure'] ) : ''; ?>
                </textarea>
            <?php

        }

        /**
         * Ibetcha options validate function
         */
        public function ibetcha_options_validate( $input ) {

            $new_input = array();

            foreach ( $input as $key => $value ) {
                switch ( $key ) {
                    case 'ibetcha_primary_color':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_secondary_color':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_accent_color':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
          
                }
            }

            return $new_input;

        }

        /**
         * coin options validate
         */
        public function ibetcha_coin_options_validate( $input ) {

            $new_input = array();

            foreach ( $input as $key => $value ) {

                switch ($key) {
                    case 'ibetcha_coin_name':
                        if( empty( $value ) ) {
                            add_settings_error( 'ibetcha_template_options', 'ibetcha_message', 'The coin name field can not be left empty', 'warning' );
                        }
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_coin_value':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                        break;
                }

            }

            return $new_input;

        }

        /**
         * payment optios validate
         */
        public function ibetcha_payment_options_validate( $input ) {

            $new_input = array();

            foreach ( $input as $key => $value ) {

                switch ($key) {
                    case 'ibetcha_payments_rate':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_payments_apply_rate':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_payments_fee':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    case 'ibetcha_payments_apply_fee':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;

                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                }

            }

            return $new_input;

        }

        /**
         * advanced options validate
         */
        public function ibetcha_advanced_options_validate( $input ) {

            $new_input = array();

            foreach ( $input as $key => $value ) {

                switch ($key) {
                    case 'ibetcha_disclosure':
                        $new_input[$key] = sanitize_text_field( $value );
                    break;

                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                }

            }

            return $new_input;

        }

    }

}