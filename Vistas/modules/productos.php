<?php adminController::modifyProd();
      adminController::deleteProd();
?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Productos</h3>
                <!-- Funcionalidad para el buscador -->
                <form method="post" class="search">
                    <div class="input-group mb-3 d-flex">
                        <input class="form-control" name=prod type="search" placeholder="Introduzca nombre o código del Producto">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
                <!-- Fin del buscador -->
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addProducto"><i class="material-icons mr-2">add_circle_outline</i>Añadir Producto</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio c/u</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí es donde deben meter código php
                        deben de repetir desde la tr y    
                        en las td llenar los campos -->
                    <?php   
                        if (!isset($_POST['prod'])) {
                            adminController::getAllProd();
                        }else {
                            adminController::searchProd();
                        }                    
                    ?>    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Aquí estan la ventanas modales -->
<!--========================
        Modificar Producto
    =======================-->
<div class="modal fade" id="editar">
    <div class="modal-dialog form-tam">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="d-none" id="edit"></div>
                    <div class="d-none" id="stock"></div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">confirmation_number</i></span>
                        </div>
                        <input class="form-control" name=code type="text" placeholder="Código" id="code_añadirpro_administrador" onkeyup="eliminar_dif_numero(this); validar_producto()" onchange="eliminar_dif_numero(this) ; validar_producto()">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=name type="text" placeholder="Nombre" id="nombre_añadirpro_administrador" onkeyup="eliminar_dif_texto(this); validar_producto()" onchange="eliminar_dif_texto(this); validar_producto()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">local_atm</i></span>
                        </div>
                        <input class="form-control" name=priceSale type="text" placeholder="Precio venta" id="precio_venta_añadirpro_administrador" onkeyup="eliminar_dif_numero(this); validar_producto()" onchange="eliminar_dif_numero(this); validar_producto()">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">local_atm</i></span>
                        </div>
                        <input class="form-control" name=priceBuy type="text" placeholder="Precio compra" id="precio_compra_añadirpro_administrador" onkeyup="eliminar_dif_numero(this); validar_producto()" onchange="eliminar_dif_numero(this); validar_producto()">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">details</i></span>
                        </div>
                        <select id="cat" name="idcat" class="form-control" onchange="validar_producto()">
                            <option selected>Seleccione Categoría</option>
                            <?php adminController::selectCat(); ?>
                        </select>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">assignment_ind</i></span>
                        </div>
                        <select id="prov" name="idprov" class="form-control" onchange="validar_producto()">
                            <option selected>Seleccione el Proveedor</option>
                            <?php adminController::selectProv(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">folder_open</i></span>
                        </div>
                        <div class="custom-file">
                            <input id="file_añadirpro_administrador" class="custom-file-input" name=img type="file" lang="es" onchange="validar_producto()">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">exposure_plus_1</i></span>
                        </div>
                        <input type="text" name=cant class="form-control" placeholder="Cantidad" id="cantidad_añadirpro_administrador" onkeyup="eliminar_dif_numero(this) ; validar_producto()" onchange="eliminar_dif_numero(this) ; validar_producto()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">description</i></span>
                        </div>
                        <input class="form-control" name=desc type="text" placeholder="Descripción" id="descripcion_añadirpro_administrador" onkeyup="validar_producto()" onchange="validar_producto()">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-success" type="submit" disabled="disabled" id="boton_añadirproducto_administrador">Guardar</button>
                    </form>
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>    
<!--========================
        Eliminar Producto
    =======================-->
<div class="modal fade" id="eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Producto</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Está seguro de eliminar?</p>
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