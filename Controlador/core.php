<?php

/*** =====================
    Requires necesarios
    ===================== */

/* ==== Controladores ==== */ 
require_once "Controlador/adminController.php";
require_once "Controlador/ClientController.php";
require_once "Controlador/CarritoController.php";
/* ==== Modelos ==== */
require_once "Modelo/Include/conexion.php";
require_once "Modelo/Include/config.php";
require_once "Modelo/Process/Carrito.php";
require_once "Modelo/Process/Usuario.php";
require_once "Modelo/Process/Ruta.php";
require_once "Modelo/Process/categoria.php";
require_once "Modelo/Process/producto.php";
require_once "Modelo/Process/Proveedor.php";
require_once "Modelo/Process/Selects.php";
require_once "Modelo/Process/uploadFile.php";
// require_once "Modelo/Process/pdf.php";
/* ==== Librerias ===== */ 
 require_once "vendor/autoload.php";  

/* ======================
    Constantes Necesarias
   ====================== */
define('TITLE1', 'Dashboard - SISPOSW');
define('TITLE2', 'Tienda Virtual - SISPOSW');

