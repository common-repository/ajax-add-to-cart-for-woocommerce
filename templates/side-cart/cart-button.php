<?php 
$items = $woocommerce->cart->get_cart();
$basket_status = 'always_show';
$counter_status = 'always_show';

if(stm_swc_get_option('stm_basket_status') == "hide_when_empty" && $items < 1 || stm_swc_get_option('stm_basket_status') == "always_hide") $basket_status = 'hidden';
if(stm_swc_get_option('stm_basket_counter_status') == "hide_when_empty" && $items < 1 || stm_swc_get_option('stm_basket_counter_status') == "always_hide") $counter_status = 'hidden';

?>
<div id="stm_btn" class="stm_swc-cart-btn <?php echo esc_attr($basket_status); ?> stm_style-1 stm_pos-<?php echo esc_attr(stm_swc_get_option('stm_open_from', 'right')); ?>-<?php echo esc_attr(stm_swc_get_option('stm_basket_position', 'bottom')); ?>">
    <i class="<?php echo esc_attr((stm_swc_get_option('stm_basket_icon')) ? stm_swc_get_option('stm_basket_icon')['icon'] : stm_swc_get_option('stm_basket_icon', 'fa fa-shopping-bag')); ?>"></i>
        <span class="stm-items-count <?php echo esc_attr($counter_status); ?> stm-position-<?php echo esc_attr(stm_swc_get_option('stm_basket_count_position', 'top-left'));?>">
            <?php 
                if(stm_swc_get_option('stm_basket_count', 'products_count') == 'products_count') {
                    echo esc_html(count(WC()->cart->get_cart()));
                } else {
                    echo esc_html(WC()->cart->cart_contents_count);
                }
            ?>
        </span>
</div>

<?php echo (stm_swc_get_option('stm_basket_status', 'always_show') ? '' : 'hidden');?>