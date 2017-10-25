<?php

class controlador_base{
    
    private $rutas;
    
    function __construct() {
        
    }
    
    function set_rutas ($rutas) {
        $this->rutas = $rutas;
    }
    
    function repartidor() {
        if (method_exists($this, $this->rutas->get_controlador())) {
            $ruta = $this->rutas->get_controlador();
            $this->$ruta();
        } else {
            $this->defecto();
        }
    }
           
    private function render_pagina($titulo, $pagina_contenedor) {
        $pagina = file_get_contents("vista/defecto.php");
        
        $pagina = preg_replace("/\#HEAD\#/ms", file_get_contents("vista/head.php"), $pagina);
        $pagina = preg_replace("/\#MENU\#/ms", file_get_contents("vista/menu.php"), $pagina);
        $pagina = $this->activar_menu($pagina,$titulo);
        $pagina = preg_replace("/\#CONTENEDOR\#/ms", file_get_contents("vista/subvistas/".$pagina_contenedor), $pagina);
        $pagina = preg_replace("/\#PIE\#/ms", file_get_contents("vista/pie.php"), $pagina);
        $pagina = preg_replace("/\#TITULO\#/ms", "Learn English - ".$titulo, $pagina);
        
        echo $pagina;
    }
    
    private function activar_menu($pagina,$titulo) {
        switch ($titulo) {
            case "Inicio":
                $pagina = preg_replace("/\#OPCION1\#/ms", "class='activa'", $pagina);
                $pagina = preg_replace("/\#OPCION2\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION3\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION4\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION5\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION6\#/ms", "", $pagina);               
                break;
            case "Gramática":
                $pagina = preg_replace("/\#OPCION2\#/ms", "activa", $pagina);
                $pagina = preg_replace("/\#OPCION1\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION3\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION4\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION5\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION6\#/ms", "", $pagina);               
                break;
            case "Vocabulario":
                $pagina = preg_replace("/\#OPCION3\#/ms", "activa", $pagina);
                $pagina = preg_replace("/\#OPCION2\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION1\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION4\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION5\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION6\#/ms", "", $pagina);               
                break;
            case "Ejercicios":
                $pagina = preg_replace("/\#OPCION4\#/ms", "class='activa'", $pagina);
                $pagina = preg_replace("/\#OPCION2\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION3\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION1\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION5\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION6\#/ms", "", $pagina);               
                break;
            case "Configuración":
                $pagina = preg_replace("/\#OPCION5\#/ms", "class='activa'", $pagina);
                $pagina = preg_replace("/\#OPCION2\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION3\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION4\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION1\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION6\#/ms", "", $pagina);               
                break;
            case "Sobre mi":
                $pagina = preg_replace("/\#OPCION6\#/ms", "class='active'", $pagina);
                $pagina = preg_replace("/\#OPCION2\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION3\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION4\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION5\#/ms", "", $pagina);
                $pagina = preg_replace("/\#OPCION1\#/ms", "", $pagina);               
                break;           
        }
        return $pagina;
    }
    
    function home() {
        $this->render_pagina("Inicio","home.php");
    }
    
    function gramatica() {
        $this->render_pagina("Gramática","gramatica.php");
    }
    
    function vocabulario(){
        $this->render_pagina("Vocabulario","vocabulario.php");
    }
    
        
}