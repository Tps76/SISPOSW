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
            $vista = Ruta::rutaAdmin();
        }else{
            $vista = "Vistas/modules/panel.php";
        }
        include $vista;
    }
    public static function RutaClienteController()
    {
        if (isset($_GET['action'])) {
            $enlace = $_GET['action'];
            $vista = Ruta::rutaCliente();
        } else {
            $vista = "Vistas/modules/products.php";
        }
        include $vista;
    }

}