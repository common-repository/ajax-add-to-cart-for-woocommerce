<div id="stm_swc" class="stm_swc-wrapper">
    <div class="stm_swc-overlay"></div>
    
    <div class="stm_swc-cart-btn"></div>

    <div class="stm_swc-modal stm_open_from-<?php echo esc_attr(stm_swc_get_option('stm_open_from', 'right')); ?>">
        <?php if(stm_swc_get_option('stm_cart_show_close_icon', true)) { ?>
            <span class="stm_swc-modal-close">
                <i class="<?php echo esc_attr((stm_swc_get_option('stm_cart_header_close_icon')) ? stm_swc_get_option('stm_cart_header_close_icon')['icon'] : stm_swc_get_option('stm_cart_header_close_icon', 'fa fa-times')); ?>"></i>
            </span>
        <?php } ?>

        <div class="stm_swc-sidecart-header">
            <?php if(stm_swc_get_option('stm_cart_show_header_icon', true)) { ?>
                <span class="stm_cart-heading-icon">
                    <i class="<?php echo esc_attr((stm_swc_get_option('stm_basket_icon')) ? stm_swc_get_option('stm_basket_icon')['icon'] : stm_swc_get_option('stm_basket_icon', 'fa fa-shopping-bag')); ?>"></i>
                </span>
            <?php } ?>
            <span class="stm_cart-heading-text">
                <?php echo esc_html(stm_swc_get_option('stm_cart_heading_text', 'Your Cart')); ?>
            </span>
        </div>

        <div class="stm_swc-sidecart-body"></div>

        <div class="stm_swc-sidecart-footer"></div>
    </div>
</div>