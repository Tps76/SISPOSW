<?php adminController::addProducto(); ?>
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Producto
       </div>
       <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
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
                        <input id="descripcion_añadirpro_administrador" class="form-control" name=desc type="text" placeholder="Descripción" onkeyup="validar_producto()" onchange="validar_producto()">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success" type="submit" value="Añadir Producto" disabled="disabled" id="boton_añadirproducto_administrador">
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>