<?php
/*
* Plugin Name: StickyWooCart - Ajax Add to Cart for WooCommerce
* Plugin URI: https://wordpress.org/plugins/ajax-add-to-cart-for-woocommerce/
* Author: StylemixThemes
* Author URI: https://stylemixthemes.net/
* Version: 1.0.2
* Text Domain: ajax-add-to-cart-for-woocommerce
* Domain Path: /languages
* Description: Sales & Conversion Booster for WooCommerce.
* Tags: woocommerce, side cart, floating cart, sticky cart, cart addon, stylemixthemes, stylemix
*/


if( !defined('ABSPATH') ) return; //Exit if accessed directly

// Define constants
define( 'STM_SWC_FILE', __FILE__ );
define( 'STM_SWC_PATH', dirname( STM_SWC_FILE ) );
define( 'STM_SWC_INCLUDES_PATH', STM_SWC_PATH . '/includes' );
define( 'STM_SWC_CLASSES_PATH', STM_SWC_INCLUDES_PATH . '/classes' );
define( 'STM_SWC_URL', plugin_dir_url( STM_SWC_FILE ) );

if ( function_exists( 'swc_fs' ) ) {
	swc_fs()->set_basename( true, FILE );
} else {
	if ( ! function_exists( 'swc_fs' ) ) 
		require_once STM_SWC_INCLUDES_PATH . '/freemius_sdk.php';

	if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) 
		require_once STM_SWC_INCLUDES_PATH . '/admin/notices.php';

	// Require autoload file
	require_once STM_SWC_INCLUDES_PATH . '/autoload.php';
}
