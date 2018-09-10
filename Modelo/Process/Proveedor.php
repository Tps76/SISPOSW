<?php

class Proveedor
{

    public function regProv()
    {
         
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
}
