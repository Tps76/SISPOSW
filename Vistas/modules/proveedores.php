<?php $prov=new adminController(); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Proveedores</h3>
                <!-- Funcionalidad para el buscador -->
                <div class="input-group mb-3 d-flex search">
                    <input class="form-control" type="search" placeholder="Introduzca nombre o nit del proveedor">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Buscar</button>
                    </div>
                </div>
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addProveedor"><i class="material-icons mr-2">add_circle_outline</i>Añadir Proveedor</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stried table-bordered">
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
                    if(!isset($_POST['buscar'])){
                        $prov->getProvAll();  
                    }else{
                        $prov->searchProv();
                    }
                    ?>
                    <!-- <td>123543627752432</td>
                    <td>Samsung</td>
                    <td>carrera 1 # 54 - 65</td>
                    <td>samsung.oficial@gmail.com</td>
                    <td>1329495232</td>
                    <td>23/09/2018</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                            <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
                        </div>
                    </td> -->
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Aquí estan la ventanas modales -->
<!--========================
        Modificar Proveedor
    =======================-->
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
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Indentificación">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Razón Social">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Nombres">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Apellidos">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Correo Electrónico">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Contacto">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Dirección">
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
                <p><?php echo "colocar el nombre aquí" ?></p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <button class="btn btn-warning" value="<?php ?>" type="submit">Eliminar</button>
                </form>
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>