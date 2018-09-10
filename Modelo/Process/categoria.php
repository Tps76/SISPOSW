<?php
require_once '../Include/conexion.php'

class categoria{
    public static getCategoriaProductoActivo(){
        $sql = "SELECT idcatproducto,nombre_categoria FROM categoria_producto WHERE estado_categoria = '".true."'";
        $resultado = connection::getInstance()->getBD()->prepare($consultar);
        $resultado->execute();
        $tabla = 
    }
}