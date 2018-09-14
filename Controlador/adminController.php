<?php

class adminController
{
    public static function Template()
    {
        $template = "Vistas/template.php";
        include $template;
    }
    
    public static function RutaAdminController()
    {
        if (isset($_GET['action'])) {
            $enlace = $_GET['action'];
            $vista = Ruta::rutaAdmin($enlace);
        }else{
            $vista = "Vistas/modules/panel.php";
        }
        include $vista;
    }
    // public static function RutaClienteController()
    // {
    //     if (isset($_GET['action'])) {
    //         $enlace = $_GET['action'];
    //         $vista = Ruta::rutaCliente();
    //     } else {
    //         $vista = "Vistas/modules/products.php";
    //     }
    //     include $vista;
    // }
    public static function getAllCategories()
    {
        $categories = Categoria::getCategoriaProductoActivo();
        if ($categories != false) {
            foreach ($categories as $categoria) {
                echo '<tr>
                        <th>' . $categoria['idcatproducto'] . '</th>
                        <th>' . $categoria['nombre_categoria'] . '</th>
                        <th>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                                <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
                            </div>
                        </th>
                    </tr>';
            }
        }else{
            echo("error");
        }
    }

    public static function addCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == "post") {
            if (isset($_POST['addCat'])) {
                $name = $_POST['addCat'];
                $add = Categoria::insertCategoriaProducto($name);
                if (!$add) {
                    echo "error";
                }
            }
        }
    }    

    public static function addProveedor()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['namesProv']) ) {

                $datos = array("code" => $_POST['idProv'],
                               "name" => $_POST['namesProv'],
                               "lastName" => $_POST['lastNameProv'],
                               "dir" => $_POST['dirProv'],
                               "contact" => $_POST['contactProv'],
                               "email" => $_POST['emailProv'],
                               "RS" => $_POST['RSProv']
                        );
                $prov = Proveedor::regProv($datos);
                


            }
        }
    }

    public static function selectProv()
    {
        $prov = Proveedor::getAllProv();
    }

    public static function selectCat()
    {
        # code...
    }
}