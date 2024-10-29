<?php 

/**
 * Check if WooCommerce is active
 **/
if ( !in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
    add_action( 'admin_notices', 'stm_swc_woo_error' );
}

function stm_swc_woo_error() {
    ?>
        <div id="message" class="notice notice-error is-dismissible">
            <p>
                <?php echo esc_html('The StickyWooCart plugin requires WooCommerce plugin installed & activated.', 'ajax-add-to-cart-for-woocommerce'); ?>
            </p>

            <p>
                <a class="button-primary" href="<?php echo esc_url(get_admin_url(null, 'plugin-install.php?s=WooCommerce&tab=search&type=term', null)); ?>"><?php echo esc_html('Install WooCommerce plugin', 'ajax-add-to-cart-for-woocommerce'); ?></a>
            </p>
        </div>
    <?php
}

?>