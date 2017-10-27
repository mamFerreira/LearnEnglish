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
            $resultado .= "<tr id=\"fila$v[0]\"><td>$v[1]</td><td>$v[2]</td><td class=\"col-xs-1\">";
            $resultado .= "<a href=\"javascript:edit_row($v[0]);\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&emsp;&emsp;";
            $resultado .= "<a href=\"javascript:delete_row($v[0]);\"><span class=\"glyphicon glyphicon-trash\"></span></a>";
            $resultado .= "</td></tr>";
        }                
        
        return $resultado;
    }
    
    
    function obtener_verbos_irregulares (){
        
        $verbos = $this->modelo->get_verbos_irregulares();
        
        $resultado = "";
        foreach ($verbos as $v) {
            $resultado .= "<tr><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td><td>$v[4]</td><td class=\"col-xs-1\">";
            $resultado .= "<a href=\"javascript:edit_row($v[0]);\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&emsp;&emsp;";
            $resultado .= "<a href=\"javascript:delete_row($v[0]);\"><span class=\"glyphicon glyphicon-trash\"></span></a>";
            $resultado .= "</td></tr>";
        }
        
        return $resultado;
    }
    
    function obtener_verbos_compuestos (){
        
        $verbos = $this->modelo->get_verbos_compuestos();
        
        $resultado = "";
        foreach ($verbos as $v) {            
            $resultado .= "<tr><td>$v[1]</td><td>$v[2]</td><td class=\"col-xs-1\">";
            $resultado .= "<a href=\"javascript:edit_row($v[0]);\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&emsp;&emsp;";
            $resultado .= "<a href=\"javascript:delete_row($v[0]);\"><span class=\"glyphicon glyphicon-trash\"></span></a>";
            $resultado .= "</td></tr>";
        }
        
        return $resultado;
    }
}


