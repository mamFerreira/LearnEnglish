<?php

require_once 'clases/Conexion.php';

class modelo_configuracion {
    
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexion();
    }
    
    function insert_verbo_regular(VerboRegular $verbo){
        $sql = "INSERT INTO regular_verbs(english_verb,spanish_verb) values(:english,:spanish)";
        $sentencia = $this->conexion->sentenciaPreparada($sql);
        $sentencia->bindValue(":english", $verbo->get_verbo_ingles(), PDO::PARAM_STR);
        $sentencia->bindValue(":spanish", $verbo->get_verbo_espanol(), PDO::PARAM_STR);
        $sentencia->execute();
        return $this->conexion->ultima_fila();
    }
    
    function borrar_verbo ($tipo, $id){
        
        if ($tipo==1){
            $sql = "RegularVerbs_CRUD(5,$id,null,null)";
        }
        
        return $this->conexion->consultaSP($sql); 
    }
    
}