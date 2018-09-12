<?php

class Proveedor
{

    public function regProv()
    {
         //estado de proveedor
        $consulta = "INSERT INTO proveedor (idciudad,razon_social,nombre_proveedor,apellido_proveedor,direccion_proveedor,telefono_proveedor,email_proveedor)VALUES(?,?,?,?,?,?,?)";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($consulta);
            $resultado->execute(array($datos["idproveedor"],$datos["idciudad"],$datos["razon_social"],$datos["nombre_proveedor"],$datos["apellido_proveedor"],$datos["direccion_proveedor"],$datos["telefono_proveedor"],$datos["email_proveedor"],$datos["estado_proveedor"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function getAllProv()
    {
        $consulta = "SELECT * FROM proveedres";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }else{
            return "error";
        }
    }
    public function getProv($id, $nombre)
    {
        $consulta = "SELECT nombre_proveedor, apellido_proveedor, direccion_proveedor, telefono_proveedor, email_proveedor FROM proveedres WHERE idproveedor = ? OR nombre_proveedor = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id,PDO::PARAM_INT);
        $stmt->bindParam(2, $nombre,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }else{
            return "No se encontro proveedor";
        }
    }
    public function desactivarProveedor($id){
        $sql = "UPDATE provedor SET estado_proveedor = false WHERE idproveedor = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function activarProveedor($id){
        $sql = "UPDATE provedor SET estado_proveedor = true WHERE idproveedor = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public static function updateProveedor($datos){
        $sql = "UPDATE proveedor SET idciudad = ?,razon_social = ?,nombre_proveedor = ?,apellido_proveedor = ?,direccion_proveedor = ?,telefono_proveedor = ?,email_proveedor = ? WHERE idproveedor = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["idciudad"],$datos["razon_social"],$datos["nombre_proveedor"],$datos["apellido_proveedor"],$datos["direccion_proveedor"],$datos["telefono_proveedor"],$datos["email_proveedor"],$datos["estado_proveedor"],$datos["idproveedor"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    
}
