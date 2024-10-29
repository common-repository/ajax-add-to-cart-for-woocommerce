(function($) {

    $(document).on('click','.stm_swc-cart-btn, .stm_swc-overlay, .stm_swc-modal-close', function(event) { 
        $('.stm_swc-cart-btn').toggleClass('stm-active');
        $('.stm_swc-wrapper').toggleClass('stm-active');
        $('.stm_swc-modal').toggleClass('stm-active');
        $('body').toggleClass('stm-overflow-hidden');
    });

    $(document).on('ready', function() {
        setTimeout(() => $( document.body ).trigger( 'wc_fragment_refresh' ), 1);
    });
    
    $(document).on('input', 'input.stm_quantity_input', function() {
        if ($(this).val() > 99) $(this).val(99);
        else if($(this).val() < 1) $(this).val(1);
       

        var product_id = $(this).attr("data-product_id"),
            cart_item_key = $(this).attr("data-cart_item_key"),
            product_container = $(this).parents('.stm_swc-modal');
            quantity = $(this).val()

        product_container.addClass('loading');
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: "stm_swc_update_quantity",
                product_id: product_id,
                cart_item_key: cart_item_key,
                quantity: quantity
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