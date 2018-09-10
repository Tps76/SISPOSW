<?php

class adminController
{
    public static function Template()
    {
        if (isset($_SESSION['admin'])) {
            $template = "Vistas/";
        }
    }
    
    public static function RutaController()
    {
        if (isset($_GET['action'])) {
            $enlace = $_GET['action'];
            $vista = Ruta::rutaAdmin();
        }else{
            $vista = "Vistas/modules/panel.php";
        }
        include $vista;
    }

}