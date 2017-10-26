<?php

require_once 'clases/Conexion.php';

class modelo_vocabulario{
   
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexion();
    }
    
    function get_verbos_regulares() {
        
        $sql = "RegularVerbs_CRUD(1,null,null,null)";
        return $this->conexion->consultaSP($sql);      
    }
    
    function get_verbos_irregulares() {
        
        $sql = "IrregularVerbs_CRUD(1,null,null,null,null,null)";
        return $this->conexion->consultaSP($sql);      
    }
    
    function get_verbos_compuestos() {
        
        $sql = "PhrasalVerbs_CRUD(1,null,null,null)";
        return $this->conexion->consultaSP($sql);      
    }
    
    
}