<?php

class rutas {
    private $id;
    private $controlador;
    
    function __construct() {
        $this->id = $_GET["id"];
        $this->controlador = $_GET["controlador"];
    }
    
    function get_controlador() {
        return $this->controlador;
    }
    function get_id() {
        return $this->id;
    }
}
