$(document).ready(function() {
    // Manejar clic en "Agregar al Carrito"
    $('.add-to-cart').click(function() {
        var $productActions = $(this).closest('.product-actions');
        var $productQuantity = $productActions.siblings('.quantity-controls');
        var productId = $productActions.data('id');

        // Verifica si ya hay controles de cantidad, si no hay, agrégalo
        if ($productQuantity.hasClass('d-none')) {
            $productQuantity.removeClass('d-none');
        }
        
        // Actualiza la cantidad del producto en el carrito
        updateCart(productId, 1, function() {
            // Después de actualizar el carrito, actualiza el contador
            $productQuantity.find('.quantity').val(function(index, value) {
                return parseInt(value) + 1;
            });
        });
    });

    // Manejar aumento de cantidad
    $(document).on('click', '.increase', function() {
        var $quantityInput = $(this).siblings('.quantity');
        var quantity = parseInt($quantityInput.val());
        quantity++;
        var productId = $(this).closest('.quantity-controls').data('id');
        $quantityInput.val(quantity);
        updateCart(productId, quantity);
    });

    // Manejar disminución de cantidad
    $(document).on('click', '.decrease', function() {
        var $quantityInput = $(this).siblings('.quantity');
        var quantity = parseInt($quantityInput.val());
        if (quantity > 1) {
            quantity--;
            var productId = $(this).closest('.quantity-controls').data('id');
            $quantityInput.val(quantity);
            updateCart(productId, quantity);
        }
    });

    function updateCart(productId, quantity, callback) {
        $.ajax({
            url: 'includes/cart_action.php',
            type: 'POST',
            data: { action: 'update', id: productId, quantity: quantity },
            success: function(response) {
                console.log(response);
                if (callback) callback();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
});
