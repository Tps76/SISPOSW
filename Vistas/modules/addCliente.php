<?php adminController::addClientes(); ?>
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Cliente
       </div>
       <div class="card-body">
            <form method="POST" >
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=id type="text" placeholder="Identificación" id="id" onkeyup="validar_cliente()" onchange="validar_cliente()">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contacto type="text" placeholder="Celular" id="cel" onkeyup="validar_cliente()" onchange="validar_cliente()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=nombre type="text" placeholder="Nombres" id="name" onkeyup="validar_cliente(); eliminar_dif_texto(this)" onchange="validar_cliente(); eliminar_dif_texto(this)">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=apellido type="text" placeholder="Apellidos" id="last-name" onkeyup="validar_cliente(); eliminar_dif_texto(this)" onchange="validar_cliente() ; eliminar_dif_texto(this)">
                    </div>
                </div>     
                <div class="row mt-3">
                    <div class="col">
                        
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input class="form-control" name=email type="email" placeholder="Correo Electrónico" id="emai" onkeyup="validar_cliente()" onchange="validar_cliente()">
                    </div>
                    <div class="col">
                        <div class="form-check-inline">
                                       <select class="form-control" name="genero" id="genero" onchange="validar_cliente()">
                                          <option selected>Seleccione su genero</option>
                                          <option value="m">Masculino</option>
                                          <option value="f">Femenino</option>
                                       </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" name=pass type="password" placeholder="Contraseña" id="pass" onkeyup="validar_cliente()" onchange="validar_cliente()">
                    </div>
                    <div class="col">
                        <select class=form-control name="pais" id="pais" onchange="validar_cliente()">
                        <option selected>Seleccione su país</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <select class=form-control id="departamento" name="departamento" onchange="validar_cliente()">
                        <option selected>Seleccione su departamento</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="ciudad" class=form-control id="ciudad" name="ciudad" onchange="validar_cliente()">
                        <option selected value="0">Seleccione su ciudad</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input type="date" name="date" class="form-control" max="3000-12-31" min="1000-01-01" id="nacimiento" onchange="validar_cliente()"/>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=dir type="text" placeholder="Dirección" id="dir" onkeyup="validar_cliente()" onchange="validar_cliente()">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <button class="btn btn-success" type="submit" disabled="disabled" id="boton_enviar_registro">Añadir Cliente</button>
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>