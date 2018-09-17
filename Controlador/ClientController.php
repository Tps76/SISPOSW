<?php

class ClientController
{
    public static function logIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // $id = $login[''];
            if (isset($_POST["correo_inicio"]) && isset($_POST["pass_inicio"])) {
                
                $datos = array(
                    "correo" => $_POST['correo_inicio'], 
                    "pass" => $_POST['pass_inicio']
                );
                $login = Usuario::loginUser($datos);
           
                if ($login != "error") {
                    $_SESSION['nueva'] = true;
                    if($login['tipo_usuario'] == 1){
                        $_SESSION['admin'] = true;
                    }elseif($login['tipo_usuario'] == 2){
                        $_SESSION['empleado'] = true;
                    }else{
                        $_SESSION['cliente'] = true;
                        // $_SESSION['cliente'][];
                    }
                    header("location:index.php");
                }
            }

        }
    }
    public static function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['tipo_identificacion'])) {

                $datos = array(
                    "id" => $_POST['id'],
                    "tipo_id" => $_POST['tipo_identificacion'],
                    "nombre" => $_POST['name'],
                    "apellido" => $_POST['last-name'],
                    "genero" => $_POST['genero'],
                    "fecha" => $_POST['date'],
                    "ciudad" => $_POST['ciudad'],
                    "dir" => $_POST['dir'],
                    "tel" => $_POST['cel'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['pass'],
                    "tipo" => 3
                );
                $identidad = Usuario::regId($datos);
                $usuario = Usuario::regUsuario($datos);
                if ($identidad && $usuario) {

                    $id = Usuario::getId($_POST['id']);
                    $email = $_POST['email'];
                    $idUsuario = Usuario::getIdUsuario($email);
                    if ($id && $idUsuario) {
                        $persona = Usuario::regPersona($datos, $id);

                        if ($persona) {
                            $idPersona = Usuario::getIdPersona($id);

                            if ($idPersona) {
                                $cliente = Usuario::regCliente($idUsuario, $idPersona);
                                if ($cliente) {
                                    header("location:index.php?action=index");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    
    public static function getProd()
    {
        $prods = producto::getViewProducto();
        if ($prods) {
            foreach ($prods as $prod) {
                echo '
                <div class="col-md-3 mar">
                    <div class="card">
                        <img src="'.$prod['imagen_producto'].'" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">'.$prod['nombre_producto'].'</h5>
                            <a href="#" class="btn btn-success">comprar</a>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detalle">ver más</a>
                        </div>
                    </div>
                </div>';
            }    
        }
    }

    public static function getCat()
    {
        # code...
    }

    public static function searchProds()
    {
        # code...
    }
}
