<?php 

class ErrorController extends Controller{
    function __construct() {
        parent::__construct();
        $this->view->mensaje="Error al cargar los recursos desde el controlador";
        $this->view->render('ErrorController/index');
        
    }

    
}