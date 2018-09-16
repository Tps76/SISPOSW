
<?php adminController::deleteEmp(); ?> 
<div class="container mt-4 mx-0">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Lista de Empleados</h3>
                <!-- Funcionalidad para el buscador -->
                <div class="input-group mb-3 d-flex search">
                    <input class="form-control" type="search" placeholder="Introduzca correo o cc del empleado">
                    <div class="input-group-append">
                        <button class="btn btn-dark" name=emp type="submit">Buscar</button>
                    </div>
                </div>
                <a class="btn btn-success d-flex align-item-center mb-3" href="index.php?action=addEmpleado"><i class="material-icons mr-2">add_circle_outline</i>Añadir Empleado</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Contancto</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí es donde deben meter código php
                        deben de repetir desde la tr y    
                        en las td llenar los campos -->
                    <?php 
                    if (!isset($_POST['emp'])) {
                        adminController::getAllEmpleados();

                    } else {
                        adminController::searchEmp();
                    }
                    ?>
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
                <div class="d-none" id=edit></div>
                <div class="d-none" id=person></div>
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=id type="text" placeholder="Indentificación">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=nombre type="text" placeholder="Nombres">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">person</i></span>
                        </div>
                        <input class="form-control" name=apellido type="text" placeholder="Apellidos">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=email type="text" placeholder="Correo Electrónico">
                    </div>
                    <div class="col input-group">
                        <div class="form-check-inline">
                            <label for="genere" class="form-check-label mt-2">Genero:
                                <input type="radio" class="form-check-input" name="genero" value="M" id="m">Masculino
                                <input type="radio" class="form-check-input" name="genero" value="F" id="f">Femenino
                            </label> 
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" name=pass type="password" placeholder="Contraseña">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input type="date" name="date" class="form-control" max="3000-12-31" min="1000-01-01" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contacto type="text" placeholder="Celular">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" name=dir type="text" placeholder="Dirección">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col input-group">
                        <select class=form-control name="cargo" id="cargo">
                            <option value="">Seleccione el Cargo</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                    <div class="col input-group">
                        <select class=form-control name="pais" id="pais">
                            <?php adminController::selectPais(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col input-group">
                        <select class=form-control name="depto" id="depto">
                            <option value="">Seleccione primero el país</option>
                        </select>
                    </div>
                    <div class="col input-group">
                        <select class=form-control name="ciudad" id="ciudad">
                            <option value="">Seleccione primero el departamento</option>
                        </select>
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