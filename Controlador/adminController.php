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
        $i = 1;
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
                                <button class="click btn btn-outline-primary" value="'.$prov['idproveedor'].'" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </button>
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
        if ($prods) {
            // echo "<pre>";
            // print_r($prods);
            foreach($prods as $prod){
                echo '<tr>
                        <td>'.$prod['idproducto'].'</td>
                        <td>'.$prod['nombre_producto'].'</td>
                        <td>'.$prod['idcatproducto'].'</td>
                        <td>'.$prod['razon_social'].'</td>
                        <td>'.$prod['cantidad_stock'].'</td>
                        <td>'.$prod['venta_producto'].'</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                                <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
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
                // header("location:index.php?");
            }
        }
    }

    public static function addProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Subir imagen al servidor
            if (isset($_FILES['img'])) {
                $dir = $_SERVER['DOCUMENT_ROOT']."SISPOSW/Vistas/assets/uploads";
                $img = $_FILES['img'];
                $share = uploadFile::upload($dir, $img);
            }else{
                $share = null;
            }
            if (isset($_POST['code'])) {
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
                $prod = producto::insertProducto($datos);
                $stock= producto::addStock($datos);
                // echo $prod;
            }else{
                echo "error";
            }
        }
    }

    public function addClientes()
    {
        if ($_SERVER['REQUEST_METHOD'] == "post") {
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
                            }else{
                                echo("error");
                            }
                        }else{
                            echo "error";
                        }
                    }else{
                        echo "error";
                    }
                }else{
                    echo "erro";
                }
            }
        }
    }
        
    public static function addEmpleado()
    {
        if ($_SERVER['REQUEST_METHOD'] == "post") {
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
                            } else {
                                echo ("error");
                            }
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "error";
                    }
                } else {
                    echo "erro";
                }
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
    //registro julian
    public function registrar()
    {
        if (isset($_POST["id"]) && isset($_POST["tipo_identificacion"]) && isset($_POST["name"]) && isset($_POST["last-name"]) && isset($_POST["genero"]) && isset($_POST["ciudad"]) && isset($_POST["tel"]) && isset($_POST["cel"]) && isset($_POST["emai"]) && isset($_POST["dir"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["tipo_usuario"])) {
            $id = $_POST['id'];
            $tipo_identificacion = $_POST['tipo_identificacion'];
            $name = $_POST['name'];
            $last_name = $_POST['last-name'];
            $genero = $_POST['genero'];
            $ciudad = $_POST['ciudad'];
            $date = $_POST['date'];
            $telefono = $_POST['tel'];
            $celular = $_POST['cel'];
            $email = $_POST['emai'];
            $direccion = $_POST['dir'];
            $user = $_POST['user'];
            $password = $_POST['pass'];
            $tipo_usuario = $_POST['tipo_usuario'];
            if ($tipo_usuario == "administrador") {
                $tipo_final = 1;
            } else if ($tipo_usuario == "empleado") {
                $tipo_final = 2;
            } else {
                $tipo_final = 3;
            }
        //echo $id." ".$name." ".$last_name." ".$genero." ".$ciudad." ".$date." ".$telefono." ".$celular." ".$email." ".$direccion."".$user." ".$password." ".$tipo_final;
            $consulta_identidad = "INSERT INTO identidad(tipo_identidad,numero_identidad) VALUES('$tipo_identificacion','$id')";
            if ($resultado_identidad = consultas::insertar($consulta_identidad) == "insertado") {
                $consulta_seleccionar_id = "SELECT ididentidad FROM identidad WHERE numero_identidad=$id";
                $resultado_seleccionar_id = consultas::seleccionar($consulta_seleccionar_id);
                $consulta_persona = "INSERT INTO persona(ididentidad,nombre_persona,apellido_persona,genero,fecha_nacimiento,idciudad,direccion,telefono,estado_persona) VALUES('$resultado_seleccionar_id[0]','$name','$last_name','$genero','$date','$ciudad','$direccion','$telefono',0)";
                if ($resultado_persona = consultas::insertar($consulta_persona) == "insertado") {
                    $consulta_usuario = "INSERT INTO usuario(email_usuario,password_usuario,tipo_usuario,estado_usuario) VALUES('$email','$password','$tipo_final',0)";
                    if ($conresultado_usuario = consultas::insertar($consulta_usuario) == "insertado") {
                        $consultas = "registrado";
                        header("Location: ../Vistas/index.php?msg=$consultas");
                    } else {
                        $consultas = "no registrado";
                        header("Location: ../Vistas/index.php?msg=$consultas");
                    }
                } else {
                    $consultas = "no registrado";
                    header("Location: ../Vistas/index.php?msg=$consultas");
                }
            } else {
                $consultas = "no registrado";
                header("Location: ../Vistas/index.php?msg=$consultas");
            }
        }
    }
    //iniciar sesion Manuel Morales y julian :3
    public function iniciar_sesion()
    {
        session_start();
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $user = $_POST['user'];
            $password = $_POST['pass'];
            //echo $user+" "+$password;
            $consulta = "SELECT * FROM usuario WHERE email_usuario='$user' AND password_usuario='$password'";
            $consultas = consultas::seleccionar($consulta);
            if ($consultas["idusuario"] != "") {
                $_SESSION["nueva"] = $consultas;
                $consultas = "Bienvenido " . $consultas["idusuario"];
            }
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
            echo "<pre>";
            print_r($prov);
            echo "</pre>";
            
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
                                <a class="btn btn-outline-primary" data-toggle="modal" href="#editar"><i class="material-icons d-flex align-item-center ">edit</i> </a>
                                <a class="btn btn-outline-danger" data-toggle="modal" href="#eliminar"><i class="material-icons d-flex align-item-center ">delete</i> </a>
                            </div>
                        </td>
                    </tr>';

                header("Location: ../Vistas/index.php?msg=$consultas");
            } else {
                $consultas = "Datos incorrectos, sesion no iniciada";
                header("Location: ../Vistas/index.php?msg=$consultas");
            }
        }
    }

}