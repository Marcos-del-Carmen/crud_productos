<?php 
class Categorias extends Controller {
    function __construct(){
        parent::__construct();
        $this->view->mensaje="Agrega tu nueva categoria";
    }
    
    function render() {
        $this->view->render('Categorias/index');
        
    }
}