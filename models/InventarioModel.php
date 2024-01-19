<?php 
include_once 'models/Productos.php';
class InventarioModel extends Model {
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
        } catch(PDOExeption $e) {
            return [];
        }
    } # funcionado 

    function getById($id) {
        $item = new Productos();

        $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE ClaveProducto = :ClaveProducto");
        try {
            $query->execute(['ClaveProducto' => $id]);

            while($row = $query->fetch()){
                $item->claveProducto    = $row['ClaveProducto'];
                $item->nombre           = $row['Nombre'];
                $item->precio           = $row['Precio'];
                $item->cantidad         = $row['Cantidad'];
                $item->claveCategoria   = $row['ClaveCategoria'];
                $item->descripcion      = $row['Descripcion'];

            }
            return $item;
        } catch(PDOException){
            return null;
        }

    } # obtenemos la informacion de la llave primaria de la tabla 

    public function update($item) { 
        $query = $this->db->connect()->prepare("UPDATE productos SET Nombre = :Nombre, Cantidad = :Cantidad, Precio = :Precio, Descripcion = :Descripcion, ClaveCategoria = :ClaveCategoria WHERE ClaveProducto = :ClaveProducto");
        try {
            $query->execute([
                'ClaveProducto'     =>$item['claveProducto'],
                'Nombre'            =>$item['nombre'],
                'Cantidad'          =>$item['cantidad'],
                'Precio'            =>$item['precio'],
                'Descripcion'       =>$item['descripcion'],
                'ClaveCategoria'    =>$item['categoria'],
            ]);
            return true;
        } catch(PDOExeption $e){
            return false;
        }
    }
    
    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM productos WHERE ClaveProducto = :id");
        try {
            $query->execute([
                'id'     => $id
            ]);
            return true;
        } catch(PDOExeption $e){
            return false;
        }
    }
}