<?php
require_once("conexion.php");
class modelo_validar{
    public function __construct(){
        $accion= isset($_POST["indice"]) ? $_POST["indice"] : "Inicial";
        if($accion!="Inicial"){
            $this->seleccionar_construct($_POST["requerido"],$_POST["dato"]);
        }
    }
    public function seleccionar_construct($requerido,$dato){
        $conexion=conexion::credencial();
        $consulta="SELECT * FROM $dato WHERE numero_identidad=$requerido";
        $resultado=mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado)>0){
            echo "true";
        }else{
            echo "false";
        }
    }
}
new modelo_validar();
?>