<?php 
class Inventario extends Controller {
    function __construct(){
        parent::__construct();
        $this->view->mensaje="Inventario de nuestros productos";
        $this->view->productos = [];
    }
    function render(){
        $productos = $this->model->mostrar();
        // var_dump($productos);
        $this->view->productos = $productos;
        $this->view->render('Inventario/index');
        
    }
}