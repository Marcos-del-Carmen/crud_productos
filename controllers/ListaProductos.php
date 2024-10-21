<?php 
class ListaProductos extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->mensaje="Vista de productos";
        $this->view->productos = [];

    }
    
    function render() {
        $productos = $this->view->datos = $this->model->mostrar();
        $this->view->productos = $productos;
        $this->view->render('ListaProductos/index');
    }
}

?>