<?php

class Ruta
{
    public function rutaAdmin($enlace)
    {
        // $enlace = $url;
        if ($enlace == "panel" || $enlace == "productos" || $enlace == "addProducto" || 
            $enlace == "empleados" || $enlace == "addEmpleado" || $enlace == "clientes" || 
            $enlace == "addCliente" || $enlace == "proveedores" || $enlace == "addProveedor"||
            $enlace == "categorias") {

            $module = "Vistas/modules/". $enlace .".php";

        } elseif ($enlace == "index"){
            $module = "Vistas/modules/panel.php";
        } elseif ($enlace == "catOk"){
            $module = "Vistas/modules/categorias.php";
        } elseif ($enlace == "provOk"){
            $module = "Vistas/modules/proveedores.php";
        } elseif ($enlace == "prodOk") {
            $module = "Vistas/modules/productos.php";
        } elseif ($enlace == "cliOk") {
            $module = "Vistas/modules/clientes.php";
        } elseif ($enlace == "empOk") {
            $module = "Vistas/modules/empleados .php";
        } else{
            $module = "Vistas/modules/panel.php";
        }
        return $module;
    }
    // public function rutaCliente()
    // {
    //     // Arreglar para la página del cliente
    //     if ($enlace == "panel" || $enlace == "productos" || $enlace == "addProducto" ||
    //         $enlace == "empleados" || $enlace == "addEmpleado" || $enlace == "clientes" ||
    //         $enlace == "addCliente" || $enlace == "proveedores" || $enlace == "addProveedor") {

    //         $module = "Vistas/modules/" . $enlace . ".php";

    //     } else if ("index") {
    //         $module = "Vistas/modules/panel.php";
    //     } else {
    //         $module = "Vistas/modules/panel.php";
    //     }
    //     return $module;
    // }
}