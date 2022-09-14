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

                        <?php 

                        $profile = add_query_arg( 'user', $current_user->ID, home_url( '/profile' ) ); 

                        $account = add_query_arg( 'user', $current_user->ID, home_url( '/account' ) );
                        
                        $wallet = add_query_arg( 'user', $current_user->ID, home_url( '/wallet' ) );
                        
                        ?>
                        <li><a class="dropdown-item" href="<?php echo esc_url( $profile ); ?>"><?php echo esc_html( 'Profile', 'ibetcha' ) ?></a></li>

                        <li><a class="dropdown-item" href="<?php echo esc_url( $account ); ?>"><?php echo esc_html( 'Account', 'ibetcha' ) ?></a></li>

                        <li><a class="dropdown-item" href="<?php echo esc_url( $wallet ); ?>"><?php echo esc_html( 'Wallet', 'ibetcha' ) ?></a></li>

                        <li><a class="dropdown-item" href="<?php echo home_url('/wp-login.php?action=logout') ?>"><?php echo esc_html( 'Logout', 'ibetcha' ); ?></a></li>

                    </ul>
                </li>
            </ul>
        </div>
    <?php
}