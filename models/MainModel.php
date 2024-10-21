<?php 
    include_once 'models/Productos.php';
    class MainModel extends Model {
        function __construct(){
            parent::__construct();
        }

        function mostrar() {
            $items = [];
            try {
                $query = $this->db->connect()->query("SELECT * FROM productos");
    
                while($row = $query->fetch()) {
                    $item = new Productos();
                    $item->claveProducto    = $row['ClaveProducto'];
                    $item->nombre           = $row['Nombre'];
                    $item->precio           = $row['Precio'];
                    $item->cantidad         = $row['Cantidad'];
                    $item->claveCategoria   = $row['ClaveCategoria'];
                    $item->descripcion      = $row['Descripcion'];
                    
                    // var_dump($items); 
                    
                    array_push($items, $item);
                }
                return $items;
            } catch(PDOException $e) {
                return [];
            }
        }
    }
?>