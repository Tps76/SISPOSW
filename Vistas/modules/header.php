<section class="col-md-2">
    <p class="align-middle">Logo empresa</p>
</section>
<section class="col-md-7 input-group">
        <input class="search form-control" type="search" name="search" id="search" method="POST">
        <input class="search__btn" type="submit" value="Buscar">
</section>
<section class="col-md-3">
    <?php
        if (isset($_SESSION["nueva"])) {
        ?>
    <a href="/SISPOW_WEB/Controlador/Controlador.php?accion=cerrar_sesion" class="btn waves-effect waves-light">Cerrar sesion</a>';
    <?php 
        } else {
    ?>
    <ul class="session text-right">
        <li class="session__item"><a class="session__link" data-placement="bottom" role="button" data-toggle="popover" data-title="" data-container="body"  data-html="true" href="#" id="login">Iniciar sesion  /</a></li>
        <li class="session__item"><a class="session__link" href="#" id="signUp" data-toggle="modal" data-target="#regModal">Registrarse</a></li>
    </ul>
    <?php    
        }
    ?>
    <!-- Cuadro ingresar -->
    <div class="d-none" id="popover-content">
        <form action="../Controlador/Controlador.php?accion=iniciar_sesion" method="post" class="form-group">
            
            <label for="username">Usuario:</label>
            <input class="form-control" type="text" name="user" id="username">
            <label for="userpassword">Contraseña</label>
            <input class="form-control" type="password" name="pass" id="userpassword">
            <input class="form-control" type="submit" value="Iniciar sesión">
        
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
                    <form action="../Modelo/process/Usuario.php/action=regId" method="post" class="form-group">
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
                                <input type="text" class="form-control" name="id" id="id" onkeyup="validar()" onchange="validar()">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="name">Nombres:</label>
                                <input type="text" class="form-control" name="name" id="name" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="last-name">Apellido:</label>
                                <input type="text" class="form-control" name="last-name" id="last-name" onkeyup="validar()" onchange="validar()">
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
                                <select name="pais" class="custom-select" id="pais">
                                    <option selected>Seleccione su país</option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="departamento" name="departamento" class="custom-select">
                                    <option selected>Seleccione su departamento</option>
                                </select> 
                            </div>
                            <div class="col">
                                <select id="ciudad" name="ciudad" class="custom-select" onchange="validar()">
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
                                <input type="text" class="form-control" name="emai" id="emai" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="dir">Dirección:</label>
                                <input type="text" class="form-control" name="dir" id="dir" onkeyup="validar()" onchange="validar()">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="user">Usuario:</label>
                                <input type="text" class="form-control" name="user" id="user" onkeyup="validar()" onchange="validar()">
                            </div>
                            <div class="col">
                                <label for="pass">Contraseña:</label>
                                <input type="text" class="form-control" name="pass" id="pass" onkeyup="validar()" onchange="validar()">
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
</section>