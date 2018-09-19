<?php adminController::addProveedor();  ?>
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Proveedor
       </div>
       <div class="card-body">
            <form method="post" >
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=idProv type="text" placeholder="Identificación" id="id" onkeyup="validar_proveedor()" onchange="validar_proveedor()">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=RSProv type="text" placeholder="Razón Social" id="razonsocial" onkeyup="validar_proveedor()" onchange="validar_proveedor()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=namesProv type="text" placeholder="Nombres" id="name" onkeyup="validar_proveedor(); eliminar_dif_texto(this)" onchange="validar_proveedor(); eliminar_dif_texto(this)">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=lastNameProv type="text" placeholder="Apellidos" id="last-name" onkeyup="validar_proveedor(); eliminar_dif_texto(this)" onchange="validar_proveedor() ; eliminar_dif_texto(this)">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <select id="pais" name="pais" class="form-control" id="pais" onchange="validar_proveedor()">
                        <option selected>Seleccione su país</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="departamento" name="depto" class="form-control" id="departamento" onchange="validar_proveedor()">
                        <option selected>Seleccione su departamento</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="ciudad" name="ciudad" class="form-control" id="ciudad" onchange="validar_proveedor()">
                        <option selected value="0">Seleccione su ciudad</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=emailProv type="text" placeholder="Correo Electrónico" id="emai" onkeyup="validar_proveedor()" onchange="validar_proveedor()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contactProv type="text" placeholder="Contacto" id="cel" onkeyup="validar_proveedor();eliminar_dif_numero(this)" onchange="validar_proveedor();eliminar_dif_numero(this)">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" name=dirProv type="text" placeholder="Dirección" id="dir" onkeyup="validar_proveedor()" onchange="validar_proveedor()">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success" type="submit" value="Añadir Proveedor" disabled="disabled" id="boton_enviar_registro">
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>