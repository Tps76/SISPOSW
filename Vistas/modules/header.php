<section class="col-md-2">
    <p class="align-middle">Log empresa</p>
</section>
<section class="col-md-7 input-group">
        <input class="search form-control" type="search" name="search" id="search" method="POST">
        <input class="search__btn" type="submit" value="Buscar">
</section>
<section class="col-md-3">
    <?php
        if (isset($_SESSION["nueva"])) {
            echo '<a href="/SISPOW_WEB/Controlador/Controlador.php?accion=cerrar_sesion" class="btn waves-effect waves-light">Cerrar sesion</a>';
        }
        else {
            echo '<ul class="session text-right">
            <li class="session__item"><a class="session__link" data-placement="bottom" role="button" data-toggle="popover" data-title="" data-container="body"  data-html="true" href="#" id="login">Iniciar sesion  /</a></li>
            <li class="session__item"><a class="session__link" href="#" id="signUp" data-toggle="modal" data-target="#regModal">Registrarse</a></li>
            </ul>';
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
    <!jh-- Cuadro de registro Modal -->
    <div class="modal" id="regModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../Controlador/Controlador.php?accion=registrar" method="post" class="form-group">
            
            <label for="id">Identificación:</label>
            <input type="text" class="form-control" name="id" id="id" onkeyup="validar()" onchange="validar()">
            <label for="">Seleccion de tipo de usuario: </label>
            <select class="form-control" name="tipo_identificacion" id="identificacion">
            <option value="cedula">Cedula</option>
            </select>
            <label for="name">Nombres:</label>
            <input type="text" class="form-control" name="name" id="name">
            <label for="last-name">Apellido:</label>
            <input type="text" class="form-control" name="last-name" id="last-name">
            <div class="form-check-inline">
                <label for="genere" class="form-check-label">Genero:
                    <input type="radio" class="form-check-input" name="genero" value="M" id="m">Masculino
                    <input type="radio" class="form-check-input" name="genero" value="F" id="f">Femenino
                </label> 
            </div>
            <br> <br>
            <select name="pais" class="custom-select" id="pais">
            <option selected>Seleccione su país</option>
            </select>
            <br> <br>
            <select id="departamento" name="departamento" class="custom-select">
            <option selected>Seleccione su departamento</option>
            </select> <br><br>
            <select id="ciudad" name="ciudad" class="custom-select">
            <option selected>Seleccione su ciudad</option>
            </select>
            <label for="">Fecha de nacimiento: </label>
            <input type="date" name="date" class="form-control" max="3000-12-31" min="1000-01-01" />
            <label for="tel">Telefono:</label>
            <input type="text" class="form-control" name="tel" id="tel">
            <label for="cel">Celular:</label>
            <input type="text" class="form-control" name="cel" id="cel">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="emai" id="emai" onkeyup="validar()" onchange="validar()">
            <label for="dir">Dirección:</label>
            <input type="text" class="form-control" name="dir" id="dir">
            <label for="user">Usuario:</label>
            <input type="text" class="form-control" name="user" id="user" onkeyup="validar()" onchange="validar()">
            <label for="pass">Contraseña:</label>
            <input type="text" class="form-control" name="pass" id="pass">

            <label for="">Seleccion de tipo de usuario: </label>
            <select class="form-control" name="tipo_usuario" id="ad">
                <option selected>Escoja Usuario</option>
                <option value="administrador">Administrador</option>
                <option value="empleado">Empleado</option>
                <option value="cliente">Cliente</option>
            </select><br>
         
            <div class="text-right">
                <input class="btn btn-success" type="submit" value="Enviar" disabled="disabled" id="boton_enviar_registro">
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