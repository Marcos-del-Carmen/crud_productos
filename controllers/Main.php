<?php 

class Main extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->mensaje="Bienvenido";
        $this->view->productos = [];
    }

    function render(){  
        $productos = $this->view->datos = $this->model->mostrar();
        $this->view->productos = $productos;
        $this->view->render('Main/index');
    }

    function saludo(){
        echo '<p>Ejecutaste el metodo saludo</p>';
    }
}