<?php

/* =====================
    Requires necesarios
   ===================== */

/* ==== Controladores ==== */ 
require_once "Controlador/adminController.php";
require_once "Controlador/CarritoController.php";
/* ==== Modelos ==== */
require_once "Modelo/Include/conexion.php";
require_once "Modelo/Include/config.php";
require_once "Modelo/Process/Carrito.php";
require_once "Modelo/Process/Usuario.php";
require_once "Modelo/Process/Ruta.php";
<<<<<<< HEAD
// require_once "Modelo/Process/.php";
/* ======================
    Constantes Necesarias
   ====================== */ 
define('TITLE1', 'Dashboard - SISPOSW');
define('TITLE2', 'Tienda Virtual - SISPOSW');
=======
require_once "Modelo/Process/categoria.php";
require_once "Modelo/Process/producto.php";
require_once "Modelo/Process/proveedor.php";
require_once "Modelo/Process/Selects.php";
require_once "Modelo/Process/uploadFile.php";
/* ======================
    Constantes Necesarias
   ====================== */
define('TITLE1', 'Dashboard - SISPOSW');
define('TITLE2', 'Tienda Virtual - SISPOSW');
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
