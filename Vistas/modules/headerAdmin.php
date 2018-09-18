<?php 
// if (isset($_SESSION['nueva']) && $_SESSION['nueva']) {
//                 # code...
//     adminController::cerrar_sesion();
//                 // echo "exite";
// }
?>
<div class="container-fluid">
    <div class="d-flex justify-content-between p-3">
        <div class="logo text-white ml-3">
            <h1>SISPOSW</h1>
        </div>
        <div class="d-flex justify-content-between">
            <span class="dropdown my-3 px-2 mr-2">
                <a class="dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu">
                    <div class="dropdown-divider"></div>
                    <form method="post">
                        <button name="cerrar" class="dropdown-item">Cerrar Sesión</button>
                    </form>
                </div>
            </span>
            <div class="profile">
                <img class="img-fluid rounded-circle tam mr-5" src="Vistas/assets/img.png" alt="">
            </div>
        </div>
    </div>
</div>