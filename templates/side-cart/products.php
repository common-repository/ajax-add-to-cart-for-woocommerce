<div class="stm_swc-cart-products">
            <?php
                $items = $woocommerce->cart->get_cart();
                if(stm_swc_get_option('stm_cart_order', 'asc') == 'desc') $items = array_reverse($items, true);
                $stm_currency = get_woocommerce_currency_symbol();
                

                    foreach($items as $item => $values) { 
                        $_product =  wc_get_product( $values['data']->get_id() );
                        $stm_product_url = get_permalink( $values['product_id']);
                        $stm_quantity = $values['quantity'];
                        if($values['variation_id']) {
                            $stm_price = wc_get_product($values['variation_id'])->get_regular_price();
                            if(wc_get_product($values['variation_id'])->get_sale_price()) {
                                $stm_price = wc_get_product($values['variation_id'])->get_sale_price();
                            }
                            $stm_total = $stm_quantity * $stm_price;
                            
                        } else {
                            $stm_price = get_post_meta($values['product_id'] , '_price', true);
                            if(get_post_meta($values['product_id'] , '_sale_price', true)) {
                                $stm_price = get_post_meta($values['product_id'] , '_sale_price', true);
                            }
                            $stm_total = $stm_quantity * $stm_price;
                        }
                        ?>
                        <div class="stm_swc-cart-product">
                            <?php if(stm_swc_get_option('stm_cart_show_product_image', true)) { ?>
                                <div class="stm_swc-cart-product-image">
                                <a href="<?php echo esc_url($stm_product_url);?>">
                                    <?php
                                        //product image
                                        $getProductDetail = wc_get_product( $values['product_id'] );
                                        echo wp_kses_post( $getProductDetail->get_image() ); // accepts 2 arguments ( size, attr )
                                    ?>
                                </a>
                                </div>
                            <?php } ?>
                            <div class="stm_swc-cart-product-data">
                                <div class="stm_swc-cart-product-name">
                                <?php if(stm_swc_get_option('stm_cart_show_product_link', true)) { ?>
                                    <a href="<?php echo esc_url($stm_product_url);?>">
                                        <?php 
                                            if ( stm_swc_get_option('stm_product_name_variative', 'include') == 'include' && stm_swc_get_option('stm_cart_show_product_meta', true) && stm_swc_get_option('stm_cart_show_product_name', true) && $values['variation_id'] > 0) {
                                                echo esc_html(wc_get_product($values['variation_id'])->get_name());
                                                
                                            } else if(stm_swc_get_option('stm_cart_show_product_name', true)) {
                                                echo esc_html($_product->get_title());
                                            } 
                                        ?>
                                    </a>
                                <?php } else { ?>
                                    <span>
                                        <?php 
                                            if ( stm_swc_get_option('stm_product_name_variative', 'include') == 'include' && stm_swc_get_option('stm_cart_show_product_name', true) && $values['variation_id'] > 0) {
                                                echo esc_html(wc_get_product($values['variation_id'])->get_name());
                                            } else if(stm_swc_get_option('stm_cart_show_product_name', true)) {
                                                echo esc_html($_product->get_title());
                                            } 
                                        ?>
                                    </span>
                                <?php } ?>
                                <span class="stm_swc-cart-product-variations">
                                    <?php echo esc_html(($values['variation_id'] > 0 && stm_swc_get_option('stm_product_name_variative', 'include') == 'do_not_include' ? wc_get_product($values['variation_id'])->get_attribute_summary() : '')); ?>
                                </span>
                                </div>
                                <div class="stm_swc-cart-product-price">
                                <?php 
                                    if(stm_swc_get_option('stm_cart_product_price_position', 'one_line') == 'one_line') {
                                        if(stm_swc_get_option('stm_cart_show_product_price', true)) {
                                            if(stm_swc_get_option('stm_cart_quantity_changable', true)) {
                                            ?> 
                                                <input type="number" class="stm_quantity_input" value="<?php echo esc_html($stm_quantity); ?>" min="1" max="99" data-cart_item_key="<?php echo esc_attr($item); ?>" data-product_id="<?php echo esc_attr($values['product_id']); ?>">
                                            <?php
                                                echo esc_html( ' x ' . $stm_currency . $stm_price );
                                            } else {
                                                if(stm_swc_get_option('stm_cart_quantity_changable', true)) {
                                                ?> 
                                                    <?php echo esc_html__('Quantity: ', 'ajax-add-to-cart-for-woocommerce'); ?>
                                                    <input type="number" class="stm_quantity_input" value="<?php echo esc_html($stm_quantity); ?>" min="1" max="99" data-cart_item_key="<?php echo esc_attr($item); ?>" data-product_id="<?php echo esc_attr($values['product_id']); ?>">
                                                <?php
                                                } else {
                                                    echo esc_html('Quantity: ' . $stm_quantity);
                                                }
                                            }
                                        } else {
                                            echo esc_html('Qty: ' . $stm_quantity);
                                        }
                                        if(stm_swc_get_option('stm_cart_show_product_price', true) && stm_swc_get_option('stm_cart_show_product_total', true)) {
                                            echo esc_html(' = ' . $stm_currency . $stm_total);
                                        } else if (stm_swc_get_option('stm_cart_show_product_total', true)) {
                                            echo esc_html(' Total price: ' . $stm_currency . $stm_total);
                                        }
                                    } else {
                                        ?>
                                        <div class="stm_swc-cart-product-price-sum">
                                            <?php
                                                if(stm_swc_get_option('stm_cart_show_product_price', true)) {
                                                    echo esc_html('Price: '. $stm_currency . $stm_price);
                                                }
                                            ?> 
                                        </div>
                                        
                                        <div class="stm_swc-cart-product-qt-total">
                                            <div>
                                                <?php
                                                    if(stm_swc_get_option('stm_cart_quantity_changable', true)) {
                                                    ?> 
                                                        <?php echo esc_html__('Quantity: ', 'ajax-add-to-cart-for-woocommerce'); ?>
                                                        <input type="number" class="stm_quantity_input" value="<?php echo esc_html($stm_quantity); ?>" min="1" max="99" data-cart_item_key="<?php echo esc_attr($item); ?>" data-product_id="<?php echo esc_attr($values['product_id']); ?>"><br>
                                                    <?php
                                                    } else {
                                                        echo esc_html('Quantity: ' . $stm_quantity);
                                                    }
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                    if(stm_swc_get_option('stm_cart_show_product_total', true)) {
                                                        echo esc_html('Total: ' . $stm_currency . $stm_total);
                                                    }
                                                ?>  
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div>
                            <?php if(stm_swc_get_option('stm_cart_show_product_remove', true)) { ?>
                                <div class="stm_swc-cart-product-action">
                                    <a href="<?php echo esc_attr(wc_get_cart_remove_url( $item )); ?>" class="remove_from_cart" aria-label="Remove this item" data-cart_item_key="<?php echo esc_attr($item); ?>" data-product_id="<?php echo esc_attr($values['product_id']); ?>">
                                        <i class="<?php echo esc_attr((stm_swc_get_option('stm_cart_product_remove_icon')) ? stm_swc_get_option('stm_cart_product_remove_icon')['icon'] : stm_swc_get_option('stm_cart_product_remove_icon', 'fa fa-trash-alt')); ?>"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                    
        </div>
<?php 
    if(stm_swc_get_option('stm_cart_show_cart_subtotal', true)) { 
?>
        <div class="stm_swc-cart-subtotal">
            <span>
                <?php 
                    echo esc_html('Subtotal: ', 'ajax-add-to-cart-for-woocommerce');
                    echo esc_html($stm_currency . preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ));
                ?>
            </span>
        </div>
<?php
    }
?>