<?php 
class Controller {
    function __construct(){
        // echo '<p>Constructor base</p>';
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/'.$model.'Model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}