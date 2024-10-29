<?php 

add_action('init', function() {
    if ( is_admin() ) {
        \STM\SWC\Classes\Admin\SettingsPage::init();
        \STM\SWC\Classes\Admin\SaveCustomStyle::init();
    }
    if ( stm_swc_is_visible() ) \STM\SWC\Classes\User\SideCart::init();
});

?>