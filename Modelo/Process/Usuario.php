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
    public function regEmpleado($idUsuario, $idPersona, $cargo)
    {
        $consulta = "INSERT INTO trabajador(idpersona, idusuario, idcargo) VALUES (?,?,?)";
        // Establece la conexion.
        $con = Connection::getInstance();
        // Ingresa base de datos.
        $db = $con->getBD();
        // PDOStatement.
        $stmt = $db->prepare($consulta);
        // Parseo y asignación de datos.
        $stmt->bindParam(1, $idPersona['idpersona'], PDO::PARAM_INT);
        $stmt->bindParam(2, $idUsuario['idusuario'], PDO::PARAM_INT);
        $stmt->bindParam(3, $cargo, PDO::PARAM_INT);
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
    
    public function getClientes()
    {
        $consulta = "SELECT * FROM clientev WHERE estado = true";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
        $stmt->close();
    }

    public function getEmpleados()
    {
        $consulta = "SELECT * FROM trabajadorv WHERE estado = true";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
        $stmt->close();
    }

    public function getEmpleado($id, $email)
    {
        $consulta = "SELECT * FROM trabajadorv WHERE numero_identidad LIKE ? OR email_usuario LIKE ? AND estado = true";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id, PDO::PARAM_INT );
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return "error";
        }
        $stmt->close();
    }

    public function getCliente($id, $email)
    {
        $consulta = "SELECT * FROM clientev WHERE numero_identidad LIKE ? OR email_usuario LIKE ? AND estado = true";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
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
        try{

            $consulta = "SELECT * FROM usuario WHERE email_usuario = ? AND password_usuario = ?";
            $con = Connection::getInstance();
            $db = $con->getBD();
            $stmt = $db->prepare($consulta);
            $stmt->bindParam(1,$datos['correo'],PDO::PARAM_STR);
            $stmt->bindParam(2,$datos['pass'],PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return "error";
        }
    }
    // activar y desactivar usuario tabla usuario
    public function desactivarUsuario($email){
        $sql = "UPDATE usuario SET estado_usuario = false WHERE email_usuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($email));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function activarUsuario($email){
        $sql = "UPDATE usuario SET estado_usuario = true WHERE email_usuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($email));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public static function updateIdentidad($datos, $id)
    {
        $sql = "UPDATE identidad SET numero_identidad = ? WHERE numero_identidad = ?";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["id"], $id));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function updatePersona($datos, $persona)
    {
        $sql = "UPDATE persona SET nombre_persona = ?, apellido_persona = ?, genero = ?, fecha_nacimiento = ?, idciudad = ?, direccion = ?, telefono = ? WHERE idpersona = ?";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["nombre"], $datos["apellido"], $datos["genero"], $datos["fecha"], $datos["ciudad"], $datos["dir"], $datos["tel"], $persona));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function updateEmpleado($datos, $persona)
    {
        $sql = "UPDATE trabajador SET idcargo = ? WHERE idpersona = ?";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["cargo"], $persona));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function updateUsuario($datos, $email){
        $sql = "UPDATE usuario SET email_usuario = ?,password_usuario = ? WHERE email_usuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["email"],$datos["pass"], $email));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function countCli()
    {
        $sql = "SELECT count(idcliente) FROM cliente";
        try {
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute();
            $tabla = $resultado->fetch(); 
            return $tabla;
        } catch (PDOException $e) {
            return false;
        }
    }

}
