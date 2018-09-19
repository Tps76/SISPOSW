<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="Vistas/css/style.css">
    <title>
        <?php  
        session_start();
            if (isset($_SESSION['admin']) || isset($_SESSION['empleado'])) {
                echo TITLE1;
            }else{
                echo TITLE2;
            }
        ?>
    </title>
</head>
<body>
    <?php 
    if (isset($_SESSION['nueva']) && $_SESSION['nueva'] && isset($_POST['cerrar'])) {
                # code...
        adminController::cerrar_sesion();
        // echo "exite";
        print_r($_SESSION);
    } 
    else {
                // echo "no existe";
        ClientController::logIn();
    }
        if (isset($_SESSION['admin']) || isset($_SESSION['empleado'])) {
        
    ?>
    <!-- ========================== 
        Dashboard Admin y empleado 
        =========================== -->

    <!-- ========= HEADER ========= -->
    <header class="row bg-info header shadow">
        <?php include "Vistas/modules/headerAdmin.php"; ?>
    </header>
    <!-- ========= FIN HEADER ========= -->
    <!-- ========= NAV Y CONTENIDO ========= -->
    <section class="mx-0 row">
        <?php include "Vistas/modules/nav.php"; ?>
        <main class="col-md-10">
            <?php 
                adminController::RutaAdminController();
            ?>
            <!-- <div id="toast" class="aviso">hola</div> -->
        </main>
    </section>
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    
    <!-- funciones propias -->
    <script src="Vistas/js/Ajax.js"></script>
    <script src="Vistas/js/selects.js"></script>
    <script src="Vistas/js/function.js"></script>
    <script src="Vistas/js/validar.js"></script>
    <?php 
         }else{
    ?>
    <!-- ======================
            Tienda Virtual 
         ====================== -->
    <!-- ======= BANNER ======= -->

    <aside class="banner row" style="max-width: 100vw;">
        <div class="col m-0">
            <div class="jumbotron jumbotron-fluid h-100 pt-4" style="min-width: 100vw; background:#008b8a;">
                <div class="container text-center">
                    <h1 class="display-4 text-white">Bienvenido</h1>
                    <p class="lead text-white m-0">Este es la tienda virtual del sistema de punto de venta SISPOSW.</p>
                    <p class="text-white"><small>copyright &copy by TPS-76.</small></p>
                </div>
            </div>
        </div>
    </aside>
    <!-- ======= HEADER SEARCH BAR ======= -->
    <header class="container-fluid row shadow p-3 m-0" style="background:#08797d;"> 
        <?php include "modules/header.php" ?>
    </header>
    <!--======= FIN HEADER SEARCH BAR ======= -->
    
    <div class="container-fluid row">


        <!-- ======= MAIN MENU ======= -->
        <nav class="col-md-2 pt-3 text-white" style="min-height: 63.3vh; background:#1a151c;"> 
            <?php include "modules/categories.php"; ?>
        </nav>
        <!-- ======= MAIN CONTNTENT ======= -->
        <main class="col-md-10">
            <?php include "modules/products.php" ?>
            <div id="toast" class="d-none aviso">hola</div>
        </main>
    </div>
    <?php
         }
    ?>
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- funciones propias -->
    <script src="Vistas/js/selects.js"></script>
    <script src="Vistas/js/function.js"></script>
    <script src="Vistas/js/validar.js"></script>
</body>
</html>