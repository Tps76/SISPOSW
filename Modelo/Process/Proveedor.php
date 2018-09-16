<?php

class Proveedor
{

    public function regProv($datos)
    {
        $consulta = "INSERT INTO proveedor(idproveedor, idciudad, razon_social, nombre_proveedor, apellido_proveedor, direccion_proveedor, telefono_proveedor, email_proveedor) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$datos['code'],PDO::PARAM_INT);
        $stmt->bindParam(2,$datos['ciudad'],PDO::PARAM_INT);
        $stmt->bindParam(3,$datos['RS'],PDO::PARAM_STR);
        $stmt->bindParam(4,$datos['name'],PDO::PARAM_STR);
        $stmt->bindParam(5,$datos['lastName'],PDO::PARAM_STR);
        $stmt->bindParam(6,$datos['dir'],PDO::PARAM_STR);
        $stmt->bindParam(7,$datos['contact'],PDO::PARAM_STR);
        $stmt->bindParam(8,$datos['email'],PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllProv()
    {
        $consulta = "SELECT * FROM proveedor WHERE estado_proveedor = true";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return "error";
        }
    }
    public function getProv($id, $nombre)
    {
        $consulta = "SELECT idproveedor, razon_social, nombre_proveedor, apellido_proveedor, direccion_proveedor, telefono_proveedor, email_proveedor FROM proveedor WHERE idproveedor LIKE ? OR nombre_proveedor LIKE ? AND estado_proveedor = true";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id,PDO::PARAM_INT);
        $stmt->bindParam(2, $nombre,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return "No se encontro proveedor";
        }
    }
    public function activarProveedor($id)
    {
        $consulta = "UPDATE proveedor SET estado_proveedor = true WHERE idproveedor = ?";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }
    public function desactivarProveedor($id)
    {
        $consulta = "UPDATE proveedor SET estado_proveedor = false WHERE idproveedor = ?";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateProv($datos, $id)
    {
        $consulta = "UPDATE proveedor SET idproveedor = ?, idciudad = ?, razon_social = ?, nombre_proveedor = ?, apellido_proveedor = ?, direccion_proveedor = ?, telefono_proveedor = ?, email_proveedor = ? WHERE idproveedor = ?";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $datos['id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $datos['ciudad'], PDO::PARAM_INT);
        $stmt->bindParam(3, $datos['RS'], PDO::PARAM_STR);
        $stmt->bindParam(4, $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(5, $datos['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(6, $datos['dir'], PDO::PARAM_STR);
        $stmt->bindParam(7, $datos['tel'], PDO::PARAM_STR);
        $stmt->bindParam(8, $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(9, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}