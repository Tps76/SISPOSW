<?php
require_once 'conexion.php';

class producto{
    public static function getAllProducto($idcatproducto){
        $sql = "SELECT idproducto,idproveedor,nombre_producto,venta_producto,imagen_producto,compra_producto FROM producto WHERE idcatproducto = ?, estado_producto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($idcatproducto,true));
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function insertProducto($datos){
        $sql = "INSERT INTO producto(idcatproducto,idproveedor,nombre_producto,venta_producto,imagen_producto,compra_producto) VALUES(?,?,?,?,?,?)";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["idcatproducto"],$datos["idproveedor"],$datos["nombre_producto"],$datos["venta_producto"],$datos["imagen_producto"],$datos["compra_producto"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function updateProducto($datos){
        $sql = "UPDATE producto SET idproveedor = ?,nombre_producto = ?,venta_producto = ?,imagen_producto = ?,compra_producto = ? WHERE idcatproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["idproveedor"],$datos["nombre_producto"],$datos["venta_producto"],$datos["imagen_producto"],$datos["compra_producto"],$datos["idcatproducto"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function desactivarProducto($id){
        $sql = "UPDATE producto SET estado_producto = false WHERE idproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function activarProducto($id){
        $sql = "UPDATE producto SET estado_producto = true WHERE idproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false; 
        }
    }

}