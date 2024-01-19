<?php 

require_once 'controllers/ErrorController.php';

class App {
    function __construct(){
        // echo "<p>Nueva app</p>";
        # Se deve de obtener la url del archivo y posteriormente hacer una separacion y indicar el contrador y los metedos a los que nos queremos diriguir

        $url = isset($_GET['url']) ? $_GET['url']: null;

        $url = rtrim($url, '/'); // rtrim() elimina las "/" 
        $url = explode('/', $url); // explote() busca los sepadores dentro de la variable $url
        // var_dump($url); // en la url podemos poner uno, dos y tres para ver como nos devuelve el valor
        # esta condicion se valida cuando se entra sin controlador
        if(empty($url[0])) {
            $archivoController = 'controllers/Main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('Main');
            $controller->render();
            return false;
        }

        $archivoController = "controllers/{$url[0]}.php";
        # Validamos que el archivo del controlador exista 
        if(file_exists($archivoController)){
            require_once $archivoController;

            # inicializa el controlador y modelo
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            $nparam = sizeof($url); # numero de elementos del arreglo
            if($nparam > 1) {
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i<$nparam; $i++) {
                        array_push($param, $url[$i]);
                        $controller->{$url[1]}($param);
                    }
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
            # Validamos que el metodo del controlador exista
        } else {
            $controller = new ErrorController();
        }
    }
}