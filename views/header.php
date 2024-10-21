<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.png" alt="Hamburguesas Darly" style="height: 90px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('URL'); ?>Main"><i class="fas fa-home"></i> INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-users"></i> NOSOTROS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('URL'); ?>ListaProductos"><i class="fas fa-hamburger"></i> PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sort-amount-down-alt"></i> CATEGORIAS
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">HAMBURGESAS</a></li>
                            <li><a class="dropdown-item" href="#">BEBIDAS</a></li>
                            <li><a class="dropdown-item" href="#">POSTRES</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger ml-3" href="#"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger ml-3" href="#"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>