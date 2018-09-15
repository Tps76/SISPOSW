<?php

class Selects
{
    // País
    public function getPais()
    {
        $consulta = "SELECT * FROM pais WHERE estado_pais = 1 ORDER BY nombre_pais ASC";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
    }
    // Departamento
    public function getDepto($id)
    {
        $consulta = "SELECT * FROM departamento WHERE estado_departamento = 1 AND idpais = ? ORDER BY nombre_departamento ASC";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return "error";
        }
    }
    // Ciudad
    public function getCiudad($id)
    {
        $consulta = "SELECT * FROM ciudad WHERE estado_ciudad = 1 AND iddepartamento = ? ORDER BY nombre_ciudad ASC";
        $con = connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
    }
}
