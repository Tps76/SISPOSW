<?php ob_start(); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Proveedores</h3>
                <!-- Funcionalidad para el buscador -->
                <form method="post" class=search>
                    <div class="input-group mb-3 d-flex">
                        <input class="form-control" name=prov type="search" placeholder="Introduzca nombre o nit del proveedor">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addProveedor"><i class="material-icons mr-2">add_circle_outline</i>Añadir Proveedor</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Razon social</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Contancto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí es donde deben meter código php
                        deben de repetir desde la tr y    
                        en las td llenar los campos -->
                
                    <?php 
                    if(!isset($_POST['prov'])){
                        adminController::getProvAll();  
    
                    }else{
                        adminController::searchProv();
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Aquí estan la ventanas modales -->
<!--========================
        Modificar Proveedor
    =======================-->
<?php adminController::modifyProv();?>
<div class="modal fade" id="editar">
    <div class="modal-dialog form-tam">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Proveedor</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                <div class="d-none" id="edit">
                
                </div>
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=idProvE type="text" placeholder="Indentificación">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=RSProvE type="text" placeholder="Razón Social">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=namesProvE type="text" placeholder="Nombres">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=lastNameProvE type="text" placeholder="Apellidos">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <select id="pais" name="paisE" class="form-control">
                            <?php adminController::selectPais(); ?>
                        </select>
                    </div>
                    <div class="col">
                        <select id="depto" name="deptoE" class="form-control">
                            <option value="">Seleccione País primero</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="ciudad" name="ciudadE" class="form-control">
                            <option value="">Seleccione Departamento primero</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=emailProvE type="text" placeholder="Correo Electrónico">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contactProvE type="text" placeholder="Contacto">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" name=dirProvE type="text" placeholder="Dirección">
                    </div>
                </div>
            </div>    
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>    
<!--========================
        Eliminar Proveedor
    =======================-->
<?php adminController::deleteProv();?>
<div class="modal fade" id="eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Proveedor</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Esta seguro de eliminar el proveedor?</p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <div class="d-none" id="delete"></div>
                    <button class="btn btn-warning" type="submit">Eliminar</button>
                </form>
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php ob_end_flush(); ?>