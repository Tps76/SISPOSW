<?php adminController::addClientes(); ?>
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Cliente
       </div>
       <div class="card-body">
            <form method="POST" >
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" name=id type="text" placeholder="Indentificación">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" name=contacto type="text" placeholder="Celular">
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
                    <div class="col">
                        
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input class="form-control" name=email type="email" placeholder="Correo Electrónico">
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
                <div class="row mt-4">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" name=pass type="password" placeholder="Contraseña">
                    </div>
                    <div class="col">
                        <select class=form-control name="pais" id="pais">
                            <?php adminController::selectPais(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <select class=form-control name="depto" id="depto">
                            <option value="">Seleccione primero el país</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class=form-control name="ciudad" id="ciudad">
                            <option value="">Seleccione primero el departamento</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                        </div>
                        <input type="date" name="date" class="form-control" max="3000-12-31" min="1000-01-01" />
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">drafts</i></span>
                        </div>
                        <input class="form-control" name=dir type="text" placeholder="Dirección">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <button class="btn btn-success" type="submit">Añadir Cliente</button>
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>