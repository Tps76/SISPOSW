<?php

class adminController
{
    public static function Template()
    {
        $template = "Vistas/template.php";
        include $template;
    }
    
    public static function RutaAdminController()
    {
        if (isset($_GET['action'])) {
            $enlace = $_GET['action'];
            $vista = Ruta::rutaAdmin($enlace);
        }else{
            $vista = "Vistas/modules/panel.php";
        }
        include $vista;
    }
    public static function RutaClienteController()
    {
        if (isset($_GET['action'])) {
            $enlace = $_GET['action'];
            $vista = Ruta::rutaCliente();
        } else {
            $vista = "Vistas/modules/products.php";
        }
        include $vista;
    }
    //registro julian
    public function registrar()
    {
        if (isset($_POST["id"]) && isset($_POST["tipo_identificacion"]) && isset($_POST["name"]) && isset($_POST["last-name"]) && isset($_POST["genero"]) && isset($_POST["ciudad"]) && isset($_POST["tel"]) && isset($_POST["cel"]) && isset($_POST["emai"]) && isset($_POST["dir"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["tipo_usuario"])) {
            $id = $_POST['id'];
            $tipo_identificacion = $_POST['tipo_identificacion'];
            $name = $_POST['name'];
            $last_name = $_POST['last-name'];
            $genero = $_POST['genero'];
            $ciudad = $_POST['ciudad'];
            $date = $_POST['date'];
            $telefono = $_POST['tel'];
            $celular = $_POST['cel'];
            $email = $_POST['emai'];
            $direccion = $_POST['dir'];
            $user = $_POST['user'];
            $password = $_POST['pass'];
            $tipo_usuario = $_POST['tipo_usuario'];
            if ($tipo_usuario == "administrador") {
                $tipo_final = 1;
            } else if ($tipo_usuario == "empleado") {
                $tipo_final = 2;
            } else {
                $tipo_final = 3;
            }
        //echo $id." ".$name." ".$last_name." ".$genero." ".$ciudad." ".$date." ".$telefono." ".$celular." ".$email." ".$direccion."".$user." ".$password." ".$tipo_final;
            $consulta_identidad = "INSERT INTO identidad(tipo_identidad,numero_identidad) VALUES('$tipo_identificacion','$id')";
            if ($resultado_identidad = consultas::insertar($consulta_identidad) == "insertado") {
                $consulta_seleccionar_id = "SELECT ididentidad FROM identidad WHERE numero_identidad=$id";
                $resultado_seleccionar_id = consultas::seleccionar($consulta_seleccionar_id);
                $consulta_persona = "INSERT INTO persona(ididentidad,nombre_persona,apellido_persona,genero,fecha_nacimiento,idciudad,direccion,telefono,estado_persona) VALUES('$resultado_seleccionar_id[0]','$name','$last_name','$genero','$date','$ciudad','$direccion','$telefono',0)";
                if ($resultado_persona = consultas::insertar($consulta_persona) == "insertado") {
                    $consulta_usuario = "INSERT INTO usuario(email_usuario,password_usuario,tipo_usuario,estado_usuario) VALUES('$email','$password','$tipo_final',0)";
                    if ($conresultado_usuario = consultas::insertar($consulta_usuario) == "insertado") {
                        $consultas = "registrado";
                        header("Location: ../Vistas/index.php?msg=$consultas");
                    } else {
                        $consultas = "no registrado";
                        header("Location: ../Vistas/index.php?msg=$consultas");
                    }
                } else {
                    $consultas = "no registrado";
                    header("Location: ../Vistas/index.php?msg=$consultas");
                }
            } else {
                $consultas = "no registrado";
                header("Location: ../Vistas/index.php?msg=$consultas");
            }
        }
    }
    //iniciar sesion Manuel Morales y julian :3
    public function iniciar_sesion()
    {
        session_start();
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $user = $_POST['user'];
            $password = $_POST['pass'];
            //echo $user+" "+$password;
            $consulta = "SELECT * FROM usuario WHERE email_usuario='$user' AND password_usuario='$password'";
            $consultas = consultas::seleccionar($consulta);
            if ($consultas["idusuario"] != "") {
                $_SESSION["nueva"] = $consultas;
                $consultas = "Bienvenido " . $consultas["idusuario"];

                header("Location: ../Vistas/index.php?msg=$consultas");
            } else {
                $consultas = "Datos incorrectos, sesion no iniciada";
                header("Location: ../Vistas/index.php?msg=$consultas");
            }
        }

    }
    public function cerrar_sesion()
    {
        session_start();
        session_unset();
        session_destroy(); //no se si esta se debe hacer para guardar las configuraciones que haga el cliente
        $consulta = "Sesion cerrada";
        header("Location: ../Vistas/index.php?msg=$consultas");
    }
}