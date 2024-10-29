<?php 


require_once STM_SWC_PATH . '/wpcfto/WPCFTO.php';
require_once STM_SWC_INCLUDES_PATH . '/functions.php';
require_once STM_SWC_INCLUDES_PATH . '/enqueue.php';

if( is_admin() ) {
    require_once STM_SWC_INCLUDES_PATH . '/admin/SettingsPage.php';
    require_once STM_SWC_INCLUDES_PATH . '/classes/CustomStyles.php';
}

require_once STM_SWC_INCLUDES_PATH . '/classes/SideCart.php';
require_once STM_SWC_INCLUDES_PATH . '/init.php';


?>