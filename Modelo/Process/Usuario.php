<?php

class Usuario
{
    /* =========== REGISTRO ============ */
    public function regId($datos)
    {
        $consulta = "INSERT INTO identidad (tipo_identidad, numero_identidad) VALUES (?, ?)";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $datos['tipo_id'], PDO::PARAM_STR);
        $stmt->bindParam(2, $datos['id'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }
    public function regPersona($datos, $id)
    {
        // Consulta a realizar.
        $consulta = "INSERT INTO persona (ididentidad, nombre_persona, apellido_persona, genero, fecha_nacimiento, idciudad, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        // Establece la conexion.
        $con = Connection::getInstance();
        // Ingresa base de datos.
        $db = $con->getBD();
        // PDOStatement.
        $stmt = $db->prepare($consulta);
        // Parseo y asignación de datos.
        $stmt->bindParam(1, $id['ididentidad'], PDO::PARAM_INT);
        $stmt->bindParam(2, $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(3, $datos['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(4, $datos['genero'], PDO::PARAM_STR);
        $stmt->bindParam(5, $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(6, $datos['ciudad'], PDO::PARAM_INT);
        $stmt->bindParam(7, $datos['dir'], PDO::PARAM_STR);
        $stmt->bindParam(8, $datos['tel'], PDO::PARAM_STR);
        // Ejecucion de la Consulta y comprobación de su exito.
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }
        // cierre de la conexion.
        $stmt->close();
    }
    public function regUsuario($datos)
    {
        $consulta = "INSERT INTO usuario(email_usuario, password_usuario, tipo_usuario) VALUES (?,?,?)";
        // Establece la conexion.
        $con = Connection::getInstance();
        // Ingresa base de datos.
        $db = $con->getBD();
        // PDOStatement.
        $stmt = $db->prepare($consulta);
        // Parseo y asignación de datos.
        $stmt->bindParam(1, $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(2, $datos['pass'], PDO::PARAM_STR);
        $stmt->bindParam(3, $datos['tipo'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }
    public function regCliente($idUsuario, $idPersona)
    {
        $consulta = "INSERT INTO cliente(idpersona, idusuario) VALUES (?,?)";
        // Establece la conexion.
        $con = Connection::getInstance();
        // Ingresa base de datos.
        $db = $con->getBD();
        // PDOStatement.
        $stmt = $db->prepare($consulta);
        // Parseo y asignación de datos.
        $stmt->bindParam(1, $idPersona['idpersona'], PDO::PARAM_INT);
        $stmt->bindParam(2, $idUsuario['idusuario'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "success";
        } else {
            return "error";
        }
        $stmt->close();
    }
    
    /* =========== SELECCIONAR ============ */
    public function getId($numero)
    {
        $consulta = "SELECT ididentidad FROM identidad WHERE numero_identidad = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$numero,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
        $stmt->close();
    }
    public function getIdPersona($id)
    {
        $consulta = "SELECT idpersona FROM persona WHERE ididentidad = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$id['ididentidad'],PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
        $stmt->close();
    }
    public function getIdUsuario($email)
    {
        $consulta = "SELECT idusuario FROM usuario WHERE email_usuario = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        if ($stmt->execute()) { 
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
        $stmt->close();
    }
    /* =========== LOGIN USER ============ */
    public function loginUser($datos)
    {
        $consulta = "SELECT email_usuario, password_usuario, tipo_usuario FROM usuario WHERE password_usuario = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$datos['pass'],PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
    }
}
