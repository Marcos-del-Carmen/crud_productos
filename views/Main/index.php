<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburguesas Darly</title>
    <?php include_once 'views/enlaces-head.php';?>
</head>
<body>
    <?php include_once 'views/header.php';?>
    <main>
        <div class="container-fluid p-0">
            <section id="hero" class="text-white text-center d-flex align-items-center justify-content-center">
                <div id="heroCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/clasico.jpg" class="d-block w-100" alt="Hamburguesa clásica">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/principal.jpg" class="d-block w-100" alt="Hamburguesa principal">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/papitas.jpg" class="d-block w-100" alt="Papas fritas">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/rompope.jpg" class="d-block w-100" alt="Bebida de rompope">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/mango.jpg" class="d-block w-100" alt="Bebida de mango">
                        </div>
                    </div>
    
                    <!-- Controles del Carrusel -->
                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
    
                <div class="container position-absolute top-50 start-50 translate-middle text-center" style="z-index: 10;">
                    <h1 class="display-4 font-weight-bold">Hamburguesas Darly</h1>
                    <p class="lead">¡Las mejores hamburguesas de la ciudad!</p>
                    <a href="#productos" class="btn btn-custom btn-lg mt-4">
                        <i class="fas fa-utensils"></i> Hacer Pedido
                    </a>
                </div>
            </section>
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
            <section id="nosotros" class="text-dark d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <!-- Columna de Espacio Vacío (Izquierda) -->
                        <div class="col-md-6 d-none d-md-block"></div>
                        <!-- Columna de Contenido (Derecha) -->
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h2 class="font-weight-bold">Nosotros</h2>
                            <p class="lead mt-4">En Hamburguesas Darly, preparamos productos frescos y de alta calidad al momento, exclusivamente para entrega a domicilio. Cada bocado está diseñado para ofrecerte una experiencia gastronómica única. Agradecemos tu paciencia con el tiempo de entrega, ya que cocinamos cada pedido con esmero.</p>
                            <a href="https://wa.me/7561332581" target="_blank" class="btn btn-custom btn-lg mt-4">
                                <i class="fab fa-whatsapp"></i> Contáctanos
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
    </main>
    <?php include_once 'views/footer.php';?>
    <?php include_once 'views/enlaces-pie.php';?>
</body>
</html>
