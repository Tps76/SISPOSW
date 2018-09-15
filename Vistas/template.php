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
        // if (isset($_SESSION['admin']) || isset($_SESSION['empleado'])) {
        
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
<<<<<<< HEAD
                adminController::RutaAdminController();
            ?>
        </main>
    </section>
    <!-- ========= FIN NAV Y CONTENIDO ========= -->
    <!-- ========= FIN DEL DASHBOARD =========== -->
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
=======
            adminController::RutaAdminController();
            ?>
        </main>
    </section>
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- funciones propias -->
    <script src="Vistas/js/Ajax.js"></script>
    <!-- <script src="Vistas/js/selects.js"></script> -->
    <script src="Vistas/js/function.js"></script>
    <!-- <script src="Vistas/js/validar.js"></script> -->
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
    <?php 
        // }else{
    ?>
    <!-- ======================
            Tienda Virtual 
         ====================== -->
    <!-- ======= BANNER ======= -->
<<<<<<< HEAD
    <aside class="container-fluid banner row d-flex mb-3">
        <img class="img-fluid" src="src/assets/banner11.jpg" alt="">
        <h1 class="h1 text-center col-md-12">
=======
    <!-- <aside class="container-fluid banner row d-flex mb-3"> -->
        <!-- <img class="img-fluid" src="src/assets/banner11.jpg" alt=""> -->
        <!-- <h1 class="h1 text-center col-md-12"> -->
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
        <?php
        // session_start();
        // if (isset($_GET["msg"])) {
        //     if ($_GET["msg"] == "") {
        //         echo "BANNER";
        //     } else {
        //         echo $_GET["msg"];
        //     }
        // } else {
        //     echo "BANNER";
        // }
        ?>
        <!-- </h1>
    </aside> -->
    <!-- ======= HEADER SEARCH BAR ======= -->
<<<<<<< HEAD
    <header class="container-fluid row n">
        <?php 
        include "modules/header.php" 
        ?>
    </header>
    <!-- ======= FIN HEADER SEARCH BAR ======= -->
    <div class="container-fluid row">
        <!-- ======= MAIN MENU ======= -->
        <nav class="col-md-2 d">
            <?php include "modules/categories.php"; ?>
        </nav>
        <!-- ======= FIN MAIN MENU ======= -->
        <!-- ======= MAIN CONTENT ======= -->
        <main class="col-md-10">
            <?php include "modules/products.php" ?>
        </main>
        <!-- ======= MAIN CONTENT ======= -->
    </div>
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <!-- funciones necesarias -->
    <script src="Vistas/js/selects.js"></script>
    <script src="Vistas/js/function.js"></script>
    <script src="Vistas/js/validar.js"></script>
    <?php
        }
    ?>
    
=======
    <!-- <header class="container-fluid row n"> -->
        <?php //include "modules/header.php" ?>
    <!-- </header> -->
    
    <!-- <div class="container-fluid row"> -->
        <!-- ======= MAIN MENU ======= -->
        <!-- <nav class="col-md-2 d"> -->
            <?php //include "modules/categories.php"; ?>
        <!-- </nav> -->
        <!-- ======= MAIN CONTNTENT ======= -->
        <!-- <main class="col-md-10"> -->
            <?php //include "modules/products.php" ?>
        <!-- </main>
    </div> -->
    <?php
        // }
    ?>
    <!-- Librerias (Jquery, Jquery-UI, Popper, Bootstrap 4) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    
    <!-- funciones propias -->
    <!-- <script src="Vistas/js/selects.js"></script> -->
    <!-- <script src="Vistas/js/function.js"></script>
    <script src="Vistas/js/validar.js"></script> -->
>>>>>>> c45e3ec0ef56f88826e8f84cf92346c4852e5ceb
</body>
</html>