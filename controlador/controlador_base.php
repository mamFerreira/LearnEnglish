<?php

require_once 'controlador_vocabulario.php';

class controlador_base{
    
    private $rutas;
    private $pagina;
    
    function __construct() {
        $this->pagina = file_get_contents("vista/defecto.php");
    }
    
    function set_rutas ($rutas) {
        $this->rutas = $rutas;
    }
    
    function repartidor() {
        if (method_exists($this, $this->rutas->get_controlador())) {
            $controlador = $this->rutas->get_controlador();
            $opcion = $this->rutas->get_opcion();
            $this->$controlador($opcion);
        } else {
            $this->home();
        }
    }
           
    private function render_pagina($titulo) {
        global $ruta_base;                
        
        $this->pagina = preg_replace("/\#HEAD\#/ms", file_get_contents("vista/head.php"), $this->pagina);
        $this->pagina = preg_replace("/\#MENU\#/ms", file_get_contents("vista/menu.php"), $this->pagina);                            
        
        $this->pagina = preg_replace("/\#PIE\#/ms", file_get_contents("vista/pie.php"), $this->pagina);
        $this->pagina = preg_replace("/\#TITULO\#/ms", "Learn English - ".$titulo, $this->pagina);
        $this->pagina = preg_replace("/\#RUTA_BASE\#/ms", $ruta_base, $this->pagina);
        
        $this->pagina = $this->activar_menu($this->pagina);  
        
        echo $this->pagina;
    }
    
    private function render_contenedor ($sub_vista){
        $this->pagina = preg_replace("/\#CONTENEDOR\#/ms", file_get_contents("vista/subvistas/".$sub_vista), $this->pagina);  
    }
    
    private function activar_menu($pagina) {

        switch ($this->rutas->get_controlador()) {
            case "home":
                $pagina = preg_replace("/\#OPCION1\#/ms", "activa", $pagina);                         
                break;
            case "gramatica":
                $pagina = preg_replace("/\#OPCION2\#/ms", "activa", $pagina);                             
                break;
            case "vocabulario":
                $pagina = preg_replace("/\#OPCION3\#/ms", "activa", $pagina);                           
                break;
            case "ejercicios":
                $pagina = preg_replace("/\#OPCION4\#/ms", "activa", $pagina);                             
                break;
            case "configuracion":                
                $pagina = preg_replace("/\#OPCION5\#/ms", "activa", $pagina);                          
                break;
            case "sobre_mi":
                $pagina = preg_replace("/\#OPCION6\#/ms", "activa", $pagina);                              
                break;           
        }
        
        for ($i=1; $i<7; $i++){
            $pagina = preg_replace("/\#OPCION".$i."\#/ms", "", $pagina);
        }
        
        
        return $pagina;
    }
           
    private function home() {
        
        $this->render_contenedor("home.php"); 
        $this->render_pagina("Inicio");
               
    }
        
    private function gramatica($opcion) {
        
        switch ($opcion){
            default:
                $this->render_contenedor("gramatica.php"); 
        }
        
        $this->render_pagina("Gramática");
        
    }
    
    private function vocabulario($opcion){
        
        require_once ('controlador_vocabulario.php');
        $controlador_v = new controlador_vocabulario();
        
        $titulo = "Vocabulario";
        
        switch ($opcion){
            case "verbosRegulares":
                $this->render_contenedor("listadoVerbosRegulares.php");    
                $this->pagina = preg_replace("/\#BLOQUE\#/ms", $controlador_v->obtener_verbos_regulares(), $this->pagina);
                $titulo .= ": Verbos Regulares";
                break;
            case "verbosIrregulares":
                $this->render_contenedor("listadoVerbosIrregulares.php");  
                $this->pagina = preg_replace("/\#BLOQUE\#/ms", $controlador_v->obtener_verbos_irregulares(), $this->pagina);                
                $titulo .= ": Verbos Irregulares";
                break;
            case "verbosCompuestos":
                $this->render_contenedor("listadoVerbosCompuestos.php");  
                $this->pagina = preg_replace("/\#BLOQUE\#/ms", $controlador_v->obtener_verbos_compuestos(), $this->pagina);                
                $titulo .= ": Verbos Compuestos";
                break;
            case "otroVocabulario":
                $this->render_contenedor("listadoOtroVocabulario.php");                            
                $titulo .= ": Otro Vocabulario";
                break;
            default:
                $this->render_contenedor("vocabulario.php");                  
        }
        $this->render_pagina($titulo);
    }
    
    private function configuracion($opcion){
        
        $titulo = "Configuracion";
        
        switch ($opcion){
            case "NuevoVerboRegular":
                    $this->render_contenedor("AnadirVerboRegular.php");                        
                    $titulo .= ": Verbos Regulares";
                break;
            
            default:
                $this->render_contenedor("configuracion.php"); 
        }
        
        $this->render_pagina($titulo);
    }
    
    private function grabar ($opcion){
        
        require_once ('controlador_configuracion.php');
        $controlador_c = new controlador_configuracion();
        
        switch ($opcion){
            case "VerboRegular":
                return $controlador_c->grabar_v_regular ($_POST);
        }
                
    }
    
        
}