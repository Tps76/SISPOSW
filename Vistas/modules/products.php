<div class="container-fluid row mt-3">
<?php 
    if(isset($_POST['buscar'])){
        $code = $_POST['buscar'];
        ClientController::searchProds($code);
    }elseif (isset($_GET['action'])) {
        $enlaces = $_GET['action'];
        ClientController::categories();
    } elseif (isset($_POST['buscar']) && isset($_GET['action'])) {
        $code = $_POST['buscar'];
        ClientController::searchProds($code);
    } else {
        ClientController::getProd();
    }
?>
</div>