<?php

require_once 'clases/Conexion.php';

class modelo_configuracion {
    
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexion();
    }
    
    function insert_verbo_regular(VerboRegular $verbo){
        $english_v = $verbo->get_verbo_ingles();
        $spanish_v = $verbo->get_verbo_espanol();
        $sql = "RegularVerbs_CRUD(3,null,'$english_v','$spanish_v')";
        
        return $this->conexion->consultaSP($sql); 
    }
    
    function insert_verbo_irregular(VerboIrregular $verbo){
        $infinitive = $verbo->get_infinitivo();
        $past_simple = $verbo->get_pasado_simple();
        $past_participle = $verbo->get_pasado_participio();
        $spanish = $verbo->get_espanol();        
        $sql = "IrregularVerbs_CRUD(3,null,'$infinitive','$past_simple','$past_participle','$spanish')";

        return $this->conexion->consultaSP($sql); 
    }
    
    function insert_verbo_compuesto(VerboCompuesto $verbo){
        $english_v = $verbo->get_verbo_ingles();
        $spanish_v = $verbo->get_verbo_espanol();
        $sql = "PhrasalVerbs_CRUD(3,null,'$english_v','$spanish_v')";       
        
        return $this->conexion->consultaSP($sql); 
    }
    
    function  insert_otro_vocabulario (OtroVocabulario $p){
        $tipo = $p->get_tipo();
        $english = $p->get_ingles();
        $spanish = $p->get_espanol();
        $sql = "OtherVocabulary_CRUD(3,null,'$english','$spanish',$tipo)";       
        
        return $this->conexion->consultaSP($sql); 
    }
            
    function borrar_verbo ($tipo, $id){
        
        if ($tipo==1){
            $sql = "RegularVerbs_CRUD(5,$id,null,null)";
        }
        
        if ($tipo==2){
            $sql = "IrregularVerbs_CRUD(5,$id,null,null,null,null)";
        }
        
        if ($tipo==3){
            $sql = "PhrasalVerbs_CRUD(5,$id,null,null)";
        }
        
        if ($tipo==4){
            $sql = "OtherVocabulary_CRUD(5,$id,null,null,null)";
        }
        
        return $this->conexion->consultaSP($sql); 
    }
    
    function get_tipos () {
        
        $sql = "TypeWord_CRUD(1,null,null)";
        
        return $this->conexion->consultaSP($sql);         
    }
    
}