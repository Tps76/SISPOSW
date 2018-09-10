<div class="container mt-4 mx-0">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Empleados</h3>
                <!-- Funcionalidad para el buscador -->
                <div class="input-group mb-3 d-flex search">
                    <input class="form-control" type="search" placeholder="Introduzca correo o cc del empleado">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Buscar</button>
                    </div>
                </div>
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addEmpleado"><i class="material-icons mr-2">add_circle_outline</i>Añadir Empleado</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stried table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Contancto</th>
                        <th scope="col">Agregado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí es donde deben meter código php
                        deben de repetir desde la tr y    
                        en las td llenar los campos -->
                    <tr>
                        <td>12312456321</td>
                        <td>Johanna Andrea</td>
                        <td>Martinez Polanco</td>
                        <td>carrera 1 # 54 - 23</td>
                        <td>johanna.m89@hotmail.com</td>
                        <td>3126748907</td>
                        <td>23/04/2019</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-outline-primary mr-1" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
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
        Modificar Empleado
    =======================-->
<div class="modal fade" id="editar">
    <div class="modal-dialog form-tam">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Empleado</h5>
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
        Eliminar Empleado
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
                <p>Content</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>