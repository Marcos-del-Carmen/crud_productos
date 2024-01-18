<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitados</title>
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
        
        <?php 
            // Verifica si $this->productos es un array
            if (is_array($this->productos) && !empty($this->productos)) {
                // Muestra una tabla con encabezados
                echo '<table border="1">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Nombre</th>';
                echo '<th>Precio</th>';
                echo '<th>Cantidad</th>';
                echo '<th>Categoría</th>';
                echo '<th>Descripción</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Itera sobre cada objeto en el array y muestra los datos en filas de la tabla
                foreach ($this->productos as $producto) {
                    echo '<tr>';
                    echo '<td>' . $producto->nombre . '</td>';
                    echo '<td>' . $producto->precio . '</td>';
                    echo '<td>' . $producto->cantidad . '</td>';
                    echo '<td>' . $producto->claveCategoria . '</td>';
                    echo '<td>' . $producto->descripcion . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                // Imprime información de depuración
                echo '<p>Variable $this->productos no es un array o está vacío.</p>';
                echo '<p>Tipo de variable: ' . gettype($this->productos) . '</p>';
                echo '<p>Valor de la variable: ' . print_r($this->productos, true) . '</p>';
            }
        ?>
    </main>
    
</body>
</html>
