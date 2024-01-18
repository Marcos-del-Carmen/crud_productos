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
        <h1>Detalle de </h1>
        <div class="cont-alert">
            <?php echo $this->mensaje;?>
        </div>
        <div class="form-pro-new">
            <form action="<?php echo constant('URL');?>Consulta/actualizarProducto" method="POST">
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
                    <select name="categoria">
                        <option value="<?php echo $this->producto->claveCategoria; ?>" selected><?php echo $this->producto->claveCategoria; ?></option>
                        <option value="1">Cereales</option>
                        <option value="2">Lácteos</option>
                        <option value="3">Snacks</option>
                        <option value="4">Cuidado Personal</option>
                    </select>
                </div>
                <div class="cont-input">
                    <label>Descripcion</label> <br>
                    <textarea name="descripcion" id="" cols="30" rows="10" ><?php echo $this->producto->descripcion; ?></textarea>
                </div>
                <button type="submit">Actulizar</button>
            </form>
        </div>
    </main>
    
</body>
</html>
