<?php adminController::addEmpleado();?>
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Empleado
       </div>
       <div class="card-body">
            <form method="post" >
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=id type="text" placeholder="Identificación" id="id" onkeyup="validar_empleado()" onchange="validar_empleado()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=nombre type="text" placeholder="Nombres" id="name" onkeyup="validar_empleado(); eliminar_dif_texto(this)" onchange="validar_empleado(); eliminar_dif_texto(this)">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=apellido type="text" placeholder="Apellidos" id="last-name" onkeyup="validar_empleado(); eliminar_dif_texto(this)" onchange="validar_empleado() ; eliminar_dif_texto(this)">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=email type="text" placeholder="Correo Electrónico" id="emai" onkeyup="validar_empleado()" onchange="validar_empleado()">
                    </div>
                    <div class="col input-group">
                        <div class="form-check-inline">
                        <select class="form-control" name="genero" id="genero" onchange="validar_empleado()">
                                <option value="">Seleccione su genero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" name=pass type="password" placeholder="Contraseña" id="pass" onkeyup="validar_empleado()" onchange="validar_empleado()">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input type="date" name="date" class="form-control" max="3000-12-31" min="1000-01-01" id="nacimiento" onchange="validar_empleado()"/>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contacto type="text" placeholder="Celular" id="cel" onkeyup="validar_empleado();eliminar_dif_numero(this)" onchange="validar_empleado();eliminar_dif_numero(this)">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" name=dir type="text" placeholder="Dirección" id="dir" onkeyup="validar_empleado()" onchange="validar_empleado()">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col input-group">
                        <select class=form-control name="cargo" id="cargo" onchange="validar_empleado()">
                            <option value="0">Seleccione el Cargo</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                    <div class="col input-group">
                        <select class=form-control name="pais" id="pais" onchange="validar_empleado()">
                        <option selected>Seleccione su país</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col input-group">
                        <select class=form-control name="depto" id="departamento" onchange="validar_empleado()">
                        <option selected>Seleccione su departamento</option>
                        </select>
                    </div>
                    <div class="col input-group">
                        <select class=form-control name="ciudad" id="ciudad" onchange="validar_empleado()">
                        <option selected value="0">Seleccione su ciudad</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success" type="submit" value="Añadir Empleado" disabled="disabled" id="boton_enviar_registro">
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>