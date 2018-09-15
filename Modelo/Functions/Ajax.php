<?php
require_once "../../Controlador/adminController.php";
require_once "../Process/Selects.php";
require_once "../Include/conexion.php";

class Ajax
{
    public function selectCiudad($id)
    {
        $answer = adminController::selectCiudad($id);
        echo $answer;
    }
    public function selectDepto($id)
    {
        $depto = adminController::selectDepto($id);
        echo $depto;
    }
}
if ($_POST['idPais']) {
    $id = $_POST['idPais'];
    $pais = new Ajax();
    $pais->selectDepto($id);
}
if ($_POST['idDepto']) {
    $id = $_POST['idDepto'];
    $depto = new Ajax();
    $depto->selectCiudad($id);
}
