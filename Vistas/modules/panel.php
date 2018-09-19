<div class="container">
    <!-- Las tarjetas de arriba -->
    <div class="row mt-4">
        <?php 
            $client = adminController::countCli();
            $prov = adminController::countProv();
            $prod = adminController::countProd();
            $all = array("uno" => array("nombre" => "Clientes","icono"=> "person", "cant" => $client),
                         "dos" => array("nombre" => "Proveedores","icono"=> "assignment_ind", "cant" => $prov),
                         "tres" => array("nombre" => "Productos","icono"=> "inbox", "cant" => $prod),
                         "cuatro" => array("nombre" => "Ventas","icono"=> "monetization_on", "cant" => 0)
                        );
            // echo "<pre>";
            // print_r($all);
            foreach ($all as $key => $value) {
                echo '  <div class="col-md-3">
                            <div class="card">
                                <div class="card-body mx-auto">
                                    <div class="d-flex justify-content-center">
                                        <i class="tamanio material-icons">'.$value['icono'].'</i>
                                    </div>
                                    <p>'.$value['nombre'].'</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="d-flex justify-content-center">
                                        <span>'.$value['cant'].'</span>
                                    </div>    
                                </div>
                            </div>
                        </div>';
            }
        ?>
    </div>
    <!--==================== 
            Aquí las tablas 
        ==================== -->
    <div class="row mt-4">
        <!-- Tabla 1 -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Productos de Mayor Venta
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- Aqui se cargan los valores -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tabla 2 -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Últimas Ventas
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Fecha</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- Aqui se cargan los valores -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tabla 3 -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Ventas por Mes
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- Aqui se cargan los valores -->
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>    
</div>