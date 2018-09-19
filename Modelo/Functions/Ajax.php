<?php
require_once "../../Controlador/adminController.php";
require_once "../Process/Selects.php";
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
        $hola = json_encode($fields);
        echo $hola;
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