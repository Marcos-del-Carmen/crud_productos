$(document).ready(function() {
    // Inicializa la tabla DataTables
    $('#productsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
        "url": "includes/get_products.php", // Cambia esto a la ruta de tu archivo PHP que devuelve los datos de productos
            "type": "POST"
        },
        "columns": [
            { "data": "imagen" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "precio" },
            { "data": "categoria" },
            { "data": "acciones" }
        ],
        "columnDefs": [
            {
                "targets": "_all", // 0 es la columna de imagen y -1 es la última columna de acciones
                "orderable": false // Desactivar el ordenamiento para estas columnas
            }
        ],
        "pagingType": "simple_numbers",
        "pageLength": 10,
        "language": {
            "search": "Buscar:",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
        }
    });

    // Función para llenar el campo de categorías en los modales
    function loadCategories() {
    $.ajax({
        url: 'includes/get_categories.php',
        type: 'GET',
        dataType: 'json',
        success: function(categories) {
            var $categorySelects = $('#productCategory, #editProductCategory'); // Campos de selección en ambos modales
            $categorySelects.empty(); // Limpiar las opciones actuales

            $.each(categories, function(index, category) {
                $categorySelects.append(
                    $('<option></option>').val(category.id).text(category.nombre)
                );
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

// Cargar las categorías al cargar la página
loadCategories();

    // Maneja la apertura del modal de edición
    $('#productsTable').on('click', '.edit-btn', function() {
    var productId = $(this).data('id');
    
    $.ajax({
        url: 'includes/get_product.php',
        type: 'POST',
        data: { id: productId },
        dataType: 'json',
        success: function(data) {
            $('#editProductId').val(data.id);
            $('#editProductName').val(data.nombre);
            $('#editProductDescription').val(data.descripcion);
            $('#editProductPrice').val(data.precio);
            
            $('#editProductCategory').val(data.categoria_id);

            // Mostrar la imagen actual
            if (data.imagen) {
                $('#currentImage').attr('src', 'assets/images/' + data.imagen);
            } else {
                $('#currentImage').attr('src', '');
            }

            $('#editProductModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});

    // Variable para almacenar el ID del producto que se va a eliminar
    var productIdToDelete = null;

    // Mostrar el modal de confirmación de eliminación
    $('#deleteProductModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        productIdToDelete = button.data('id'); // Obtener el ID del producto a eliminar
    });

    // Manejar la confirmación de eliminación
    $('#confirmDeleteBtn').on('click', function() {
        $.ajax({
            url: 'includes/delete_product.php',
            type: 'POST',
            data: { id: productIdToDelete },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#productsTable').DataTable().ajax.reload(); // Recargar la tabla de productos
                    $('#deleteProductModal').modal('hide');
                    //alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error al eliminar el producto.');
            }
        });
    });

    // Maneja el envío del formulario de agregar producto
    $('#addProductForm').submit(function(event) {
        event.preventDefault();
        
        // Crear un objeto FormData para enviar los datos del formulario
        var formData = new FormData(this);
        
        $.ajax({
            url: 'includes/add_product.php',  // Ruta al archivo PHP en la carpeta includes
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Maneja la respuesta del servidor aquí
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    // Cierra el modal
                    $('#addProductModal').modal('hide');
                    
                    // Recarga la tabla de productos
                    $('#productsTable').DataTable().ajax.reload();
                } else {
                    // Muestra mensaje de error
                    alert(result.message);
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores aquí
                console.error('Error:', error);
            }
        });
    });

    // Maneja el envío del formulario de editar producto
        $('#editProductForm').submit(function(event) {
        event.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: 'includes/edit_product.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $('#editProductModal').modal('hide');
                $('#productsTable').DataTable().ajax.reload(); // Recargar la tabla de productos
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});