<div class="stm_swc-sidecart-body">
    <?php 
        if($woocommerce->cart->cart_contents_count <= 0) {
            ?>
                <div class="stm-my-auto">
                    <h6>
                        <?php echo esc_html(stm_swc_get_option('stm_empty_cart_text', 'Your Cart is Empty')); ?>
                    </h3>
                    <br>
                    <a href="<?php echo esc_url(stm_swc_get_option('stm_empty_cart_url', get_permalink( wc_get_page_id( 'shop' ) )));?>" class="stm_button stm_button-style-1 stm-w-75">
                        <?php echo esc_html(stm_swc_get_option('stm_shop_button_text', 'Return to Shop')); ?>
                    </a>
                </div>
            <?php
        } else {
            ?>
            <div class="stm_swc-cart-products"></div>


            <div class="stm_cart-body-buttons style_<?php echo esc_attr(stm_swc_get_option('stm_cart_footer_button_row', 'one')); ?> stm-text-center">
                <?php

                    if ( !empty( stm_swc_get_option( 'stm_cart_footer_button_position' ) ) ) {
                        $buttons_position = stm_swc_get_option('stm_cart_footer_button_position');
                    } else {
                        $buttons_position[0]['options'] = [
                            ['id' => 'viewcart_button'],
                            ['id' => 'checkout_button']
                        ];
                    }
                    $buttons_position = $buttons_position[0]['options'];
                    for($i = 0; $i < 2; $i++) {
                        if($buttons_position[$i]['id'] == 'viewcart_button'){
                            ?>
                                <a href="<?php echo esc_url(get_permalink( wc_get_page_id( 'cart' ) ));?>" class="stm_button stm_button-style-1 stm-w-75 stm-my-1">
                                    <?php echo esc_html(stm_swc_get_option('stm_cart_button_text', 'View Cart')); ?>
                                </a>
                            <?php
                        } else if($buttons_position[$i]['id'] == 'checkout_button'){
                            ?>
                                <a href="<?php echo esc_url(get_permalink( wc_get_page_id( 'checkout' ) ));?>" class="stm_button stm_button-style-1 stm-w-75 stm-my-1">
                                    <?php echo esc_html(stm_swc_get_option('stm_checkout_button_text', 'Checkout')); ?>
                                </a>
                            <?php
                        }
                    }
                
                ?>
            </div>
            <?php
        }
    ?>
</div>