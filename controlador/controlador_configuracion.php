<?php

require_once 'modelo/modelo_configuracion.php';

class controlador_configuracion {
    
    
    private $modelo;
    
    function __construct() {
        $this->modelo = new modelo_configuracion();
    }
    
    public function grabar_v_regular ($valores){
        global $ruta_base; 
        
        require_once ('clases/VerboRegular.php');
        $verbo = new VerboRegular ($valores["english"], $valores["spanish"]);
        
        $resultado = $this->modelo->insert_verbo_regular($verbo);
        
        if ($resultado>0){
            header('Location: ' . $ruta_base . "/configuracion/NuevoVerboRegular");
        }
        
    }     
}