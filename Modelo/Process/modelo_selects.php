<?php
require_once("conexion.php");
class modelo_combos{
    public function __construct(){
        $accion= isset($_POST["indice"]) ? $_POST["indice"] : "Inicial";
        if($accion!="Inicial"){
            $this->seleccionar($_POST["indice"],$_POST["requerido"],$_POST["contencion"]);
        }else{
            $this->seleccionar_construct();
        }
    }
    public function seleccionar_construct(){
        $conexion=conexion::credencial();
        $consulta="SELECT * FROM pais";
        echo '<option value="0">Seleccione su país</option>';
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            while($datos=mysqli_fetch_array($resultado)){
                echo '<option value="'.$datos["idpais"].'">'.$datos["nombre_pais"].'</option>';
            }
        }
    }
    public function seleccionar($indice,$requerido,$contencion){
        $conexion=conexion::credencial();
        $consulta="SELECT * FROM $requerido WHERE id".$contencion."=$indice";
        $resultado=mysqli_query($conexion,$consulta);
        echo '<option value="0">Seleccione su '.$requerido.'</option>';
        if($resultado){
            while($datos=mysqli_fetch_array($resultado)){
                echo '<option value="'.$datos["id".$requerido].'">'.utf8_encode($datos["nombre_".$requerido]).'</option>';
            }
        }
    }
}
new modelo_combos();
?>