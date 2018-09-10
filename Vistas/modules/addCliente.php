<!-- NOTA: hay que añadir los names en los inputs -->
<div class="container col-8 mt-4 mx-0">
   <div class="card">
       <div class="card-header">
           Añadir Cliente
       </div>
       <div class="card-body">
            <form method="post" >
                <div class="row">
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Indentificación">
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">phone_iphone</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Celular">
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
                            <span class="input-group-text"><i class="material-icons">local_atm</i></span>
                        </div>
                        <select id="m_pago" class="form-control">
                            <option selected>Método de Pago</option>
                            <option>Visa</option>
                            <option>MasterCard</option>
                            <option>PayPal</option>
                            <option>Davivienda</option>
                            <option>Colpatria</option>
                        </select>
                    </div>
                    <div class="col input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">directions</i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Dirección">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success" type="submit" value="Añadir Cliente">
                    </div>
                </div>
            </form>
       </div>
   </div>
</div>