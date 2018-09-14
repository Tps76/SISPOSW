<?php

class producto{
    public static function getViewProducto()
    {
        $sql = "SELECT idproducto,idproveedor,nombre_producto,venta_producto,imagen_producto,compra_producto FROM producto WHERE estado_producto = true";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute();
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        } catch (PDOException $e) {
            return false;
        }
    }

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
        $sql = "INSERT INTO producto(idproducto, idcatproducto,idproveedor,nombre_producto,venta_producto,imagen_producto,compra_producto) VALUES(?,?,?,?,?,?,?)";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos['code'], $datos["cat"],$datos["prov"],$datos["name"],$datos["priceSale"],$datos["img"],$datos["priceBuy"]));
            return true;
        }catch(PDOException $e){
            return $e;
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

    public function addStock($datos)
    {
        $sql = "INSERT INTO stock(idproveedor, idproducto, cantidad_stock) VALUES(?,?,?)";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos['prov'], $datos["code"], $datos["cant"]));
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }
    public function viewAllProductos()
    {
        $sql = "SELECT producto.idproducto, producto.idcatproducto, proveedor.razon_social, producto.nombre_producto, producto.venta_producto, stock.cantidad_stock FROM ((producto INNER JOIN stock ON producto.idproducto = stock.idproducto) INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor)";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute();
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        } catch (PDOException $e) {
            return $e;
        }
    }
}