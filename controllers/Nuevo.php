<?php 
class Nuevo extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->mensaje="";
    }
    
    function render(){
        $this->view->render('Nuevo/index');
    }
    
    function agregarProducto() {
        $nombre =       $_POST['nombre'];
        $precio =       $_POST['precio'];
        $cantidad =     $_POST['cantidad'];
        $categoria =    $_POST['categoria'];
        $descripcion =  $_POST['descripcion'];

        $mensaje = "";
        if($this->model->insertar(
            [
            'nombre'        => $nombre, 
            'precio'        => $precio, 
            'cantidad'      => $cantidad, 
            'categoria'     => $categoria, 
            'descripcion'   => $descripcion
            ]
        )){
            $mensaje = "El producto repite el numero de serie";
        } else {
            $mensaje = "Se agrego un nuevo producto";
        } 

        $this->view->mensaje = $mensaje;
        $this->view->render('Nuevo/index');
    }

}