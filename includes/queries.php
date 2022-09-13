<?php 

/**
 * Return the current user info
 */
function ibetcha_current_user_info()
{
    $current_user = wp_get_current_user();
    $avatar = IBETCHA_DIR_URI . 'avatar.png';

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

            <ul class="nav">
                <li class="nav-item dropdown">
                    <button class="btn mt-0 dropdown-toggle avatar" type="button" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">              
                        <img src="<?php echo $avatar ?>" class="img-responsive" />                     
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li><a class="dropdown-item" href="#">Wallet</a></li>
                        <li><a class="dropdown-item" href="<?php wp_logout(); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <?php
}