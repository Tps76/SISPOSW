<?php

class Carrito
{
    public function searchItem($id)
    {
        $consulta = "SELECT producto.idproducto, categoria_producto.nombre_categoria, proveedor.razon_social, producto.nombre_producto, producto.venta_producto, stock.cantidad_stock FROM (((producto INNER JOIN stock ON producto.idproducto = stock.idproducto) INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor) INNER JOIN categoria_producto ON producto.idcatproducto = categoria_producto.idcatproducto) WHERE producto.idproducto = ? AND producto.estado_producto = true";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }else{
            return 0;
        }
    }
}
