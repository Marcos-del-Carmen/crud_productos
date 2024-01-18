<?php 
class View {
    function __construct(){
        // echo '<p>Base de vista</p>';
    }

    function render($nombre){
        require "views/$nombre.php";
    }
}