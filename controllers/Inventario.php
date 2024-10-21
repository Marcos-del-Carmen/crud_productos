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

    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);
        session_start();
        $_SESSION['idProducto'] = $producto->claveProducto;
        $this->view->producto = $producto;
        $this->view->render('Inventario/detalle');
    }

    function actualizarProducto() {
        // session_start();
        // $claveProducto = $_SESSION['idProducto']; # obtener el valor del id apartir de una seccion para que no pueda ser modificada 
        $claveProducto = $_POST['claveProducto'];
        $nombre =       $_POST['nombre'];
        $precio =       $_POST['precio'];
        $cantidad =     $_POST['cantidad'];
        $categoria =    $_POST['categoria'];
        $descripcion =  $_POST['descripcion'];

        unset($_SESSION['idProducto']); # destruimos la seccion 

        $mensaje = "";

        if($this->model->update(
            [
            'claveProducto' =>$claveProducto,
            'nombre'        =>$nombre, 
            'precio'        =>$precio, 
            'cantidad'      =>$cantidad, 
            'categoria'     =>$categoria, 
            'descripcion'   =>$descripcion
            ]
        )){
            $producto = new Productos();
            $producto->claveProducto=$claveProducto; 
            $producto->nombre       =$nombre;
            $producto->precio       =$precio;
            $producto->cantidad     =$cantidad;
            $producto->categoria    =$categoria;
            $producto->descripcion  =$descripcion;

            $this->view->producto = $producto;
            $this->view->mensaje = "Se actualizo de manera correcta";
        } else {
            $this->view->mensaje = "No se actualizo el producto";
        } 
        $this->view->render('Inventario/detalle');
    }

    function eliminarProducto($param = null){
        $claveProducto = $param[0];

        if($this->model->delete($claveProducto)){
            //$this->view->mensaje = "Alumno eliminado correctamente";
            $mensaje = "Producto eliminado correctamente";
        }else{
            // mensaje de error
            //$this->view->mensaje = "No se pudo eliminar el alumno";
            $mensaje = "No se pudo eliminar el producto";
        }
        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}