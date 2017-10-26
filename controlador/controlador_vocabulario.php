<?php

require_once 'modelo/modelo_vocabulario.php';

class controlador_vocabulario {
    
    private $modelo;
    
    function __construct() {
        $this->modelo = new modelo_vocabulario();
    }
    
    function obtener_verbos_regulares (){
        
        $verbos = $this->modelo->get_verbos_regulares();
        
        $resultado = "";
        foreach ($verbos as $v) {
            $resultado .= "<tr><td>$v[1]</td><td>$v[2]</td></tr>";
        }
        
        return $resultado;
    }
    
    
    function obtener_verbos_irregulares (){
        
        $verbos = $this->modelo->get_verbos_irregulares();
        
        $resultado = "";
        foreach ($verbos as $v) {
            $resultado .= "<tr><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td><td>$v[4]</td></tr>";
        }
        
        return $resultado;
    }
    
    function obtener_verbos_compuestos (){
        
        $verbos = $this->modelo->get_verbos_compuestos();
        
        $resultado = "";
        foreach ($verbos as $v) {
            $traduccion = str_replace("|", ", ", $v[2]);
            $resultado .= "<tr><td>$v[1]</td><td>$traduccion</td></tr>";
        }
        
        return $resultado;
    }
}


