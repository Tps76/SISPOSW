<?php
require_once("../Include/conexion.php");
class modelo_validar{
    public function __construct(){
        $accion= isset($_POST["indice"]) ? $_POST["indice"] : "Inicial";
        if($accion!="Inicial"){
            $this->seleccionar_construct($_POST["requerido"],$_POST["dato"],$_POST["campo"]);
        }
    }
    public function seleccionar_construct($requerido,$dato,$campo){
        $consulta="SELECT * FROM $dato WHERE $campo='$requerido'";
        $resultado = connection::getInstance()->getBD()->prepare($consulta);
        $resultado->execute();
        $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC); 
        if($resultado){
            if($tabla[0]){
                echo "true";
            }else{
                echo "false";
            }
        }
    }
}
new modelo_validar();
?>