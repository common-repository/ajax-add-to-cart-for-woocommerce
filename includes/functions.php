<?php 

function stm_swc_get_option($option, $default = null) {
    return stm_wpcfto_get_options('STM_SWC_settings', $option, $default);
}

function stm_swc_is_visible() {
    $visible = true;
    $pages = explode(',', stm_swc_get_option('stm_not_visible_pages'));
    foreach ($pages as $word) {
        if (!empty($word) && strlen(strpos($_SERVER['REQUEST_URI'], $word)) > 0 ) {
            $visible = false;
        }
    }
    return $visible;
}

add_action('plugins_loaded', function() {
    if (stm_swc_get_option('stm_shop_add_to_cart_button', false)) add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);
});

// Remove product in the cart using ajax
add_action( 'wp_ajax_stm_swc_product_remove', 'warp_ajax_stm_swc_product_remove' );
add_action( 'wp_ajax_nopriv_stm_swc_product_remove', 'warp_ajax_stm_swc_product_remove' );
function warp_ajax_stm_swc_product_remove()
{
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $data );

    die();
}

// Change quantity of item in the cart using ajax
add_action( 'wp_ajax_stm_swc_update_quantity', 'stm_swc_ajax_update_quantity' );
add_action( 'wp_ajax_nopriv_stm_swc_update_quantity', 'stm_swc_ajax_update_quantity' );
function stm_swc_ajax_update_quantity() {
    // global $woocommerce;
    // $woocommerce->cart->set_quantity( '9a1158154dfa42caddbd0694a4e9bdc8' , 99 );

    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->set_quantity($cart_item_key, $_POST['quantity']);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $data );
}

?>