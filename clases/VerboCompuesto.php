<?php

class VerboCompuesto {
    
    private $id;
    private $verboIngles;
    private $verboEspanol;
    
    function __construct($verboIngles,$verboEspanol) {
        $this->verboIngles = $verboIngles;
        $this->verboEspanol = $verboEspanol;
    }
    
    function get_verbo_ingles (){
        return $this->verboIngles;
    }
    
    function get_verbo_espanol (){
        return $this->verboEspanol;
    }
    
}
