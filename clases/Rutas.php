<?php
class Rutas {
    
    private $controlador;
    private $opcion;
    private $id;
    
    function __construct() {
        
        $this->controlador = filter_input(INPUT_GET,"controlador"); 
        $this->opcion = filter_input(INPUT_GET,"opcion");
        $this->id = filter_input(INPUT_GET,"id"); 
        
    }
    
    function get_controlador() {
        return $this->controlador;
    }
    
    function get_opcion() {
        return $this->opcion;
    }
    
    function get_id() {
        return $this->id;
    }
}

