<?php

class Conexion {
    private $servidor;
    private $usuario;
    private $pass;
    private $base_datos;
    private $descriptor;
    
    function __construct() {
        require_once 'config/bbdd.php';

        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->base_datos = $base_datos;
        $this->conectar_base_datos();
    }
    
    private function conectar_base_datos() {
        try{
            $this->descriptor = new PDO ( "mysql:host=$this->servidor;dbname=$this->base_datos; charset=utf8", $this->usuario, $this->pass );
        } catch (PDOException $ex) {
            echo "Error al intentar la conexión con BBDD: " . $ex->getMessage();
        }        
    }
    
    public function consulta($consulta) {
        return $this->descriptor->query ($consulta);
    }
    
    public function sentenciaPreparada ($consulta){
        return $this->descriptor->prepare($consulta);
    }
    
    public function ultima_fila(){
        return $this->descriptor->lastInsertId();
    }
    
    public function consultaSP ($nombreSP){
        return $this->descriptor->query('call '.$nombreSP);
    }
    
}
