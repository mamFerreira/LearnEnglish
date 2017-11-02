<?php

require_once 'clases/Conexion.php';

class modelo_configuracion {
    
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexion();
    }
    
    function obtenerEjercicios ($tipo,$numero){
        
          $sql = "GetExercises($tipo,$numero)"; 
          
          return $this->conexion->consultaSP($sql);
                    
    }
    
    function obtenerNumeroVerbosRegular (){
        $sql = "RegularVerbs_CRUD(6,null,null,null)";       
        $salida = $this->conexion->consultaSP($sql);
        
        foreach ($salida as $s) {
            $resultado = $s[0];
        }
        
        return (int) $resultado;
    }
    
    function obtenerNumeroVerbosIrregular (){
        $sql = "IrregularVerbs_CRUD(6,null,null,null,null,null)";       
        $salida = $this->conexion->consultaSP($sql);
        
        foreach ($salida as $s) {
            $resultado = $s[0];
        }
        
        return (int) $resultado;
    }
    
    function obtenerNumeroVerbosCompuestos (){
        $sql = "PhrasalVerbs_CRUD(6,null,null,null)";       
        $salida = $this->conexion->consultaSP($sql);
        
        foreach ($salida as $s) {
            $resultado = $s[0];
        }
        
        return (int) $resultado;
    }
    
    function obtenerOtroVocabulario (){
        $sql = "OtherVocabulary_CRUD(6,null,null,null,null)";       
        $salida = $this->conexion->consultaSP($sql);
        
        foreach ($salida as $s) {
            $resultado = $s[0];
        }
        
        return (int) $resultado;
    }
    
    function corregirVerboRegular ($id, $valor,&$pregunta, &$solucion){
        $sql = "RegularVerbs_CRUD (7,$id,'$valor',null)";       
        $salida = $this->conexion->consultaSP($sql);
        $resultado = false;

        foreach ($salida as $s) {
            $resultado = $s[0];
            $pregunta = $s[1];
            $solucion = $s[2];
        }
        
        return (bool) $resultado;
    }
    
    function corregirVerboIrregular ($id, $valor,&$pregunta, &$solucion){
        $sql = "IrregularVerbs_CRUD (7,$id,'$valor[0]','$valor[1]','$valor[2]',null)";       
        $salida = $this->conexion->consultaSP($sql);
        $resultado = false;
        
        foreach ($salida as $s) {
            $resultado = $s[0];
            $pregunta = $s[1];
            $solucion = array ($s[2],$s[3],$s[4]);
        }
        
        return (bool) $resultado;
    }
    
    function corregirVerboCompuesto ($id, $valor,&$pregunta, &$solucion){
        $sql = "PhrasalVerbs_CRUD (7,$id,'$valor',null)";       
        $salida = $this->conexion->consultaSP($sql);
        $resultado = false;

        foreach ($salida as $s) {
            $resultado = $s[0];
            $pregunta = $s[1];
            $solucion = $s[2];
        }
        
        return (bool) $resultado;
    }
    
    function corregirOtroVocabulario ($id, $valor,&$pregunta, &$solucion, &$tipo){
        $sql = "OtherVocabulary_CRUD (7,$id,'$valor',null,null)";       
        $salida = $this->conexion->consultaSP($sql);
        $resultado = false;

        foreach ($salida as $s) {
            $resultado = $s[0];
            $pregunta = $s[1];
            $solucion = $s[2];
            $tipo = $s[3];
        }
        
        return (bool) $resultado;
    }
    
    
}