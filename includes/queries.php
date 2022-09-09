<?php 

/**
 * Return the current user info
 */
function ibetcha_current_user_info()
{
    $current_user = wp_get_current_user();

    if ( ! ( $current_user instanceof WP_User ) ) {
        return;
    } 

    ?>
        <div class="ibetcha_current_user">
            <div class="ibetcha_current_user_name">
                <p>
                    <?php 
                        printf( __( 'Maker: %s', 'ibetcha' ), esc_html( $current_user->user_firstname ) . ' ' . esc_html( $current_user->user_lastname ) );
                    ?>
                </p>
                <p>
                    <?php 
                        printf( __( 'User ID: %s', 'ibetcha' ), esc_html( 'D-' . $current_user->ID ) );
                    ?>
                </p>
            </div>
        </div>
    <?php
}