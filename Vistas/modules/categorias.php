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
                        <input type="text" class="form-control" placeholder="Nombre categoría">
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
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php //adminController::AllgetCategorias ?>
            </tbody>
        </table>
    </div>
</div>