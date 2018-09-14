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
        if ($categories) {
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

    public function getProvAll()
    {
        $provs = Proveedor::getAllProv();
        if ($provs != "error") {
            foreach ($provs as $prov) {
                echo '<tr>
                        <th>' . $prov['idproveedor'] . '</th>
                        <th>' . $prov['nombre_proveedor'] . '</th>
                        <th>' . $prov['apellido_proveedor'] . '</th>
                        <th>' . $prov['direccion_proveedor'] . '</th>
                        <th>' . $prov['email_proveedor'] . '</th>
                        <th>' . $prov['telefono_proveedor'] . '</th>
                        <th>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                                <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
                            </div>
                        </th>
                    </tr>';
            } 
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
                               "ciudad" => $_POST['ciudad'],
                               "RS" => $_POST['RSProv']
                        );
                $prov = Proveedor::regProv($datos);
                


            }
        }
    }

    public static function selectPais()
    {
        $paises = Selects::getPais();
        if ($paises != "error") {
            echo "<option>Seleccione pais</option>";
            foreach ($paises as $pais) {
               echo '<option value = "'.$pais['idpais'].'">'.$pais['nombre_pais'].'</option>';
            }
        }
    }

    public function selectDepto($id)
    {
        $deptos = Selects::getDepto($id);
        if ($deptos != "error") {
            $html = '<option value="">Seleccione Departamento</option>';
            foreach ($deptos as $depto) {
                $html.= '<option value="'.$depto['iddepartamento'].'">'.$depto['nombre_departamento'].'</option>';
            }
            return $html;
        }else{
            return "error";
        }
    }

    public function selectCiudad($id)
    {
        $ciudades = Selects::getCiudad($id);
        if ($ciudades != "error") {
            $html = '<option value="">Seleccione Ciudad</option>';
            foreach ($ciudades as $ciudad) {
                $html .= '<option value="' . $ciudad['idciudad'] . '">' . $ciudad['nombre_ciudad'] . '</option>';
            }
            return $html;
        } else {
            return "error";
        }
    }

    public static function searchProv()
    {
        if (isset($_POST['prov'])) {
            $search = $_POST['prov'];
            if (is_numeric($search)) {
                $id = $search;
                $nombre = "";
            }else{
                $nombre = $search;
                $id = 0;
            }
            $prov = Proveedor::getProv($id, $nombre);
        }
    }

    public static function selectProv()
    {
        $provs = Proveedor::getAllProv();
        if ($provs != "error") {
            foreach ($provs as $prov) {
                echo '<option value="'.$prov['idproveedor'].'">'.$prov['razon_social']." - ".$prov['nombre_proveedor']." ".$prov['apellido_proveedor'].'</option>';
            }
        }
    }

    public static function selectCat()
    {
        $categories = Categoria::getCategoriaProductoActivo();
        if ($categories) {
            foreach ($categories as $category) {
                echo '<option value="' . $category['idcategoria'] . '">'.$category['nombre_categoria'].'</option>';
            }
        }
    }
}