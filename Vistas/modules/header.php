<?php ClientController::register();
    $cart = new CarritoController();
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['cliente'])) {
        if (isset($_POST['compra'])) {
            $code = $_POST['compra'];
            if (empty($_POST['cantidad']) || !isset($_POST['cantidad'])) {
                $cantidad = 1;
            }else{
                $cantidad = $_POST['cantidad'];
            }
            $cart->addItem($code, $cantidad);
        }
    }
?>
<section class="col-md-2">
    <p class="align-middle m-0 text-white">Logo empresa</p>
</section>
<form method="post" class="col-md-7 search input-group m-0">
    <input class="form-control" type="search" name="buscar" id="search">
    <input class="search__btn" type="submit">
</form>
<section class="col-md-3 d-flex justify-content-end align-items-center">
    <p class="d-inline-block m-0">
    <?php
        if (isset($_SESSION["cliente"])) {
            print $_SESSION['cliente']['email_usuario'];
            // print($_SESSION['cliente']);
        ?>
    </p>
    <a href="#" data-toggle="modal" data-target="#carrito" class="text-success"><i class="material-icons align-middle">shopping_cart</i></a>
    <form method="post" class="d-inline-block">
        <button class="btn btn-primary" type="submit" name="cerrar">Cerrar Sesion</button>
    </form>
        
    <?php 
        } else {
    ?>
    <ul class="session text-right m-0 p-0">
        <li class="session__item"><a class="session__link text-white" data-placement="bottom" role="button" data-toggle="popover" data-title="" data-container="body"  data-html="true" href="#" id="login">Iniciar sesion  /</a></li>
        <li class="session__item"><a class="session__link text-white" href="#" id="signUp" data-toggle="modal" data-target="#regModal">Registrarse</a></li>
    </ul>
    <?php    
        }
    ?>
    <!-- Cuadro ingresar -->
    <?php //adminController::iniciar_sesion(); 
        if (isset($_POST['remove']) && isset($_SESSION['cliente'])) {
            $code = $_POST['remove'];
            $cart->removeItem($code);
        }
    ?>
    <div class="d-none" id="popover-content">
        <form method="post" class="form-group">
            
            <label for="username">Usuario:</label>
            <input class="form-control" type="text" name="correo_inicio" id="correo_inicio">
            <label for="userpassword">Contraseña</label>
            <input class="form-control" type="password" name="pass_inicio" id="pass_inicio">
            <input class="form-control mt-2" type="submit" value="Iniciar sesión">
        
        </form>
    </div>
    <!-- Cuadro de registro Modal -->
    <div class="modal " id="regModal" tabindex="-1" role="dialog">
        <div class="modal-dialog form-tam" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Seleccion de tipo de documento: </label>
                                <select class="form-control" name="tipo_identificacion" id="identificacion" onchange="validar()">
                                <option selected>tipo de documento</option>
                                <option value="cedula">Cedula</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="id">Identificación:</label>
                                <input type="text" class="form-control" name="id" id="id" onkeyup="validar_cliente()" onchange="validar_cliente()">
                            </div>
                        </div>
                        <div class="row mt-3"> 
                            <div class="col">
                                <label for="name">Nombres:</label>
                                <input type="text" class="form-control" name="name" id="name" onkeyup="validar(); eliminar_dif_texto(this)" onchange="validar(); eliminar_dif_texto(this)">
                            </div>
                            <div class="col">
                                <label for="last-name">Apellido:</label>
                                <input type="text" class="form-control" name="last-name" id="last-name" onkeyup="validar(); eliminar_dif_texto(this)" onchange="validar(); eliminar_dif_texto(this)">
                            </div>
                            <div class="col">
                                    <label for="genero">Genero: </label>
                                       <select class="form-control" name="genero" id="genero" onchange="validar()">
                                          <option selected>Seleccione su genero</option>
                                          <option value="m">Masculino</option>
                                          <option value="f">Femenino</option>
                                       </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <select name="pais" class="custom-select" id="pais" onchange="validar()">
                                    <option selected>Seleccione su país</option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="departamento" name="departamento" class="custom-select" onchange="validar()">
                                    <option selected>Seleccione su departamento</option>
                                </select> 
                            </div>
                            <div class="col">
                                <select id="ciudad" name="ciudad" class="custom-select" onchange="validar()" onchange="validar()">
                                    <option selected value="0">Seleccione su ciudad</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Fecha de nacimiento: </label>
                                <input type="date" name="date" id="nacimiento" class="form-control" max="3000-12-31" min="1000-01-01" onchange="validar()" />
                            </div>
                            <div class="col">
                                <label for="tel">Telefono:</label>
                                <input type="text" class="form-control" name="tel" id="tel" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="cel">Celular:</label>
                                <input type="text" class="form-control" name="cel" id="cel" onkeyup="validar()" onchange="validar()">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" id="emai" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="dir">Dirección:</label>
                                <input type="text" class="form-control" name="dir" id="dir" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="pass">Contraseña:</label>
                                <input type="password" class="form-control" name="pass" id="pass" onkeyup="validar()" onchange="validar()">
                            </div>
                        </div>               
                        <div class="text-right mt-3">
                            <input class="btn btn-success col-md-2 py-2" type="submit" value="Enviar" disabled="disabled" id="boton_enviar_registro">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- tabla compras Modal -->
    <div class="modal fade" id="carrito">
        <div class="modal-dialog form-tam">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Lista de productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>cantidad</th>
                                <th>precio c/u</th>
                                <th>accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cart->getItem(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan=2>subtotal</th>
                                <th colspan=2><?php $cart->getTotalpayment();?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Seguir Comprando</button>
                </div>
            </div>
        </div>
    </div>
</section>