<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
    <?php include_once 'views/enlaces-head.php';?>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>    
        <!-- <h1><?php echo $this->mensaje;?></h1> ESTE BIEN PUEDE SER EL TITULO DEL APARTADO -->
        <div class="container mt-5">
            <div class="row row-cols-auto">
                <?php foreach ($this->productos as $producto) : ?>
                    <div class="col m-2">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto->nombre; ?></h5>
                                <p class="card-text"><?php echo $producto->descripcion; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">$<?php echo $producto->precio; ?> <?php echo $producto->cantidad; ?></li>
                            </ul>
                            <div class="card-body">
                                <!-- <a href="#" class="card-link">Card link</a> -->
                                <a href="#" class="card-link">AGREGAR</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>
