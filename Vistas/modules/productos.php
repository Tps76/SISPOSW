<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Productos</h3>
                <!-- Funcionalidad para el buscador -->
                <div class="input-group mb-3 d-flex search">
                    <input class="form-control" type="search" placeholder="Introduzca nombre o código del Producto">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Buscar</button>
                    </div>
                </div>
                <!-- Fin del buscador -->
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addProducto"><i class="material-icons mr-2">add_circle_outline</i>Añadir Producto</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stried table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio c/u</th>
                        <th scope="col">Agregado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí es donde deben meter código php
                        deben de repetir desde la tr y    
                        en las td llenar los campos -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                                <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
                            </div>
                        </td>
                    </tr>
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
                <form method="post">
                <label for=""></label>
                <label for=""></label>
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
                <p>Content</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>