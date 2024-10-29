<?php 

namespace STM\SWC\Classes\Admin;

class SettingsPage {

    private static function addField($type, $label, $value, $others = []) {
        $data = [
            "type"      => $type,
            "label"     => $label,
            "value"     => $value
        ];
        if (!empty( $others ) && count( $others ) > 0 ) {
            foreach ($others as $o_key => $o_value) {
                if (is_array( $value ) && count( $value ) > 0) {
                    foreach ($value as $v_key => $v_value) { 
                        if ( isset($data[$o_key]) ) $data[$o_key][$v_key] = $v_value;
                    }
                } else {
                    $data[$o_key] = $o_value;
                }
            }
        }
        return $data;
    }
    public static function init() {
        add_filter('wpcfto_options_page_setup', function ($setups) {
            $setups[] = [
                'option_name'       => 'stm_swc_settings',

                'title'             => esc_html__('StickyWooCart', 'ajax-add-to-cart-for-woocommerce'),
                'sub_title'         => esc_html__('by StylemixThemes', 'ajax-add-to-cart-for-woocommerce'),
                'logo'              => STM_SWC_URL . '/assets/images/stylemixthemeslogo.png',


                'page' => array(
                    'page_title'    => 'StickyWooCart',
                    'menu_title'    => 'StickyWooCart',
                    'menu_slug'     => 'stm_swc_options',
                    'icon'          => 'dashicons-cart',
                    'position'      => 40,
                ),

                'fields' => [
                    'tab_general' => [
                        'name'      => esc_html__('General', 'ajax-add-to-cart-for-woocommerce'),
                        'fields'    => [
                            
                            'stm_auto_open_cart'                        => self::addField('checkbox',       esc_html__('Slide-in Off-Canvas Cart Page', 'ajax-add-to-cart-for-woocommerce'),    true,               ['submenu' => 'Main', 'description'  => 'If enabled, a slide-in off-canvas page will be opened automatically when a product is added to cart']),
                            'stm_ajax_add_to_cart'                      => self::addField('checkbox',       esc_html__('Ajax add to Cart', 'ajax-add-to-cart-for-woocommerce'),                 true,               ['submenu' => 'Main', 'description'  => 'Add item to cart without refreshing page']),
                            'stm_ajax_remove_from_cart'                 => self::addField('checkbox',       esc_html__('Ajax remove from Cart', 'ajax-add-to-cart-for-woocommerce'),            true,               ['submenu' => 'Main', 'description'  => 'Remove item from cart without refreshing page']),
                            'stm_shop_add_to_cart_button'               => self::addField('checkbox',       esc_html__('Add to cart button', 'ajax-add-to-cart-for-woocommerce'),               false,              ['submenu' => 'Main', 'description'  => 'If enabled, the "Add to cart" button is added on the store page']),
                            'stm_basket_status'                         => self::addField('select',         esc_html__('Basket status', 'ajax-add-to-cart-for-woocommerce'),                    'always_show',      ['submenu' => 'Main', 'options'      => self::basket_status_options()]),
                            'stm_basket_counter_status'                 => self::addField('select',         esc_html__('Basket counter status', 'ajax-add-to-cart-for-woocommerce'),            'always_show',      ['submenu' => 'Main', 'options'      => self::basket_counter_status_options()]),
                            'stm_basket_count'                          => self::addField('select',         esc_html__('Cart Icon Counter', 'ajax-add-to-cart-for-woocommerce'),                'products_count',   ['submenu' => 'Main', 'options'      => self::basket_count_options()]),
                            'stm_not_visible_pages'                     => self::addField('textarea',       esc_html__('Disable Cart on Selected Pages', 'ajax-add-to-cart-for-woocommerce'),   null,               ['submenu' => 'Main', 'description'  => 'Enter page slugs, comma-separated']),
                            

                            'stm_cart_order'                            => self::addField('select',         esc_html__('Products on a Cart Page order', 'ajax-add-to-cart-for-woocommerce'),            'asc',              ['submenu' => 'Side Cart', 'options' => self::stm_cart_order_options()]),
                            'stm_open_from'                             => self::addField('select',         esc_html__('Open side cart from', 'ajax-add-to-cart-for-woocommerce'),                      'right',            ['submenu' => 'Side Cart', 'options' => self::open_from_options()]),
                            'stm_cart_show_header_icon'                 => self::addField('checkbox',       esc_html__('Header basket icon', 'ajax-add-to-cart-for-woocommerce'),                       true,               ['submenu' => 'Side Cart', 'group'   => 'started']),
                            'stm_cart_show_close_icon'                  => self::addField('checkbox',       esc_html__('Close icon', 'ajax-add-to-cart-for-woocommerce'),                               true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_image'               => self::addField('checkbox',       esc_html__('Product image', 'ajax-add-to-cart-for-woocommerce'),                            true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_name'                => self::addField('checkbox',       esc_html__('Product name', 'ajax-add-to-cart-for-woocommerce'),                             true,               ['submenu' => 'Side Cart']),
                            'stm_cart_quantity_changable'               => self::addField('checkbox',       esc_html__('Changing product quantity in side cart', 'ajax-add-to-cart-for-woocommerce'),   true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_price'               => self::addField('checkbox',       esc_html__('Product price', 'ajax-add-to-cart-for-woocommerce'),                            true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_total'               => self::addField('checkbox',       esc_html__('Product total', 'ajax-add-to-cart-for-woocommerce'),                            true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_meta'                => self::addField('checkbox',       esc_html__('Product meta ( Variations )', 'ajax-add-to-cart-for-woocommerce'),              true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_link'                => self::addField('checkbox',       esc_html__('Link to a Product page', 'ajax-add-to-cart-for-woocommerce'),                   true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_product_remove'              => self::addField('checkbox',       esc_html__('Remove Product from cart', 'ajax-add-to-cart-for-woocommerce'),                 true,               ['submenu' => 'Side Cart']),
                            'stm_cart_show_cart_subtotal'               => self::addField('checkbox',       esc_html__('Subtotal', 'ajax-add-to-cart-for-woocommerce'),                                 true,               ['submenu' => 'Side Cart', 'group'   => 'ended']),
                            'stm_product_name_variative'                => self::addField('select',         esc_html__('Product Name ( Variable Product )', 'ajax-add-to-cart-for-woocommerce'),        'do_not_include',   ['submenu' => 'Side Cart', 'options' => self::product_variative_options()]),
                            
                            'stm_cart_heading_text'                     => self::addField('text',           esc_html__('Cart Heading', 'ajax-add-to-cart-for-woocommerce'),                                 'Your Cart',            ['submenu' => 'Texts',      'description'   => 'Leave text empty to remove element']),
                            'stm_cart_button_text'                      => self::addField('text',           esc_html__('Cart Button', 'ajax-add-to-cart-for-woocommerce'),                                  'View Cart',            ['submenu' => 'Texts',      'description'   => 'Leave text empty to remove element']),
                            'stm_checkout_button_text'                  => self::addField('text',           esc_html__('Checkout Button', 'ajax-add-to-cart-for-woocommerce'),                              'Checkout',             ['submenu' => 'Texts',      'description'   => 'Leave text empty to remove element']),
                            'stm_empty_cart_text'                       => self::addField('text',           esc_html__('Your Cart is Empty', 'ajax-add-to-cart-for-woocommerce'),                           'Your cart is empty',   ['submenu' => 'Texts',      'description'   => 'Leave text empty to remove element']),
                            'stm_shop_button_text'                      => self::addField('text',           esc_html__('Shop Button ( Displays when cart is empty )', 'ajax-add-to-cart-for-woocommerce'),  'Return to Shop',       ['submenu' => 'Texts',      'description'   => 'Leave text empty to remove element']),
                        ]
                    ],
                    'tab_style' => [
                        'name'      => esc_html__('Style', 'ajax-add-to-cart-for-woocommerce'),
                        'fields'    => [

                            // Main submenu
                            'stm_cart_width'                            => self::addField('number',         esc_html__('Side Cart width', 'ajax-add-to-cart-for-woocommerce'),                              520, ['submenu' => 'Main',                                 'description'   => 'Size in px']),
                            'stm_cart_height'                           => self::addField('select',         esc_html__('Side Cart height', 'ajax-add-to-cart-for-woocommerce'),                             'full_height', ['submenu' => 'Main',                                 'description'   => 'Size in px', 'options' => self::cart_height_options()]),
                            'stm_custom_font' => array(
                                'type' => 'typography',
                                'label' => esc_html__('Custom font', 'ajax-add-to-cart-for-woocommerce'),
                                'excluded' => array(
                                    'backup-font',
                                    'font-size',
                                    'subset',
                                    'google-weight',
                                    'text-align',
                                    'line-height',
                                    'letter-spacing',
                                    'word-spacing',
                                    'text-transform',
                                    'color'
                                ),
                                'value' => [
                                    'font-family' => 'Montserrat'
                                ],
                                'submenu' => 'Main'
                            ),
                            // Side cart basket submenu
                            'stm_basket_position'                       => self::addField('select',         esc_html__('Basket position', 'ajax-add-to-cart-for-woocommerce'),                              'bottom', ['submenu' => 'Side Cart basket',                     'options'       => self::basket_position_options()]),
                            'stm_basket_tb_offset'                      => self::addField('number',         esc_html__('Basket Offset ↨', 'ajax-add-to-cart-for-woocommerce'),                              25, ['submenu' => 'Side Cart basket',                     'description'   => 'Leave pixels from top/bottom']),
                            'stm_basket_rl_offset'                      => self::addField('number',         esc_html__('Basket Offset ⟷', 'ajax-add-to-cart-for-woocommerce'),                             25, ['submenu' => 'Side Cart basket',                     'description'   => 'Leave pixels from left/right']),
                            'stm_basket_icon' => array(
                                'type' => 'icon_picker',
                                'label' => esc_html__('Floating icon', 'ajax-add-to-cart-for-woocommerce'),
                                'value' => [
                                    'icon' => 'fa fa-shopping-bag',
                                    'size'  => 22,
                                ],
                                'submenu' => 'Side Cart basket'
                            ),
                            'stm_basket_count_position'                 => self::addField('select',         esc_html__('Cart Icon Counter position', 'ajax-add-to-cart-for-woocommerce'),                   'top-left',                 ['submenu' => 'Side Cart basket', 'options' => self::basket_count_position_options()]),
                            'stm_basket_background_color'               => self::addField('color',          esc_html__('Basket background color', 'ajax-add-to-cart-for-woocommerce'),                      '#ffffff',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_border_color'                   => self::addField('color',          esc_html__('Basket border color', 'ajax-add-to-cart-for-woocommerce'),                          '#7d57b1',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_icon_color_hover'               => self::addField('color',          esc_html__('Floating icon color on hover', 'ajax-add-to-cart-for-woocommerce'),                 '#ffffff',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_background_color_hover'         => self::addField('color',          esc_html__('Basket background color on hover', 'ajax-add-to-cart-for-woocommerce'),             '#7d57b1',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_border_color_hover'             => self::addField('color',          esc_html__('Basket border color on hover', 'ajax-add-to-cart-for-woocommerce'),                 '#7d57b1',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_box_shadow'                     => self::addField('text',           esc_html__('Basket shadow', 'ajax-add-to-cart-for-woocommerce'),                                '0 0 0 0',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_box_shadow_color'               => self::addField('color',          esc_html__('Basket shadow color', 'ajax-add-to-cart-for-woocommerce'),                          null,                       ['submenu' => 'Side Cart basket']),
                            'stm_basket_counter_box_shadow'             => self::addField('text',           esc_html__('Basket counter shadow', 'ajax-add-to-cart-for-woocommerce'),                        '0 0 0 0',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_counter_box_shadow_color'       => self::addField('color',          esc_html__('Basket counter shadow color', 'ajax-add-to-cart-for-woocommerce'),                  null,                       ['submenu' => 'Side Cart basket']),
                            'stm_basket_count_text_color'               => self::addField('color',          esc_html__('Cart Icon Counter text color', 'ajax-add-to-cart-for-woocommerce'),                 '#7d57b1',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_count_background_color'         => self::addField('color',          esc_html__('Cart Icon Counter background color', 'ajax-add-to-cart-for-woocommerce'),           '#ffd200',                  ['submenu' => 'Side Cart basket']),
                            'stm_basket_count_border_color'             => self::addField('color',          esc_html__('Cart Icon Counter border color', 'ajax-add-to-cart-for-woocommerce'),               '#ffd200',                  ['submenu' => 'Side Cart basket']),

                            // Side cart submenu
                            'stm_cart_header_heading_align'             => self::addField('select',         esc_html__('Heading align', 'ajax-add-to-cart-for-woocommerce'),            'center',       ['submenu' => 'Side Cart',  'options'       => self::cart_header_heading_align_options()]),
                            'stm_cart_header_close_icon' => array(
                                'type' => 'icon_picker',
                                'label' => esc_html__('Header close icon', 'ajax-add-to-cart-for-woocommerce'),
                                'value' => [
                                    'icon' => 'fa fa-times',
                                    'size'  => 18,
                                    'color' => '#6c6c6c',
                                ],
                                'submenu' => 'Side Cart'
                            ),
                            'stm_cart_header_close_icon_color_hover'    => self::addField('color',          esc_html__('Header close icon color on hover', 'ajax-add-to-cart-for-woocommerce'),                 '#7d57b1',                  ['submenu' => 'Side Cart']),
                            'stm_cart_header_heading_font_size'         => self::addField('number',         esc_html__('Heading font size', 'ajax-add-to-cart-for-woocommerce'),        20,             ['submenu' => 'Side Cart',  'description'   => 'Size in px']),
                            'stm_cart_header_background_color'          => self::addField('color',          esc_html__('Header background color', 'ajax-add-to-cart-for-woocommerce'),  '#ffffff',      ['submenu' => 'Side Cart']),
                            'stm_cart_header_text_color'                => self::addField('color',          esc_html__('Header text color', 'ajax-add-to-cart-for-woocommerce'),        '#222',      ['submenu' => 'Side Cart']),
                            'stm_cart_header_icon' => array(
                                'type' => 'icon_picker',
                                'label' => esc_html__('Header icon', 'ajax-add-to-cart-for-woocommerce'),
                                'value' => [
                                    'icon' => 'fa fa-shopping-bag',
                                    'size'  => 28,
                                    'color' => '#7d57b1',
                                ],
                                'submenu' => 'Side Cart'
                            ),
                            'stm_cart_body_font_size'                   => self::addField('number',         esc_html__('Text font size', 'ajax-add-to-cart-for-woocommerce'),           16,             ['submenu' => 'Side Cart',  'description'   => 'Size in px']),
                            'stm_cart_body_subtotal_font_size'          => self::addField('number',         esc_html__('Subtotal text font size', 'ajax-add-to-cart-for-woocommerce'),  20,             ['submenu' => 'Side Cart',  'description'   => 'Size in px']),
                            'stm_cart_body_background_color'            => self::addField('color',          esc_html__('Body background color', 'ajax-add-to-cart-for-woocommerce'),    '#ffffff',      ['submenu' => 'Side Cart']),
                            'stm_cart_body_text_color'                  => self::addField('color',          esc_html__('Body text color', 'ajax-add-to-cart-for-woocommerce'),          '#222',      ['submenu' => 'Side Cart']),
                            'stm_cart_footer_padding'                   => self::addField('text',           esc_html__('Footer padding', 'ajax-add-to-cart-for-woocommerce'),           '10px 20px',    ['submenu' => 'Side Cart',                     'description'   => '↨ ⟷ ( Default: 10px 20px )']),
                            'stm_cart_footer_font_size'                 => self::addField('number',         esc_html__('Footer font size', 'ajax-add-to-cart-for-woocommerce'),         18,             ['submenu' => 'Side Cart',                     'description'   => 'Size in px']),
                            'stm_cart_footer_text_color'                => self::addField('color',          esc_html__('Footer text color', 'ajax-add-to-cart-for-woocommerce'),        '#222', ['submenu' => 'Side Cart']),
                            'stm_cart_footer_background_color'          => self::addField('color',          esc_html__('Footer background color', 'ajax-add-to-cart-for-woocommerce'),  'rgba(255, 255, 255, 1)', ['submenu' => 'Side Cart']),

                            'stm_cart_footer_button_position'           => [
                                'type' => 'sorter',
                                'label' => esc_html__( 'Buttons position', 'ajax-add-to-cart-for-woocommerce' ),
                                'options' => array(
                                    array(
                                        'id' => 'buttons_position',
                                        'options' => array(
                                            array(
                                                'id' => 'viewcart_button',
                                                'label' => esc_html__( 'View Cart', 'ajax-add-to-cart-for-woocommerce' )
                                            ),
                                            array(
                                                'id' => 'checkout_button',
                                                'label' => esc_html__( 'Checkout', 'ajax-add-to-cart-for-woocommerce' )
                                            ),
                                        )
                                    ),
                                ),
                                'submenu' => 'Side Cart'
                            ],

                            'stm_cart_footer_button_row'                        => self::addField('select',         esc_html__('Footer buttons container row type', 'ajax-add-to-cart-for-woocommerce'),            'one', ['submenu' => 'Side Cart',                     'options'       => self::cart_footer_button_row_options()]),
                            'stm_cart_footer_button_design'                     => self::addField('select',         esc_html__('Footer buttons design', 'ajax-add-to-cart-for-woocommerce'),                        'default', ['submenu' => 'Side Cart',                     'options'       => self::cart_footer_button_design_options()]),
                            'stm_cart_footer_button_text_color'                 => self::addField('color',          esc_html__('Footer buttons text color', 'ajax-add-to-cart-for-woocommerce'),                    '#7d57b1', ['submenu' => 'Side Cart']),
                            'stm_cart_footer_button_background_color'           => self::addField('color',          esc_html__('Footer buttons background color', 'ajax-add-to-cart-for-woocommerce'),              '#ffffff', ['submenu' => 'Side Cart']),
                            'stm_cart_footer_button_border'                     => self::addField('text',           esc_html__('Footer buttons border', 'ajax-add-to-cart-for-woocommerce'),                        '1px solid #7d57b1', ['submenu' => 'Side Cart',                     'description'   => 'Default: 1px solid #7d57b1']),
                            'stm_cart_footer_button_border_radius'              => self::addField('number',         esc_html__('Footer buttons border radius', 'ajax-add-to-cart-for-woocommerce'),      0,         ['submenu' => 'Side Cart', 'description'   => 'Value in px']),
                            'stm_cart_footer_button_text_color_hover'           => self::addField('color',          esc_html__('Footer buttons text color on hover', 'ajax-add-to-cart-for-woocommerce'),           '#ffffff', ['submenu' => 'Side Cart']),
                            'stm_cart_footer_button_background_color_hover'     => self::addField('color',          esc_html__('Footer buttons background color on hover', 'ajax-add-to-cart-for-woocommerce'),     '#7d57b1', ['submenu' => 'Side Cart']),
                            'stm_cart_footer_button_border_hover'               => self::addField('text',           esc_html__('Footer buttons border on hover', 'ajax-add-to-cart-for-woocommerce'),               '1px solid #7d57b1', ['submenu' => 'Side Cart',                     'description'   => 'Default: 1px solid #7d57b1']),
                            
                            // Side cart body ( Products ) submenu
                            'stm_cart_product_image_width'              => self::addField('number',         esc_html__('Product image width', 'ajax-add-to-cart-for-woocommerce'),      30,         ['submenu' => 'Side Cart body ( Product )', 'description'   => 'Value in percentage %']),
                            'stm_cart_product_image_padding' => array(
                                'type' => 'spacing',
                                'label' => esc_html__( 'Product image container padding', 'ajax-add-to-cart-for-woocommerce' ),
                                'units' => ['px', 'em'],
                                'value' => [
                                    'top' => '25',
                                    'right' => '25',
                                    'bottom' => '25',
                                    'left' => '25',
                                    'unit' => 'px',
                                ],
                                'submenu' => 'Side Cart body ( Product )'                            
                            ),
                            'stm_cart_product_padding' => array(
                                'type' => 'spacing',
                                'label' => esc_html__( 'Product padding', 'ajax-add-to-cart-for-woocommerce' ),
                                'units' => ['px', 'em'],
                                'value' => [
                                    'top' => '0',
                                    'right' => '15',
                                    'bottom' => '0',
                                    'left' => '15',
                                    'unit' => 'px',
                                ],
                                'submenu' => 'Side Cart body ( Product )'                            
                            ),
                            'stm_cart_product_details_position'         => self::addField('select',         esc_html__('Product Details position', 'ajax-add-to-cart-for-woocommerce'),                     'center', ['submenu' => 'Side Cart body ( Product )',           'options'       => self::cart_product_details_position_options()]),
                            'stm_cart_product_price_position'           => self::addField('select',         esc_html__('Quantity & Price position', 'ajax-add-to-cart-for-woocommerce'),                    'one_line', ['submenu' => 'Side Cart body ( Product )',           'options'       => self::cart_product_price_position_options()]),
                            'stm_cart_product_remove_icon' => array(
                                'type' => 'icon_picker',
                                'label' => esc_html__('Remove item icon', 'ajax-add-to-cart-for-woocommerce'),
                                'value' => [
                                    'icon' => 'fa fa-trash-alt',
                                    'size'  => 16,
                                    'color' => '#7d57b1',
                                ],
                                'submenu' => 'Side Cart body ( Product )'
                            ),
                            'stm_cart_product_remove_icon_color_hover'               => self::addField('color',          esc_html__('Remove item icon color on hover', 'ajax-add-to-cart-for-woocommerce'),                 '#ffd200',                  ['submenu' => 'Side Cart body ( Product )']),
                        ],
                    ],
                    'tab_advanced' => [
                        'name'      => esc_html__('Advanced', 'ajax-add-to-cart-for-woocommerce'),
                        'fields'    => [
                            'stm_custom_css'                                    => self::addField('ace_editor',     esc_html__('Custom CSS', 'ajax-add-to-cart-for-woocommerce'), null, ['lang' => 'css']),
                        ],
                    ],
                ],
        ];
            
            return $setups;
        });
    }

    private static function stm_cart_order_options() {
        return [
            'asc'       =>  __( 'New added products on bottom',    'ajax-add-to-cart-for-woocommerce' ), 
            'desc'      =>  __( 'New added products on top',   'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function basket_count_options() {
        return [
            'products_count'    =>  __( 'Total Unique products in a Cart',  'ajax-add-to-cart-for-woocommerce' ), 
            'products_quantity' =>  __( 'Total items in a Cart',            'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function product_variative_options() {
        return [
            'include'           =>  __( 'Include Variation',                    'ajax-add-to-cart-for-woocommerce' ),
            'do_not_include'    =>  __( 'Do not include Variation',             'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_height_options() {
        return [
            'full_height'          =>  __( 'Full Height',                       'ajax-add-to-cart-for-woocommerce' ),
            'auto_adjust'          =>  __( 'Auto Adjust',                       'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function open_from_options() {
        return [
            'right'             =>  __( 'Right side',                           'ajax-add-to-cart-for-woocommerce' ),
            'left'              =>  __( 'Left side',                            'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function basket_status_options() {
        return [
            'always_show'        =>  __( 'Always show',                          'ajax-add-to-cart-for-woocommerce' ),
            'always_hide'        =>  __( 'Always hide',                          'ajax-add-to-cart-for-woocommerce' ),
            'hide_when_empty'    =>  __( 'Hide when cart is empty',              'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function basket_counter_status_options() {
        return [
            'always_show'        =>  __( 'Always show',                          'ajax-add-to-cart-for-woocommerce' ),
            'always_hide'        =>  __( 'Always hide',                          'ajax-add-to-cart-for-woocommerce' ),
            'hide_when_empty'    =>  __( 'Hide when cart is empty',              'ajax-add-to-cart-for-woocommerce' ),
        ];
    }
    private static function basket_position_options() {
        return [
            'top'           =>  __( 'Top',                                      'ajax-add-to-cart-for-woocommerce' ),
            'bottom'        =>  __( 'Bottom',                                   'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function basket_count_position_options() {
        return [
            'top-right'     =>  __( 'Top right',                                'ajax-add-to-cart-for-woocommerce' ),
            'top-left'      =>  __( 'Top left',                                 'ajax-add-to-cart-for-woocommerce' ), 
            'bottom-right'  =>  __( 'Bottom right',                             'ajax-add-to-cart-for-woocommerce' ),
            'bottom-left'   =>  __( 'Bottom left',                              'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_header_heading_align_options() {
        return [
            'right'         =>  __( 'Right',    'ajax-add-to-cart-for-woocommerce' ),
            'center'        =>  __( 'Center',   'ajax-add-to-cart-for-woocommerce' ), 
            'left'          =>  __( 'Left',     'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_product_details_position_options() {
        return [
            'none'          =>  __( 'Top',          'ajax-add-to-cart-for-woocommerce' ),
            'center'        =>  __( 'Center',       'ajax-add-to-cart-for-woocommerce' ), 
            'space-between' =>  __( 'Stretched',    'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_product_price_position_options() {
        return [
            'one_line'     =>  __( 'One line',                                     'ajax-add-to-cart-for-woocommerce' ),
            'separately'   =>  __( 'Separately',                                 'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_footer_button_row_options() {
        return [
            'one'           =>  __( 'One in a row',                             'ajax-add-to-cart-for-woocommerce' ),
            'two'           =>  __( 'Two in first row',                         'ajax-add-to-cart-for-woocommerce' ),
            'three'         =>  __( 'Two in last row',                          'ajax-add-to-cart-for-woocommerce' ),
            'four'          =>  __( 'Three in one row',                         'ajax-add-to-cart-for-woocommerce' ),
        ];
    }

    private static function cart_footer_button_design_options() {
        return [
            'default'          =>  __( 'Use StickyWooCart design & colors',     'ajax-add-to-cart-for-woocommerce' ),
            'custom'           =>  __( 'Custom',                                'ajax-add-to-cart-for-woocommerce' ),
        ];
    }
}

?>