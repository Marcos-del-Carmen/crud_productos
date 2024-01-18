<?php 

class NuevoModel extends Model {
    function __construct(){
        parent::__construct();
    }

    function insertar($datos) {
        $query = $this->db->connect()->prepare("INSERT INTO productos (Nombre, Cantidad, Precio, Descripcion, ClaveCategoria) VALUES (:Nombre, :Cantidad, :Precio, :Descripcion, :Categoria)");
        $query->execute(
            [
                'Nombre'        => $datos['nombre'], 
                'Cantidad'      => $datos['cantidad'], 
                'Precio'        => $datos['precio'], 
                'Descripcion'   => $datos['descripcion'], 
                'Categoria'     => $datos['categoria']
            ]
        );
    }
}