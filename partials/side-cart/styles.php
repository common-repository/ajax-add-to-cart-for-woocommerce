<?php 
if(!$settings) $settings = stm_wpcfto_get_options('STM_SWC_settings');
echo 'STM Custom styles v' . get_option('stm_swc_custom_styles_v', 1);
?>
    
/* Side Cart Global */
<?php if(strlen($settings['stm_custom_font']['font-family']) > 0) : ?>
.stm_swc-wrapper {
    a, span, h1, h2, h3, h4, h5, h6, button, div {
        font-family: <?php echo esc_html($settings['stm_custom_font']['font-family']); ?> !important;
    }
}
<?php endif; ?>

/* Side Cart basket */

.stm_swc-wrapper .stm_swc-cart-btn.stm_pos-<?php echo esc_html($settings['stm_open_from']); ?>-<?php echo esc_html($settings['stm_basket_position']); ?> {
    <?php echo esc_html($settings['stm_open_from']); ?>: <?php echo esc_html($settings['stm_basket_rl_offset']) .  'px'; ?> !important;
    <?php echo esc_html($settings['stm_basket_position']); ?>: <?php echo esc_html($settings['stm_basket_rl_offset']) .  'px'; ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn.stm_pos-<?php echo esc_html($settings['stm_open_from']); ?>-<?php echo esc_html($settings['stm_basket_position']); ?>.stm-active  {
    <?php echo esc_html($settings['stm_open_from']); ?>: <?php echo esc_html($settings['stm_cart_width'] + $settings['stm_basket_rl_offset']) .  'px'; ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn.stm_style-1:hover, .stm_swc-wrapper .stm_swc-cart-btn.stm_style-1.stm-active{
    color: <?php echo esc_html($settings['stm_basket_icon_color_hover']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_basket_background_color_hover']); ?> !important;
    border: 2px solid <?php echo esc_html($settings['stm_basket_border_color_hover']); ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn.stm_style-1:hover i, .stm_swc-wrapper .stm_swc-cart-btn.stm_style-1.stm-active i{
    color: <?php echo esc_html($settings['stm_basket_icon_color_hover']); ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn{
    background-color: <?php echo esc_html($settings['stm_basket_background_color']); ?>;
    box-shadow: <?php echo esc_html($settings['stm_basket_box_shadow']) .  ' ' . $settings['stm_basket_box_shadow_color']; ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn i{
    color: <?php echo esc_html($settings['stm_basket_icon']['color']); ?> !important;
    font-size: <?php echo esc_html($settings['stm_basket_icon']['size']) .  'px'; ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-btn .stm-items-count{
    color: <?php echo esc_html($settings['stm_basket_count_text_color']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_basket_count_background_color']); ?> !important;
    border-color: <?php echo esc_html($settings['stm_basket_count_border_color']); ?> !important;
    box-shadow: <?php echo esc_html($settings['stm_basket_counter_box_shadow']) .  ' ' . $settings['stm_basket_counter_box_shadow_color']; ?> !important;
}

/* Side Cart bar*/
.stm_swc-wrapper .stm_swc-modal  {
    width: <?php echo esc_html($settings['stm_cart_width']) .  'px'; ?> !important;
    <?php echo ($settings['stm_cart_height'] == 'auto_adjust' ? 'bottom: auto' : ''); ?> !important;
}
.stm_swc-wrapper .stm_swc-modal.stm_open_from-<?php echo esc_html($settings['stm_open_from']); ?> {
    <?php echo esc_html($settings['stm_open_from']); ?>: -<?php echo esc_html($settings['stm_cart_width']) .  'px'; ?>;
}

/* Side Cart header */
.stm_swc-sidecart-header {
    text-align: <?php echo esc_html($settings['stm_cart_header_heading_align']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_cart_header_background_color']); ?> !important;
    color:  <?php echo esc_html($settings['stm_cart_header_text_color']); ?> !important;
}
.stm_swc-sidecart-header span.stm_cart-heading-text {
    font-size: <?php echo esc_html($settings['stm_cart_header_heading_font_size']) .  'px'; ?> !important;
    color: <?php echo esc_html($settings['stm_cart_header_text_color']); ?> !important;
}
.stm_swc-wrapper .stm_swc-modal span.stm_swc-modal-close i{
    color: <?php echo esc_html($settings['stm_cart_header_close_icon']['color']); ?> !important;
    font-size: <?php echo esc_html($settings['stm_cart_header_close_icon']['size']) .  'px'; ?> !important;
}
}
.stm_swc-wrapper .stm_swc-modal span.stm_swc-modal-close:hover i{
    color: <?php echo esc_html($settings['stm_cart_header_close_icon_color_hover']); ?> !important;
}
.stm_swc-wrapper .stm_swc-modal .stm_swc-sidecart-header span.stm_cart-heading-icon i {
    color: <?php echo esc_html($settings['stm_cart_header_icon']['color']); ?> !important;
    font-size: <?php echo esc_html($settings['stm_cart_header_icon']['size']) . 'px'; ?> !important;

}

/* Side Cart body */
.stm_swc-sidecart-body {
    background-color: <?php echo esc_html($settings['stm_cart_body_background_color']); ?> !important;
    color:  <?php echo esc_html($settings['stm_cart_body_text_color']); ?> !important;
}

.stm_swc-sidecart-body a, 
.stm_swc-sidecart-body span, 
.stm_swc-sidecart-body h1,
.stm_swc-sidecart-body h2, 
.stm_swc-sidecart-body h3, 
.stm_swc-sidecart-body h4, 
.stm_swc-sidecart-body h5, 
.stm_swc-sidecart-body h6, 
.stm_swc-sidecart-body button {
    font-size: <?php echo esc_html($settings['stm_cart_body_font_size']) .  'px'; ?> !important;
    color: <?php echo esc_html($settings['stm_cart_body_text_color']); ?>;
}

.stm_swc-wrapper .stm_swc-cart-subtotal span {
    font-size: <?php echo esc_html($settings['stm_cart_body_subtotal_font_size']['size']) .  'px'; ?> !important;
}

/* Side Cart body ( Product ) */
.stm_swc-wrapper .stm_swc-cart-products .stm_swc-cart-product {
    padding-top: <?php echo esc_html($settings['stm_cart_product_padding']['top'] .  $settings['stm_cart_product_image_padding']['unit']); ?> !important;
    padding-right: <?php echo esc_html($settings['stm_cart_product_padding']['right'] .  $settings['stm_cart_product_image_padding']['unit']); ?> !important;
    padding-bottom: <?php echo esc_html($settings['stm_cart_product_padding']['bottom'] .  $settings['stm_cart_product_image_padding']['unit']); ?> !important;
    padding-left: <?php echo esc_html($settings['stm_cart_product_padding']['left'] .  $settings['stm_cart_product_image_padding']['unit']); ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-products .stm_swc-cart-product .stm_swc-cart-product-image {
    width: <?php echo esc_html($settings['stm_cart_product_image_width']) .  '%'; ?> !important;
    padding-top: <?php echo esc_html($settings['stm_cart_product_image_padding']['top'] .  $settings['stm_cart_product_image_padding']['unit']); ?>;
    padding-right: <?php echo esc_html($settings['stm_cart_product_image_padding']['right'] .  $settings['stm_cart_product_image_padding']['unit']); ?>;
    padding-bottom: <?php echo esc_html($settings['stm_cart_product_image_padding']['bottom'] .  $settings['stm_cart_product_image_padding']['unit']); ?>;
    padding-left: <?php echo esc_html($settings['stm_cart_product_image_padding']['left'] .  $settings['stm_cart_product_image_padding']['unit']); ?>;
}
.stm_swc-wrapper .stm_swc-cart-products .stm_swc-cart-product .stm_swc-cart-product-data {
    justify-content: <?php echo esc_html($settings['stm_cart_product_details_position']); ?> !important;
}

.stm_swc-wrapper .stm_swc-cart-products .stm_swc-cart-product .stm_swc-cart-product-action i{
    color: <?php echo esc_html($settings['stm_cart_product_remove_icon']['color']); ?> !important;
    font-size: <?php echo esc_html($settings['stm_cart_product_remove_icon']['size']) .  'px'; ?> !important;
}
.stm_swc-wrapper .stm_swc-cart-products .stm_swc-cart-product .stm_swc-cart-product-action a:hover i{
    color: <?php echo esc_html($settings['stm_cart_product_remove_icon_color_hover']); ?> !important;
}
/* Side Cart Footer */
.stm_swc-wrapper .stm_swc-modal .stm_swc-sidecart-footer {
    padding: <?php echo esc_html($settings['stm_cart_footer_padding']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_cart_footer_background_color']); ?> !important;
    color:  <?php echo esc_html($settings['stm_cart_footer_text_color']); ?> !important;
}
.stm_swc-sidecart-footer a, 
.stm_swc-sidecart-footer span, 
.stm_swc-sidecart-footer h1,
.stm_swc-sidecart-footer h2, 
.stm_swc-sidecart-footer h3, 
.stm_swc-sidecart-footer h4, 
.stm_swc-sidecart-footer h5, 
.stm_swc-sidecart-footer h6, 
.stm_swc-sidecart-footer button {
    font-size: <?php echo esc_html($settings['stm_cart_footer_font_size']) .  'px'; ?> !important;
    color: <?php echo esc_html($settings['stm_cart_footer_text_color']); ?>;
}

<?php if ( $settings['stm_cart_footer_button_design'] == 'custom') { ?>
.stm_swc-wrapper .stm_button {
    color: <?php echo esc_html($settings['stm_cart_footer_button_text_color']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_cart_footer_button_background_color']); ?> !important;
    border: <?php echo esc_html($settings['stm_cart_footer_button_border']); ?> !important;
    border-radius: <?php echo esc_html($settings['stm_cart_footer_button_border_radius']) . 'px'; ?> !important;
}
.stm_swc-wrapper .stm_button:hover {
    color: <?php echo esc_html($settings['stm_cart_footer_button_text_color_hover']); ?> !important;
    background-color: <?php echo esc_html($settings['stm_cart_footer_button_background_color_hover']); ?> !important;
    border: <?php echo esc_html($settings['stm_cart_footer_button_border_hover']); ?> !important;
}
<?php } ?>

/* Custom User CSS code */
<?php echo esc_html($settings['stm_custom_css']); ?>