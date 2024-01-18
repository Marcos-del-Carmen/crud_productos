<?php 

class Main extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->mensaje="Bienvenido";
    }
    function render(){
        
        $this->view->render('Main/index');
    }

    function saludo(){
        echo '<p>Ejecutaste el metodo saludo</p>';
    }
}