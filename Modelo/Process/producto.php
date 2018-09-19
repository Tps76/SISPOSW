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

    public function getProd($id)
    {
        $sql = "SELECT producto.idproducto, categoria_producto.nombre_categoria, proveedor.razon_social, producto.nombre_producto, producto.imagen_producto, producto.venta_producto, producto.compra_producto, stock.cantidad_stock FROM (((producto INNER JOIN stock ON producto.idproducto = stock.idproducto) INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor) INNER JOIN categoria_producto ON producto.idcatproducto = categoria_producto.idcatproducto) WHERE producto.idproducto = ? AND producto.estado_producto = true";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            $tabla = $resultado->fetch(PDO::FETCH_ASSOC);
            return $tabla;
        } catch (PDOException $e) {
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

    public static function updateProducto($datos, $id){
        $sql = "UPDATE producto SET idproducto = ?, idcatproducto = ?, idproveedor = ?, nombre_producto = ?, venta_producto = ?, imagen_producto = ?, compra_producto = ? WHERE idproducto = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos['code'], $datos['cat'], $datos["prov"], $datos["name"],$datos["priceSale"],$datos["img"], $datos["priceBuy"], $id)
            );
            return true;
        }catch(PDOException $e){
            return $e;
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

    public function updateStock($datos, $id)
    {
        $sql = "UPDATE stock s JOIN producto p ON s.idproducto = p.idproducto AND s.idproveedor = p.idproveedor SET s.idproveedor = p.idproveedor, s.idproducto = p.idproducto, s.cantidad_stock = ? WHERE s.idstock = ?";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["cant"], $id));
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function viewAllProductos()
    {
        $sql = "SELECT producto.idproducto, categoria_producto.nombre_categoria, proveedor.razon_social, producto.nombre_producto, producto.imagen_producto, producto.venta_producto, stock.cantidad_stock, stock.idstock FROM (((producto INNER JOIN stock ON producto.idproducto = stock.idproducto) INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor) INNER JOIN categoria_producto ON producto.idcatproducto = categoria_producto.idcatproducto) WHERE estado_producto = true";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute();
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function searchProds($dato)
    {
        $sql = "SELECT * FROM producto WHERE nombre_producto LIKE ?";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array("%".$dato."%"));
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $tabla;
        } catch (PDOException $e) {
            return $e;
        }
    }
}