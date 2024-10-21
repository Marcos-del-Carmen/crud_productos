<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO</title>
    <?php include_once 'views/enlaces-head.php';?>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>    
        <h1><?php echo $this->mensaje;?></h1>
        <?php 
            // echo '<pre>';
            // var_dump($this->productos); 
            // echo '</pre>';
        ?>
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->productos as $producto) : ?>
                        <tr>
                            <td scope="row"><?php echo $producto->nombre; ?></td>
                            <td>$<?php echo $producto->precio; ?></td>
                            <td><?php echo $producto->cantidad; ?></td>
                            <td><?php echo $producto->claveCategoria; ?></td>
                            <td><?php echo $producto->descripcion; ?></td>
                            <td><a class="btn btn-warning" href="<?php echo constant('URL').'Inventario/verProducto/'.$producto->claveProducto; ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="<?php echo constant('URL').'Inventario/eliminarProducto/'.$producto->claveProducto; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
</body>
</html>
