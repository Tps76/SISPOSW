<?php
require_once 'config.php';
class connection{
    private static $con = null;
    private static $pdo;
    
    final private function __construct() {
        try{
            self::getBD();
        } catch (PDOException $e){
            
        }
    }
    //Fin Constructor
    
    public static function getInstance(){
        if(self::$con===null){
            self::$con = new self();
        }
        return self::$con;
    }
    //Fin de la funcion getInstance
    
    public function  getBD(){
        if(self::$pdo == null){
            self::$pdo = new PDO('mysql:dbname='.BD.';host='.SERVER.';',
                    USER, PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
    //Fin de la funcion conexion bd
    
    public function destroyBD(){
        self::$pdo = null;
    }
    //Fin de la funcion destruir conexion bd
}

