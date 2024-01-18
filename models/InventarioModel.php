<?php 
include_once 'models/Productos.php';
class InventarioModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function mostrar() {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT*FROM productos");

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
    }

    public function getById($id) {
        $item = new Productos();

        $query = $this->db->connect()->prepare("UPDATE productos SET ClaveProducto = :ClaveProducto");
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

    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE productos SET Nombre = :Nombre, Cantidad = :Cantidad, Precio = :Precio, Descripcion = :Descripcion, ClaveCategoria = :ClaveCategoria WHERE ClaveProducto = :ClaveProducto");
        try {   
            $query->execute([
                'Nombre'        => $item['Nombre'],
                'Precio'        => $item['Precio'],
                'Cantidad'      => $item['Cantidad'],
                'ClaveCategoria'=> $item['ClaveCategoria'],
                'Descripcion'   => $item['Descripcion']
            ]);
            return true;
        } catch(PDOExecption $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM productos WHERE ClaveProdcuto = :ClaveProducto");
        try{
            $query->execute([
                'ClaveProducto'=> $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}