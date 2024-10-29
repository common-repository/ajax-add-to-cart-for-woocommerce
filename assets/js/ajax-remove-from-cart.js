(function ($) {

    // Ajax delete product in the cart
    $(document).on('click', '.stm_swc-modal a.remove_from_cart', function (e)
    {
        e.preventDefault();
  
        var product_id = $(this).attr("data-product_id"),
            cart_item_key = $(this).attr("data-cart_item_key"),
            product_container = $(this).parents('.stm_swc-modal');
  
        product_container.addClass('loading');
  
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: "stm_swc_product_remove",
                product_id: product_id,
                cart_item_key: cart_item_key
            },
            success: function(response) {
                if ( ! response || response.error )
                    return;
  
                var fragments = response.fragments;
  
                // Replace fragments
                if ( fragments ) {
                    $.each( fragments, function( key, value ) {
                        $( key ).replaceWith( value );
                    });
                }
  
  
                $('.stm_swc-cart-btn').addClass('stm-active');
                $('.stm_swc-wrapper').addClass('stm-active');
                $('.stm_swc-modal').addClass('stm-active');
                $('body').addClass('stm-overflow-hidden');
                product_container.removeClass('loading');
            }
        });
    });
  
  })(jQuery);