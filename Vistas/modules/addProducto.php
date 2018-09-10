<?php $select = new adminController();  ?>
<!-- NOTA: hay que añadir los names en los inputs -->
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
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Código">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Nombre">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">local_atm</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Precio venta">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">local_atm</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Precio compra">
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
                        <select id="m_pago" class="form-control">
                            <option selected>Seleccione Categoría</option>
                            <?php $select->selectCat(); ?>
                        </select>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">assignment_ind</i></span>
                        </div>
                        <select id="m_pago" class="form-control">
                            <option selected>Seleccione el Proveedor</option>
                            <?php $select->selectProv(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">folder_open</i></span>
                        </div>
                        <div class="custom-file">
                            <input class="custom-file-input" type="file" lang="es">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">exposure_plus_1</i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">description</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Descripción">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success" type="submit" value="Añadir Producto">
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>