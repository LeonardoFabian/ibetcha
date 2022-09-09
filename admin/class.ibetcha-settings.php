<?php 

if ( ! class_exists( 'IBETCHA_Settings' ) ) {

    class IBETCHA_Settings {

        public static $options;

        public function __construct() {

            self::$options = get_option( 'ibetcha_template_options' );
            
        }

        public function admin_init() {

            register_setting( 'ibetcha_options_group', 'ibetcha_template_options' );

            // SECTIONS

            add_settings_section(
                'ibetcha_manage_template_section',
                'Manage Template',
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
                'ibetcha_customize_template_section' // page
            );

            add_settings_field(
                'ibetcha_secondary_color',
                'Secondary color',
                array($this, 'ibetcha_secondary_color_callback'),
                'ibetcha_template_options_page', // section
                'ibetcha_customize_template_section' // page
            );

            add_settings_field(
                'ibetcha_accent_color',
                'Accent color',
                array($this, 'ibetcha_accent_color_callback'),
                'ibetcha_template_options_page', // section
                'ibetcha_customize_template_section' // page
            );

            // Coin section fields
            add_settings_field(
                'ibetcha_coin_name',
                'Coin name',
                array($this, 'ibetcha_coin_name_callback'),
                'ibetcha_coin_page', // section
                'ibetcha_coin_section' // page
            );

            add_settings_field(
                'ibetcha_coin_value',
                'Coin value (US$)',
                array($this, 'ibetcha_coin_value_callback'),
                'ibetcha_coin_page', // section
                'ibetcha_coin_section' // page
            );

            // Payment options section fields
            add_settings_field(
                'ibetcha_payments_rate',
                'Rate (%)',
                array($this, 'ibetcha_payments_rate_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section' // page
            );

            add_settings_field(
                'ibetcha_payments_rate_apply',
                'Apply rate?',
                array($this, 'ibetcha_payments_rate_apply_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section' // page
            );

            add_settings_field(
                'ibetcha_payments_fee',
                'Payments fee (%)',
                array($this, 'ibetcha_payments_fee_callback'),
                'ibetcha_payment_options_page', // section
                'ibetcha_payment_options_section' // page
            );


            // Advanced options section fields
            add_settings_field(
                'ibetcha_disclosure',
                'Disclosure',
                array($this, 'ibetcha_disclosure_callback'),
                'ibetcha_advanced_options_page', // section
                'ibetcha_advanced_options_section' // page
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
        public function ibetcha_primary_color_callback() {
            ?>
                <input type="color" id="ibetcha_primary_color" name="ibetcha_template_options[ibetcha_primary_color]" value="<?php echo isset( self::$options['ibetcha_primary_color'] ) ? esc_attr( self::$options['ibetcha_primary_color'] ) : '#335580'; ?>">
            <?php
        }

        public function ibetcha_secondary_color_callback() {
            ?>
                <input type="color" id="ibetcha_secondary_color" name="ibetcha_template_options[ibetcha_secondary_color]" 
                value="<?php echo isset( self::$options['ibetcha_secondary_color'] ) ? esc_attr( self::$options['ibetcha_secondary_color'] ) : '#c8001c'; ?>">
            <?php
        }

        public function ibetcha_accent_color_callback() {
            ?>
                <input type="color" id="ibetcha_accent_color" name="ibetcha_template_options[ibetcha_accent_color]" 
                value="<?php echo isset( self::$options['ibetcha_accent_color'] ) ? esc_attr( self::$options['ibetcha_accent_color'] ) : '#00d4f3'; ?>">
            <?php
        }

        /**
         * Coin callback functions 
         */
        public function ibetcha_coin_name_callback() {
            ?>
                <input type="text" id="ibetcha_coin_name" name="ibetcha_template_options[ibetcha_coin_name]"
                value="<?php echo isset( self::$options['ibetcha_coin_name'] ) ? esc_attr( self::$options['ibetcha_coin_name'] ) : ''; ?>">
            <?php
        }

        public function ibetcha_coin_value_callback() {
            ?>
                <input type="text" id="ibetcha_coin_value" name="ibetcha_template_options[ibetcha_coin_value]"
                value="<?php echo isset( self::$options['ibetcha_coin_value'] ) ? esc_attr( self::$options['ibetcha_coin_value'] ) : ''; ?>">
            <?php
        }

        /**
         * Payment Options callback functions
         */
        public function ibetcha_payments_rate_callback() {
            ?> 
                <input type="text" id="ibetcha_payment_rate" name="ibetcha_template_options[ibetcha_payment_rate]"
                value="<?php echo isset( self::$options['ibetcha_payment_rate'] ) ? esc_attr( self::$options['ibetcha_payment_rate'] ) : ''; ?>">
            <?php
        }

        public function ibetcha_payments_rate_apply_callback() {
            ?>
                <input type="checkbox" name="ibetcha_template_options[ibetcha_payment_apply_rate]" id="ibetcha_payment_apply_rate" value="1"
                <?php 
                if ( isset( self::$options['ibetcha_payment_apply_rate'] ) ) {
                    checked( "1", self::$options['ibetcha_payment_apply_rate'], true ); 
                }                
                ?> />
                <label for="ibetcha_payment_apply_rate">
                    <?php echo esc_html__( 'Whether to apply rate or not') ?>
                </label>
            <?php
        }

        public function ibetcha_payments_fee_callback() {
            ?>
                <input type="text" id="ibetcha_payment_fee" name="ibetcha_template_options[ibetcha_payment_fee]"
                value="<?php echo isset( self::$options['ibetcha_payment_fee'] ) ? esc_attr( self::$options['ibetcha_payment_fee'] ) : ''; ?>">
            <?php
        }

        /**
         * Advanced Options callback functions 
         *
         * @return void
         */
        public function ibetcha_disclosure_callback() {

            ?>
                <textarea name="ibetcha_template_options[ibetcha_disclosure]" id="ibetcha_disclosure" rows="5" cols="30">
                    <?php echo isset( self::$options['ibetcha_disclosure'] ) ? esc_html( self::$options['ibetcha_disclosure'] ) : ''; ?>
                </textarea>
            <?php

        }

    }

}