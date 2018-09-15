<?php
class Usuario
{
    /* =========== REGISTRO ============ */
    public function regId($tipo, $numero)
    {
        $consulta = "INSERT INTO identidad (tipo_identidad, numero_identidad) VALUES (?, ?)";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$tipo,PDO::PARAM_STR);
        $stmt->bindParam(2,$numero,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }
    public function regPersona($datos)
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
        $stmt->bindParam(1, $datos['id'], PDO::PARAM_INT);
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
        //estado de usuario
        $consulta = "INSERT INTO usuario (email_usuario, password_usuario, tipo_usuario)VALUES(?,?,?)";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($consulta);
            $resultado->execute(array($datos["idusuario"],$datos["email_usuario"],$datos["password_usuario"],$datos["tipo_usuario"],$datos["estado_usuario"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
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
            return $stmt->fetchColumn();
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
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }else {
            return "error";
        }
        $stmt->close();
    }
    public function getIdUsuario($email)
    {
        // code...
    }
    /* =========== LOGIN USER ============ */
    public function loginUser($datos)
    {
        $consulta = "SELECT nickname, pass FROM users WHERE pass = ?";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(1,$datos['pass'],PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }else {
            return "error";
        }
    }
    // activar y desactivar usuario tabla usuario
    public function desactivarUsuario($id){
        $sql = "UPDATE usuario SET estado_proveedor = false WHERE idusuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function activarUsuario($id){
        $sql = "UPDATE usuario SET estado_proveedor = true WHERE idusuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($id));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public static function updateUsuario($datos){
        $sql = "UPDATE usuario SET email_usuario = ?,password_usuario = ? WHERE idusuario = ?";
        try{
            $resultado = connection::getInstance()->getBD()->prepare($sql);
            $resultado->execute(array($datos["idusuario"],$datos["password_usuario"]));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
