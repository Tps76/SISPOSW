<?php adminController::addCategories(); 
      adminController::modifyCat();
      adminController::deleteCat();
?>
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Agregar Categoría</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <form method="POST">
                    <div class="col">
                        <input type="text" name=addCat class="form-control" placeholder="Nombre categoría">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <table class="table table-responsive-sm table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class=col>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php adminController::getAllCategories(); ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Aquí estan la ventanas modales -->
<!--========================
        Modificar Categoria
    =======================-->
<div class="modal fade" id=editar>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoría</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="d-none" id="edit"></div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name=Cat class="form-control" placeholder="Nombre categoría">
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
        Eliminar Categoria
    =======================-->
<div class="modal fade" id="eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Empleado</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de eliminar?</p>
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