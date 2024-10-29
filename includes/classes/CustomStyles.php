<?php

namespace STM\SWC\Classes\Admin;

class SaveCustomStyle {
    public static function include_styles($settings) {
        
        ob_start();
        require_once STM_SWC_PATH . '/partials/side-cart/styles.php';
        
        ob_end_flush();
        return apply_filters('stm_wcsba_custom_styles', ob_get_clean());
    }

    public static function save($id, $settings) {
        global $wp_filesystem;

        /*Update V*/
        $current_v = get_option('stm_swc_custom_styles_v', 1) + 1;
        update_option('stm_swc_custom_styles_v', $current_v);

        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = $upload_dir . '/stm-uploads';

        if (empty($wp_filesystem)) {
            require_once ABSPATH . '/wp-admin/includes/file.php';
            WP_Filesystem();
        }
        
        /*Generate custom css*/
        $custom_css = '';
        $custom_css .= preg_replace('/\s+/', ' ', self::include_styles($settings));
        
        /*Create dir or update*/
        
        if (!$wp_filesystem->is_dir($upload_dir)) {
            wp_mkdir_p($upload_dir);
        }

        $custom_style_file = $upload_dir . '/swc-custom.css';

        $wp_filesystem->put_contents($custom_style_file, $custom_css, FS_CHMOD_FILE);
    }

    public static function init() {
        add_action('wpcfto_after_settings_saved', ['STM\SWC\Classes\Admin\SaveCustomStyle', 'save'], 10, 2);
    }
}

?>