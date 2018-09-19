<?php
require_once "../../Controlador/adminController.php";
require_once "../Process/Selects.php";
require_once "../Process/producto.php";
require_once "../Process/Proveedor.php";
require_once "../Process/Usuario.php";
require_once "../Include/conexion.php";

class Ajax
{
    public function selectCiudad($id)
    {
        $ciudad = adminController::selectCiudad($id);
        echo $ciudad;
    }
    public function selectDepto($id)
    {
        $depto = adminController::selectDepto($id);
        echo $depto;
    }
    public function fieldsCliente($id)
    {
        $fields = Usuario::getCliente($id, "");
        echo json_encode($fields);
    }
    public function fieldsProveedor($id)
    {
        $fields = Proveedor::getProv($id, "");
        echo json_encode($fields);
    }
    public function fieldsCategoria($id)
    {
        $fields = Usuario::getCliente($id, "");
        echo json_encode($fields);
    }
    public function fieldsProducto($id)
    {
        $fields = producto::getProd($id);
        echo json_encode($fields);
    }
    public function fieldsEmpleado($id)
    {
        $fields = Usuario::getEmpleado($id, "");
        echo json_encode($fields);
    }
}
if (isset($_POST['idPais'])) {
    $id = $_POST['idPais'];
    $pais = new Ajax();
    $pais->selectDepto($id);
}
if (isset($_POST['idDepto'])) {
    $id = $_POST['idDepto'];
    $depto = new Ajax();
    $depto->selectCiudad($id);
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $modify = new Ajax();
    $modify->fieldsCliente($id);
}
if (isset($_POST['idemp'])) {
    $id = $_POST['idemp'];
    $modify = new Ajax();
    $modify->fieldsEmpleado($id);
}
if (isset($_POST['idprod'])) {
    $id = $_POST['idprod'];
    $modify = new Ajax();
    $modify->fieldsProducto($id);
}
if (isset($_POST['idprov'])) {
    $id = $_POST['idprov'];
    $modify = new Ajax();
    $modify->fieldsProveedor($id);
}