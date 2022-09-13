<?php
/**
 * Manage template page
 */
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <?php 
        $active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'manage_template';
    ?>

    <h2 class="nav-tab-wrapper">

        <a href="?page=ibetcha_options_page&tab=manage_template" class="nav-tab <?php echo $active_tab == 'manage_template' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Manage template', 'ibetcha' ); ?></a>

        <a href="?page=ibetcha_options_page&tab=customize_template" class="nav-tab <?php echo $active_tab == 'customize_template' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Customize template', 'ibetcha' ); ?></a>

        <a href="?page=ibetcha_options_page&tab=coin" class="nav-tab <?php echo $active_tab == 'coin' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Coin', 'ibetcha' ); ?></a>

        <a href="?page=ibetcha_options_page&tab=payment_options" class="nav-tab <?php echo $active_tab == 'payment_options' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Payment Options', 'ibetcha' ); ?></a>

        <a href="?page=ibetcha_options_page&tab=advanced_options" class="nav-tab <?php echo $active_tab == 'advanced_options' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Advanced Options', 'ibetcha' ); ?></a>
    </h2>

    <form action="options.php" method="post">

        <?php 

            if ( $active_tab == 'manage_template') {
                settings_fields( 'ibetcha_template_info_group' );
                do_settings_sections( 'ibetcha_options_page' );
            }

            if ( $active_tab == 'customize_template') {
                settings_fields( 'ibetcha_options_group' );
                do_settings_sections( 'ibetcha_template_options_page' );
            }
          
            if ( $active_tab == 'coin') {
                settings_fields( 'ibetcha_coin_group' );
                do_settings_sections( 'ibetcha_coin_page' );
            }

            if ( $active_tab == 'payment_options') {
                settings_fields( 'ibetcha_payment_group' );
                do_settings_sections( 'ibetcha_payment_options_page' );
            }

            if ( $active_tab == 'advanced_options') {
                settings_fields( 'ibetcha_advanced_options_group' );
                do_settings_sections( 'ibetcha_advanced_options_page' );
            }                

            submit_button( esc_html__( 'Save Options', 'ibetcha' ) );
        
        ?>

    </form>

</div>

<?php
// $screen = get_current_screen();
// var_dump($screen);
?>