<?php 

add_action( 'wp_enqueue_scripts', 'stm_swc_enqueue' );
function stm_swc_enqueue() {
    $upload = wp_upload_dir();

    // Register scripts
    wp_register_script('stm_swc_ajax-add-to-cart', STM_SWC_URL . 'assets/js/ajax-add-to-cart.js');
    wp_register_script('stm_swc_ajax-remove-from-cart', STM_SWC_URL . 'assets/js/ajax-remove-from-cart.js');

    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('stm_swc_wcsca_scripts', STM_SWC_URL . 'assets/js/main.js');
    if( stm_swc_get_option('stm_ajax_add_to_cart', true) ) wp_enqueue_script('stm_swc_ajax-add-to-cart');
    if( stm_swc_get_option('stm_ajax_remove_from_cart', true) ) wp_enqueue_script('stm_swc_ajax-remove-from-cart');

    // Enqueue styles
    wp_enqueue_style( 'stm_swc_wcsca_styles', STM_SWC_URL . 'assets/css/main.css' );
    wp_enqueue_style( 'stm_swc_fontawesome', STM_SWC_URL . 'assets/css/font-awesome.min.css' );
    if(file_exists($upload['basedir'] . '/stm-uploads/swc-custom.css') && get_option( 'stm_swc_settings')){
        wp_enqueue_style( 'stm_swc_custom_styles', $upload['baseurl'] . '/stm-uploads/swc-custom.css', null, get_option('stm_swc_custom_styles_v', 1) );
    }
}

?>