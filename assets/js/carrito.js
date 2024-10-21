$(document).ready(function() {
    // Incrementar la cantidad
    $(document).on('click', '.increase', function() {
        var $quantityInput = $(this).siblings('.quantity');
        var quantity = parseInt($quantityInput.val()) || 0;
        quantity++;
        var productId = $(this).data('id');
        updateCart(productId, quantity);
    });

    // Disminuir la cantidad
    $(document).on('click', '.decrease', function() {
        var $quantityInput = $(this).siblings('.quantity');
        var quantity = parseInt($quantityInput.val()) || 0;
        if (quantity > 1) {
            quantity--;
            var productId = $(this).data('id');
            updateCart(productId, quantity);
        }
    });

    // Eliminar producto
    $(document).on('click', '.remove', function() {
        var productId = $(this).data('id');
        $.ajax({
            url: 'includes/cart_action.php',
            type: 'POST',
            data: { action: 'update', id: productId, quantity: 0 },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    
    //Actualizar Carrito
    function updateCart(productId, quantity) {
        $.ajax({
            url: 'includes/cart_action.php',
            type: 'POST',
            data: { action: 'update', id: productId, quantity: quantity },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    location.reload(); // Recargar la página para reflejar los cambios
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    // Vaciar el carrito
    $('#clean-cart').on('click', function() {
        $.ajax({
            url: 'includes/cart_action.php',
            type: 'POST',
            data: { action: 'clear' }, // Enviamos la acción para vaciar el carrito
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    location.reload(); // Recargar la página para reflejar los cambios
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
