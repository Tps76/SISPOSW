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

    //         $module = "views/modules/" . $enlace . ".php";

    //     } else if ("index") {
    //         $module = "views/modules/panel.php";
    //     } else {
    //         $module = "views/modules/panel.php";
    //     }
    //     return $module;
    // }
}