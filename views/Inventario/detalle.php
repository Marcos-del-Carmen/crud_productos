<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>    
        <h1>Detalle del producto (<?php echo $this->producto->nombre; ?>)</h1>
        <div class="cont-alert">
            <?php // echo $this->mensaje;?> 
        </div>
        <div class="form-pro-new">
            <form action="<?php echo constant('URL');?>Inventario/actualizarProducto" method="POST">
                <div class="cont-inputt">
                    <input type="hidden" name="claveProducto" value="<?php echo $this->producto->claveProducto; ?>">
                </div>
                <div class="cont-input">
                    <label>Nombre</label> <br>
                    <input type="text"      name="nombre" value="<?php echo $this->producto->nombre; ?>">
                </div>
                <div class="cont-input">
                    <label>Precio</label> <br>
                    <input type="number"    name="precio" value="<?php echo $this->producto->precio; ?>">
                </div>
                <div class="cont-input">
                    <label>Cantidad</label> <br>
                    <input type="number"    name="cantidad" value="<?php echo $this->producto->cantidad; ?>">
                </div>
                <div class="cont-input">
                    <label>Categoría</label> <br>
                    <select name="categoria">
                        <option value="<?php echo $this->producto->claveCategoria; ?>" selected><?php echo $this->producto->claveCategoria; ?></option>
                        <option value="1">Cereales</option>
                        <option value="2">Lácteos</option>
                        <option value="3">Snacks</option>
                        <option value="4">Bebidas</option>
                        <option value="5">Cuidado Personal</option>
                    </select>
                </div>
                <div class="cont-input">
                    <label>Descripcion</label> <br>
                    <textarea name="descripcion" id=""><?php echo $this->producto->descripcion; ?></textarea>
                </div>
                <button type="submit" class="btn btn-guardar">Actualizar</button>
            </form>
        </div>
    </main>
    
</body>
</html>
