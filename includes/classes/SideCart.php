<?php 

namespace STM\SWC\Classes\User;

class SideCart {

    public static function updateCart($fragments) {
        global $woocommerce;
        
        ob_start();
        require_once STM_SWC_PATH . '/templates/side-cart/cart-body.php';
        $fragments['div.stm_swc-sidecart-body'] = ob_get_clean();

        return self::cartButton($fragments, $woocommerce);      
    }

    public static function cartButton($fragments, $woocommerce) {
        ob_start();
        require_once STM_SWC_PATH . '/templates/side-cart/cart-button.php';
        $fragments['div.stm_swc-cart-btn'] = ob_get_clean();
        
        return self::cartItems($fragments, $woocommerce);
    }

    public static function cartItems($fragments, $woocommerce) {
        ob_start();
        require_once STM_SWC_PATH . '/templates/side-cart/products.php';
        $fragments['div.stm_swc-cart-products'] = ob_get_clean();
        
        return $fragments;
    }

    public static function renderWrapper() {
        require_once STM_SWC_PATH . '/templates/side-cart/wrapper.php';
    }

    public static function init() {
        add_action( 'wp_footer', [ 'STM\SWC\Classes\User\SideCart', 'renderWrapper' ]);
        add_filter( 'woocommerce_add_to_cart_fragments', ['STM\SWC\Classes\User\SideCart', 'updateCart' ], 1);
    }
}

?>