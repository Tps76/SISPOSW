<?php

class Ruta
{
    public function rutaAdmin($enlace)
    {
        // $enlace = $url;
        if ($enlace == "panel" || $enlace == "productos" || $enlace == "addProducto" || 
            $enlace == "empleados" || $enlace == "addEmpleado" || $enlace == "clientes" || 
<<<<<<< HEAD
            $enlace == "addCliente" || $enlace == "proveedores" || $enlace == "addProveedor" ||
            $enlace == "categorias" || $enlace == "reportes") {

            $module = "Vistas/modules/". $enlace .".php";

        }else if("index"){
            $module = "Vistas/modules/panel.php";
        }else{
=======
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
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
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

<<<<<<< HEAD
    //         $module = "Vistas/modules/" . $enlace . ".php";

    //     } else if ("index") {
    //         $module = "Vistas/modules/panel.php";
    //     } else {
    //         $module = "Vistas/modules/panel.php";
=======
    //         $module = "views/modules/" . $enlace . ".php";

    //     } else if ("index") {
    //         $module = "views/modules/panel.php";
    //     } else {
    //         $module = "views/modules/panel.php";
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
    //     }
    //     return $module;
    // }
}