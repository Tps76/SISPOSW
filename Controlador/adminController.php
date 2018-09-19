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
    public static function countCli()
    {
        $clientes = Usuario::countCli();
        return $clientes[0];
    }
    public static function countProv()
    {
        $prov = Proveedor::countProv();
        return $prov[0];
    }
    public static function countProd()
    {
        $prod = producto::countProd();
        return $prod[0];
    }
    public static function getAllCategories()
    {
        $categories = Categoria::getCategoriaProductoActivo();
        if ($categories) {
            foreach ($categories as $categoria) {
                echo '<tr>
                        <th>' . $categoria['nombre_categoria'] . '</th>
                        <th>
                            <div class="d-flex justify-content-between">
                                <button class="click categoria btn btn-outline-primary" value="'.$categoria['idcatproducto'].'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$categoria['idcatproducto'].'"data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </th>
                    </tr>';
            }
        }else{
            // echo("error");
        }
    }

    public static function getProvAll()
    {
        $provs = Proveedor::getAllProv();
        if ($provs != "error") {
            foreach ($provs as $prov) {
                echo "<tr>
                        <th> $prov[idproveedor] </th>
                        <th> $prov[razon_social] </th>
                        <th> $prov[nombre_proveedor] $prov[apellido_proveedor] </th>
                        <th> $prov[direccion_proveedor] </th>
                        <th> $prov[email_proveedor] </th>
                        <th> $prov[telefono_proveedor] </th>
                        <th>".'
                            <div class="d-flex justify-content-between">
                                <button class="click proveedor btn btn-outline-primary" value="'.$prov['idproveedor'].'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$prov['idproveedor'].'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </th>
                    </tr>';    
            }
        }
    }

    public static function getAllProd()
    {
        $prods = producto::viewAllProductos();
        // print_r($prods);
        if ($prods) {
            foreach($prods as $prod){
                echo '<tr>
                        <td>'.$prod['idproducto'].'</td>
                        <td>'.$prod['nombre_producto'].'</td>
                        <td>'.$prod['nombre_categoria'].'</td>
                        <td>'.$prod['razon_social'].'</td>
                        <td>'.$prod['cantidad_stock'].'</td>
                        <td>'.$prod['venta_producto'].'</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="click producto btn btn-outline-primary" id="'.$prod['idstock'].'" value="'. $prod['idproducto'] .'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" id="'.$prod['idstock'].'" value="'. $prod['idproducto'] .'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
        }
    }

    public static function getAllCli()
    {
        $clientes = Usuario::getClientes();
        // echo "<pre>";
        // print_r($clientes);
        // echo "</pre>";
        if ($clientes) {
            foreach ($clientes as $cliente) {
                // echo "$cliente[idpersona]";
                echo '<tr>
                        <td>' . $cliente['numero_identidad'] . '</td>
                        <td>' . $cliente['nombre_persona'] . '</td>
                        <td>' . $cliente['apellido_persona'] . '</td>
                        <td>' . $cliente['direccion'] . '</td>
                        <td>' . $cliente['email_usuario'] . '</td>
                        <td>' . $cliente['telefono'] . '</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="d-none persona" id="' . $cliente['idpersona'] . '" value="' . $cliente['idpersona'] . '"></button> 
                                <button class="click cliente btn btn-outline-primary" name="'. $cliente['email_usuario'] .'" id="' . $cliente['idpersona'] . '" value="' . $cliente['numero_identidad'] . '" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i></button>
                                <button class="click btn btn-outline-danger" value="' . $cliente['email_usuario'] . '" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
        }
    }

    public static function getAllEmpleados()
    {
        $empleados = Usuario::getEmpleados();
        // echo "<pre>";
        // print_r($empleados);
        // echo "</pre>";
        if ($empleados) {
            foreach ($empleados as $empleado) {
                echo '<tr>
                        <td>' . $empleado['numero_identidad'] . '</td>
                        <td>' . $empleado['nombre_persona'] . '</td>
                        <td>' . $empleado['apellido_persona'] . '</td>
                        <td>' . $empleado['email_usuario'] . '</td>
                        <td>' . $empleado['telefono'] . '</td>
                        <td>' . $empleado['nombre_catusuario'] . '</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="click empleado btn btn-outline-primary" name="'. $empleado['email_usuario'] .'" id="' . $empleado['idpersona'] . '" value="' . $empleado['numero_identidad'] . '" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="' . $empleado['email_usuario'] . '" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
        }
    }

    public static function addCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['addCat'])) {
                $name = $_POST['addCat'];
                $add = Categoria::insertCategoriaProducto($name);
                header("location:index.php?action=catOk");
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
                header("location:index.php?action=proveedores");
            }
        }
    }

    public static function addProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Subir imagen al servidor
            if (isset($_FILES['img'])) {
                $dir = "Vistas/assets/uploads";
                $img = $_FILES['img'];
                $share = uploadFile::upload($dir, $img);
            }else{
                $share = null;
            }
            if (isset($_POST['code']) && isset($_POST['idcat']) && isset($_POST['idprov'])) {
                $datos = array(
                    "code" => $_POST['code'],
                    "name" => $_POST['name'],
                    "priceSale" => $_POST['priceSale'],
                    "priceBuy" => $_POST['priceBuy'],
                    "cat" => $_POST['idcat'],
                    "prov" => $_POST['idprov'],
                    "cant" => $_POST['cant'],
                    "img" => $share                
                );
                // print_r($datos);
                $prod = producto::insertProducto($datos);
                $stock= producto::addStock($datos);
                if ($prod && $stock) {
                    header("location:index.php?action=productos");
                }
            }else{
                // echo "error";
            }
        }
    }

    public function addClientes()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['id'])){
                $datos = array(
                    "id" => $_POST['id'],
                    "tipo_id" => "cedula",
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "genero" => $_POST['genero'],
                    "fecha" => $_POST['date'],
                    "ciudad" => $_POST['ciudad'],
                    "dir" => $_POST['dir'],
                    "tel" => $_POST['contacto'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['pass'],
                    "tipo" => 3 
                );
                $identidad = Usuario::regId($datos);
                $usuario = Usuario::regUsuario($datos);
                if ($identidad && $usuario) {

                    $id = Usuario::getId($_POST['id']);
                    $email= $_POST['email'];
                    $idUsuario = Usuario::getIdUsuario($email);
                    if ($id && $idUsuario) {
                        $persona = Usuario::regPersona($datos, $id);
                    
                        if ($persona) {
                            $idPersona = Usuario::getIdPersona($id);
                        
                            if ($idPersona) {
                                $cliente = Usuario::regCliente($idUsuario, $idPersona);
                                if ($cliente) {
                                    header("location:index.php?action=clientes");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
        
    public static function addEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['id'])) {
                $datos = array(
                    "id" => $_POST['id'],
                    "tipo_id" => "cedula",
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "genero" => $_POST['genero'],
                    "fecha" => $_POST['date'],
                    "ciudad" => $_POST['ciudad'],
                    "dir" => $_POST['dir'],
                    "tel" => $_POST['contacto'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['pass'],
                    "tipo" => $_POST['cargo']
                );
                $identidad = Usuario::regId($datos);
                $usuario = Usuario::regUsuario($datos);
                if ($identidad && $usuario) {

                    $id = Usuario::getId($_POST['id']);
                    $email = $_POST['email'];
                    $idUsuario = Usuario::getIdUsuario($email);
                    if ($id && $idUsuario) {

                        $persona = Usuario::regPersona($datos, $id);

                        if ($persona) {
                            $idPersona = Usuario::getIdPersona($id);


                            if ($idPersona) {
                                $cargo = $_POST['cargo']; 
                                $empleado = Usuario::regEmpleado($idUsuario, $idPersona, $cargo);
                                if ($empleado) {
                                    header("location:index.php?action=empleados");
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public static function modifyCat()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit'])) {
                $id = $_POST['edit'];
                $name = $_POST['Cat'];
                $edit = Categoria::updateCategoriaProducto($name, $id);
                header("location:index.php?action=catOk");
            }else {
                // echo "error1";
            }
        }
    }

    public static function modifyProv()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit'])) {
                $id = $_POST['edit'];
                $datos = array(
                    "id" => $_POST['idProvE'],
                    "ciudad" => $_POST['ciudadE'],
                    "RS" => $_POST['RSProvE'],
                    "nombre" => $_POST['namesProvE'],
                    "apellido" => $_POST['lastNameProvE'],
                    "dir" => $_POST['dirProvE'],
                    "tel" => $_POST['contactProvE'],
                    "email" => $_POST['emailProvE']
                );
                $edit = Proveedor::updateProv($datos, $id);
                header("location:index.php?action=provOk");
            }else {
                // echo "error1";
            }
        }
    }

    public static function modifyProd()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit'])) {
                $id = $_POST['edit'];
                $stock = $_POST['stock'];

                if (isset($_FILES['img'])) {
                    $dir = $_SERVER['DOCUMENT_ROOT'] . "SISPOSW/Vistas/assets/uploads";
                    $img = $_FILES['img'];
                    $share = uploadFile::upload($dir, $img);
                } else {
                    $share = null;
                }

                $datos = array(
                    "code" => $_POST['code'],
                    "name" => $_POST['name'],
                    "priceSale" => $_POST['priceSale'],
                    "priceBuy" => $_POST['priceBuy'],
                    "cat" => $_POST['idcat'],
                    "prov" => $_POST['idprov'],
                    "cant" => $_POST['cant'],
                    "img" => $share
                );
                // print_r($datos);
                $cambioProd = producto::updateProducto($datos, $id);
                $cambioStock = producto::updateStock($datos, $stock);
                if ($cambioProd && $cambioStock) {
                    header("location:index.php?action=prodOk");
                }
            }
        } 
    }

    public static function modifyCli()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit'])) {
                $identidad = $_POST['edit'];
                $usuario = $_POST['user'];
                $persona = $_POST['person'];

                $datos = array(
                    "id" => $_POST['id'],
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "fecha" => $_POST['date'],
                    "genero" => $_POST['genero'],
                    "dir" => $_POST['dir'],
                    "tel" => $_POST['contacto'],
                    "ciudad" => $_POST['ciudad'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['pass']
                );

                $cambioId = Usuario::updateIdentidad($datos, $identidad);
                $cambioUser = Usuario::updateUsuario($datos, $usuario);
                $cambioPerson = Usuario::updatePersona($datos, $persona);
                if ($cambioId && $cambioPerson && $cambioUser) {
                    header("location:index.php?action=cliOk");
                }
            }
        } 
    }

    public static function modifyEmp()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit'])) {
                $identidad = $_POST['edit'];
                $usuario = $_POST['user'];
                $persona = $_POST['person'];

                $datos = array(
                    "id" => $_POST['id'],
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "fecha" => $_POST['date'],
                    "genero" => $_POST['genero'],
                    "dir" => $_POST['dir'],
                    "tel" => $_POST['contacto'],
                    "ciudad" => $_POST['ciudad'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['pass'],
                    "cargo" => $_POST['cargo']
                );

                $cambioId = Usuario::updateIdentidad($datos, $identidad);
                $cambioUser = Usuario::updateUsuario($datos, $usuario);
                $cambioPerson = Usuario::updatePersona($datos, $persona);
                $cambioCargo = Usuario::updateEmpleado($datos, $persona);
                if ($cambioId && $cambioPerson && $cambioUser) {
                    header("location:index.php?action=empOk");
                }
            }
        } 
    }

    public static function deleteCat()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['delete'])) {
                
                $id = $_POST['delete'];
                $delete = Categoria::desactivarCategoriaProducto($id);
                header("location:index.php?action=catOk");
                
                if (!$delete) {
                    echo "error";
                }
                
            }else{
                // echo "error";
            }
        }
    }

    public static function deleteProv()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['delete'])) {
                
                $id = $_POST['delete'];
                $delete = Proveedor::desactivarProveedor($id);
                header("location:index.php?action=provOk");
                
                if (!$delete) {
                    echo "error";
                }
                
            }else{
                // echo "error";
            }
        }
    }

    public static function deleteProd()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['delete'])) {
                
                $id = $_POST['delete'];
                $delete = producto::desactivarProducto($id);
                header("location:index.php?action=prodOk");
                
                if (!$delete) {
                    echo "error";
                }
                
            }else{
                // echo "error";
            }
        }
    }

    public static function deleteCli()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['delete'])) {
                
                $email = $_POST['delete'];
                $delete = Usuario::desactivarUsuario($email);
                header("location:index.php?action=cliOk");
                
                if (!$delete) {
                    echo "error";
                }
                
            }else{
                // echo "error";
            }
        }
    }

    public static function deleteEmp()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['delete'])) {
                
                $email = $_POST['delete'];
                $delete = Usuario::desactivarUsuario($email);
                header("location:index.php?action=empOk");
                
                if (!$delete) {
                    echo "error";
                }
                
            }else{
                // echo "error";
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

    public static function selectProv()
    {
        $provs = Proveedor::getAllProv();
        if ($provs != "error") {
            foreach ($provs as $prov) {
                echo '<option value="' . $prov['idproveedor'] . '">' . $prov['razon_social'] . " - " . $prov['nombre_proveedor'] . " " . $prov['apellido_proveedor'] . '</option>';
            }
        }
    }

    public static function selectCat()
    {
        $categories = Categoria::getCategoriaProductoActivo();
        if ($categories) {
            foreach ($categories as $category) {
                echo '<option value="' . $category['idcatproducto'] . '">' . $category['nombre_categoria'] . '</option>';
            }
        }
    }

    //iniciar sesion Manuel Morales y julian :3
    public function iniciar_sesion(){
        if (isset($_POST["correo_inicio"]) && isset($_POST["pass_inicio"])) {
           $datos = array("correo" => $_POST['correo_inicio'] , "pass" => $_POST['pass_inicio']);
           $_SESSION["nueva"]=Usuario::loginUser($datos);
        }
    }

    public static function cerrar_sesion(){
        if (isset($_SESSION["nueva"]) && isset($_POST['cerrar'])) {
            $_SESSION['nueva']= false;
            session_destroy();
            header("location:index.php");
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
            // echo "<pre>";
            // print_r($prov);
            // echo "</pre>";
            
            if ($prov) {
                echo "<tr>
                        <td>$prov[idproveedor]</td>
                        <td>$prov[razon_social]</td>
                        <td>$prov[nombre_proveedor] $prov[apellido_proveedor]</td>
                        <td>$prov[direccion_proveedor]</td>
                        <td>$prov[email_proveedor]</td>
                        <td>$prov[telefono_proveedor]</td>
                        <td>".
                        '<div class="d-flex justify-content-around">
                                <button class="click btn btn-outline-primary" value="'.$prov['idproveedor'].'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$prov['idproveedor'].'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
                
        }
    }

    public static function searchProd()
    {
        if (isset($_POST['prod'])) {
            $search = $_POST['prod'];
            if (is_numeric($search)) {
                $id = $search;
                // $nombre = "";
            }else{
                // $nombre = $search;
                $id = 0;
            }
            $prod = producto::getProd($id);
            // echo "<pre>";
            // print_r($prod);
            // echo "</pre>";
            
            if ($prod) {
                echo "<tr>
                        <td>$prod[idproducto]</td>
                        <td>$prod[nombre_producto]</td>
                        <td>$prod[nombre_categoria]</td>
                        <td>$prod[razon_social]</td>
                        <td>$prod[cantidad_stock]</td>
                        <td>$prod[venta_producto]</td>
                        <td>".
                        '<div class="d-flex justify-content-around">
                                <button class="click btn btn-outline-primary" value="'.$prod['idproducto'].'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$prod['idproducto'].'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
                
        }
    }
    
    public static function searchEmp()
    {
        if (isset($_POST['emp'])) {
            $search = $_POST['emp'];
            if (is_numeric($search)) {
                $id = $search;
                $email = "";
            }else{
                $email = $search;
                $id = 0;
            }
            $emp = Usuario::getEmpleado($id, $email);
            echo "<pre>";
            print_r($emp);
            echo "</pre>";
            
            if ($emp) {
                echo "<tr>
                        <td>$emp[numero_identidad]</td>
                        <td>$emp[nombre_persona]</td>
                        <td>$emp[apellido_persona]</td>
                        <td>$emp[email_usuario]</td>
                        <td>$emp[telefono]</td>
                        <td>$emp[nombre_catusuario]</td>
                        <td>".
                    '<div class="d-flex justify-content-around">
                                <button class="click btn btn-outline-primary" name="' . $emp['email_usuario'] . '" id="' . $emp['idpersona'] . '" value="' . $emp['numero_identidad'] . '" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$emp['email_usuario'].'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }
                
        }
    }
    
    public static function searchCli()
    {
        if (isset($_POST['Cli'])) {
            $search = $_POST['Cli'];
            if (is_numeric($search)) {
                $id = $search;
                $email = "";
            }else{
                $email = $search;
                $id = 0;
            }
            $cli = Usuario::getCliente($id, $email);
            // echo "<pre>";
            // print_r($cli);
            // echo "</pre>";
            
            if ($cli) {
                echo "<tr>
                        <td>$cli[numero_identidad]</td>
                        <td>$cli[nombre_persona]</td>
                        <td>$cli[apellido_persona]</td>
                        <td>$cli[direccion]</td>
                        <td>$cli[email_usuario]</td>
                        <td>$cli[telefono]</td>
                        <td>".
                    '<div class="d-flex justify-content-around">
                                <button class="click btn btn-outline-primary" name="' . $cli['email_usuario'] . '" id="' . $cli['idpersona'] . '" value="' . $cli['numero_identidad'] . '" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
                                <button class="click btn btn-outline-danger" value="'.$cli['email_usuario'].'" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </button>
                            </div>
                        </td>
                    </tr>';
            }        
        }
    }
}