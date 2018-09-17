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
                // echo $login['tipo_usuario'];
                if ($login != "error") {
                    if($login['tipo_usuario'] == 1){
                        $_SESSION['admin'] = true;
                        $_SESSION['admin']['user'] = $login;
                    }elseif($login['tipo_usuario'] == 2){
                        $_SESSION['empleado'] = true;
                        $_SESSION['empleado']['user'] = $login;
                    }else{
                        // $_SESSION['cliente'] = true;
                        $_SESSION['cliente'] = $login;
                        print_r($login);
                        // $_SESSION['cliente'][];
                    }
                    $_SESSION['nueva'] = true;
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
        $prods = producto::viewAllProductos();
        if ($prods) {
            $i = 1;
            foreach ($prods as $prod) {
                // echo $prod['imagen_producto'];
                if ($prod['imagen_producto'] == null) {
                    $prod['imagen_producto'] = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_164eefd60a6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_164eefd60a6%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
                }
                echo '
                        <div class="col-md-3 card-group">
                            <div class="card">
                                <img src="'.$prod['imagen_producto'].'" alt="" class="card-img-top">
                                <div class="card-body p-2">
                                    <h5 class="card-title">'.$prod['nombre_producto'].'</h5>
                                    <div>
                                        <form class="d-inline-block" method="post">
                                            <button name="compra" value="'.$prod['idproducto'].'" class="btn btn-success">comprar</button>
                                        </form>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#detalle'.$i.'">ver más</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    /*============== Ventana Modal =================== */    
                echo '<div class="modal fade" id="detalle'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="title">'.$prod['nombre_producto'].'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-7">
                                    <img class="img-fluid" src="'.$prod['imagen_producto'].'" alt="">
                                </div>
                                <div class="col-5 d-flex flex-column justify-content-center">
                                    <p>Precio del producto: </p>
                                    <p class="align-self-end pr-4">'.$prod['venta_producto']. '</p>
                                    <p>Cantidad: </p>
                                    <form method="post" class="d-inline-block">
                                    <input name="cantidad" class="d-block w-100 form-control" type="number" value="1" min="1" max="'.$prod['cantidad_stock'].'">                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="submit" name="compra" value="'.$prod['idproducto'].'" class="btn btn-success">Añadir al carrito</button>
                            </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                        </div>
                        </div>
                    </div>';
                $i++;    
            }    
        }
    }

    public static function getCat()
    {
        $tabla = Categoria::getCategoriaProductoActivo();
        foreach($tabla as $resultados){
            echo '<li class="menu__item"><a class="menu__link" href="#"> ' . $resultados['nombre_categoria'] . '</a></li>';
        }
    }

    public static function searchProds()
    {
        # code...
    }

    // public static function addCart()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //         if (isset($_POST['compra'])) {
    //             $code = $_POST['compra'];
    //             if (empty($_POST['cantidad']) || !isset($_POST['cantidad'])) {
    //                 $cantidad = 1;
    //             }else{
    //                 $cantidad = $_POST['cantidad'];
    //             }
    //             $add =CarritoController::addItem();
    //             // echo($add);
    //             if ($add) {
    //                 header('location:index.php');
    //             }
    //         }
    //     }
    // }

    // public function getItems()
    // {
        
    // }

}
