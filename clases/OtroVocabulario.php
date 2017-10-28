<?php

class OtroVocabulario {
    
    private $id;
    private $tipo;
    private $ingles;
    private $espanol;
    
    function __construct($_tipo,$_ingles,$_espanol) {
        $this->tipo = $_tipo;
        $this->ingles = $_ingles;
        $this->espanol = $_espanol;
    }
    
    function get_tipo (){
        return $this->tipo;
    }
    
    function get_ingles (){
        return $this->ingles;
    }
    
    function get_espanol (){
        return $this->espanol;
    }
    
}

