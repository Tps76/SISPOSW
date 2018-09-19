<?php
require_once("../Include/conexion.php");

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
        $consulta="SELECT * FROM pais order by nombre_pais asc";
        echo '<option value="0">Seleccione su país</option>';
        try{
            $resultado = connection::getInstance()->getBD()->prepare($consulta);
            $resultado->execute(); 
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach($tabla as $resultados){
                echo '<option value="'.$resultados["idpais"].'">'.$resultados["nombre_pais"].'</option>';
            }
        }catch(PDOException $e){
            echo $e;
        }    
    }


    public function seleccionar($indice,$requerido,$contencion){
        $consulta="SELECT * FROM $requerido WHERE id".$contencion."=$indice ORDER BY nombre_".$requerido." ASC";
        echo '<option value="0">Seleccione su '.$requerido.'</option>';
        try{
            $resultado = connection::getInstance()->getBD()->prepare($consulta);
            $resultado->execute(); 
            $tabla = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach($tabla as $resultados){
                echo '<option value="'.$resultados["id".$requerido].'">'.$resultados["nombre_".$requerido].'</option>';
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
}
new modelo_combos();
?>