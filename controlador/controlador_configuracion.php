<?php

require_once 'modelo/modelo_configuracion.php';

class controlador_configuracion {
    
    
    private $modelo;
    
    function __construct() {
        $this->modelo = new modelo_configuracion();
    }
    
    public function guardar_verbo ($tipo,$valores){
        global $ruta_base; 
        
        $resultado = -1;
        
        if ($tipo == 1){
            require_once ('clases/VerboRegular.php');
            $verbo = new VerboRegular ($valores["verb"], $valores["translation"]);
            $resultado = $this->modelo->insert_verbo_regular($verbo); 
            $url = "NuevoVerboRegular";
        }
        
        if ($tipo == 2){
            require_once ('clases/VerboIrregular.php');
            $verbo = new VerboIrregular ($valores["infinitive"], $valores["past_simple"],$valores["past_participle"], $valores["translation"]);
            $resultado = $this->modelo->insert_verbo_irregular($verbo);  
            $url = "NuevoVerboIrregular";
        }
        
        if ($tipo == 3){
            require_once ('clases/VerboCompuesto.php');
            $verbo = new VerboCompuesto ($valores["verb"], $valores["translation"]);
            $resultado = $this->modelo->insert_verbo_compuesto($verbo);  
            $url = "NuevoVerboCompuesto";
        }
        
        if ($tipo == 4){
            require_once ('clases/OtroVocabulario.php');
            $otro = new OtroVocabulario ($valores["type"], $valores["english"] ,$valores["translation"]);
            $resultado = $this->modelo->insert_otro_vocabulario($otro); 
            $url = "NuevoOtroVocabulario";
        }
        
        if ($resultado>0){
                header('Location: ' . $ruta_base . "/configuracion/$url");
        }else{
            echo "Error al añadir elemento";
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