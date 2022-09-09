<?php 

class IBETCHA_i18n {

    public function load_theme_textdomain() {

        $textdomain = 'ibetcha';

        load_theme_textdomain( $textdomain, IBETCHA_DIR_PATH . 'lang' );

        $locale = apply_filters( 'theme_locale', is_admin() ? get_user_locale() : get_locale(), $textdomain );

        load_textdomain( $textdomain, get_theme_file_path( "lang/$textdomain-$locale.mo" ) );
        
    }

}