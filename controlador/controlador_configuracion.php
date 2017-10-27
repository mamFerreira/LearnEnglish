<?php

require_once 'modelo/modelo_configuracion.php';

class controlador_configuracion {
    
    
    private $modelo;
    
    function __construct() {
        $this->modelo = new modelo_configuracion();
    }
    
    public function guardar_verbo ($tipo,$valores){
        global $ruta_base; 
        
        if ($tipo == 1){
            require_once ('clases/VerboRegular.php');
            $verbo = new VerboRegular ($valores["english"], $valores["spanish"]);

            $resultado = $this->modelo->insert_verbo_regular($verbo);

            if ($resultado>0){
                header('Location: ' . $ruta_base . "/configuracion/NuevoVerboRegular");
            }
        }
        
    }   
    
    public function borrar_verbo ($tipo,$id){
        
        $salida = $this->modelo->borrar_verbo($tipo,$id);
        $resultado = -1;
        
        foreach ($salida as $s) {
            $resultado = $s[0];
        }
        
        return $resultado;
        
    }
    
    public function obtener_opciones_tipo (){
        
        $tipos = $this->modelo->get_tipos();
        
        $resultado = "";
        foreach ($tipos as $t) {            
            $resultado .= "<option value=\"$t[0]\">$t[1]</option>";
        }
        
        return $resultado;
        
    }
}