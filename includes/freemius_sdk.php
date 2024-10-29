<?php
if ( ! function_exists( 'swc_fs' ) ) {
    // Create a helper function for easy SDK access.
    function swc_fs() {
        global $swc_fs;

        if ( ! isset( $swc_fs ) ) {
            // Include Freemius SDK.
            require_once STM_SWC_PATH . '/freemius/start.php';

            $swc_fs = fs_dynamic_init( array(
                'id'                  => '7916',
                'slug'                => 'ajax-add-to-cart-for-woocommerce',
                'type'                => 'plugin',
                'public_key'          => 'pk_11e99550f72b718e3eb1f6abe55d9',
                'is_premium'          => false,
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => false,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'trial'               => array(
                    'days'               => 7,
                    'is_require_payment' => true,
                ),
                'menu'                => array(
                    'slug'           => 'stm_swc_options',
                    'first-path'     => 'admin.php?page=stm_swc_options',
                    'contact'        => false,
                    'support'        => false,
                ),
                'is_live'        => true,
            ) );
        }

        return $swc_fs;
    }

    // Init Freemius.
    swc_fs();
    // Signal that SDK was initiated.
    do_action( 'swc_fs_loaded' );
}
