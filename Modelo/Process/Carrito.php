<?php

class Carrito
{
    public function searchItem($id)
    {
        $consulta = "SELECT cod_prod, nom_prod, precio_prod FROM productos WHERE cod_prod = '$id'";
        $con = Connection::getInstance();
        $db = $con->getBD();
        $stmt = $db->prepare($consulta);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }else{
            return 0;
        }

    }
}
