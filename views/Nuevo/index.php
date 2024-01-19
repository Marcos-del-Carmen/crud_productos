<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>    
        <h1>Agrega un nuevo producto</h1>
        <div class="cont-alert">
            <?php echo $this->mensaje;?>
        </div>
        <div class="form-pro-new">
            <form action="<?php echo constant('URL');?>Nuevo/agregarProducto" method="POST">
                <div class="cont-input">
                    <label>Nombre</label> <br>
                    <input type="text"      name="nombre">
                </div>
                <div class="cont-input">
                    <label>Precio</label> <br>
                    <input type="number"    name="precio">
                </div>
                <div class="cont-input">
                    <label>Cantidad</label> <br>
                    <input type="number"    name="cantidad">
                </div>
                <div class="cont-input">
                    <label>Categoría</label> <br>
                    <select name="categoria"> 
                        <option value="" selected>-Selecciona una opción-</option>
                        <option value="1">Cereales</option>
                        <option value="2">Lácteos</option>
                        <option value="3">Snacks</option>
                        <option value="4">Bebidas</option>
                        <option value="5">Cuidado Personal</option>
                    </select>
                </div>
                <div class="cont-input">
                    <label>Descripcion</label> <br>
                    <textarea name="descripcion" id=""></textarea>
                </div>
                
                
                <button type="submit" class="btn btn-guardar">Agregar</button>
            </form>
        </div>
    </main>
    
</body>
</html>
