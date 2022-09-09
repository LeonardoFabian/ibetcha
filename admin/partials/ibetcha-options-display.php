<?php
/**
 * Manage template page
 */
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <form action="options.php" method="post">

        <?php 

            settings_fields( 'ibetcha_options_group' );
            do_settings_sections( 'ibetcha_options_page' );
            do_settings_sections( 'ibetcha_template_options_page' );
            do_settings_sections( 'ibetcha_coin_page' );
            do_settings_sections( 'ibetcha_payment_options_page' );
            do_settings_sections( 'ibetcha_advanced_options_page' );

            submit_button( esc_html__( 'Save Options', 'ibetcha' ) );
        
        ?>

    </form>

</div>

<?php
// $screen = get_current_screen();
// var_dump($screen);
?>