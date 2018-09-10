<?php

<<<<<<< HEAD
class categoria{
    public static getCategoriaProductoActivo(){
        $sql = "SELECT idcatproducto,nombre_categoria FROM categoria_producto WHERE estado_categoria = ?";
=======
class Categoria
{
    public static function getCategoriaProductoActivo(){
        $sql = "SELECT idcatproducto,nombre_categoria FROM categoria_producto WHERE estado_categoria = true";
>>>>>>> 3e33ea8c439f13f089a72c4b2f34458dd6a5075a
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array(true));
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function insertCategoriaProducto($nombre){
        $sql = "INSERT INTO categoria_producto(nombre_categoria) VALUES(?)";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($nombre));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function updateCategoriaProducto($nombre){
        $sql = "UPDATE categoria_producto SET nombre_categoria = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($nombre));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function desactivarCategoriaProducto($id){
        $sql = "UPDATE categoria_producto SET estado_categoria = false WHERE idcatproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public static function activarCategoriaProducto($id){
        $sql = "UPDATE categoria_producto SET estado_categoria = true WHERE idcatproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}