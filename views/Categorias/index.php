<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>    
        <h1><?php echo $this->mensaje;?></h1>

        <div class="form-pro-new">
            <form action="#" method="POST">
                <div class="cont-input">
                    <label>Nombre</label>
                    <input type="text"      name="nombre">
                </div>               
                
                <button type="submit" class="btn btn-guardar">Agregar</button>
            </form>
        </div>
    </main>
    
</body>
</html>
