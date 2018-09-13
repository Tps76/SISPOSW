<?php

class Ruta
{
    public function rutaAdmin($enlace)
    {
        // $enlace = $url;
        if ($enlace == "panel" || $enlace == "productos" || $enlace == "addProducto" || 
            $enlace == "empleados" || $enlace == "addEmpleado" || $enlace == "clientes" || 
            $enlace == "addCliente" || $enlace == "proveedores" || $enlace == "addProveedor" ||
            $enlace == "categorias" || $enlace == "reportes") {

            $module = "Vistas/modules/". $enlace .".php";

        }else if("index"){
            $module = "Vistas/modules/panel.php";
        }else{
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