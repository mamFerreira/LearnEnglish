<?php

require_once 'modelo/modelo_ejercicios.php';

class controlador_ejercicios {

    private $modelo;
    private $numero;
    private $numeroMaximo;
    private $tipo;

    function __construct() {
        $this->modelo = new modelo_configuracion();
    }

    function cargar($valores) {
        $this->numero = (int) $valores["inputNumero"];
        $this->tipo = $valores["selectTemario"];

        $this->numeroMaximo = array(
            $this->modelo->obtenerNumeroVerbosRegular(),
            $this->modelo->obtenerNumeroVerbosIrregular(),
            $this->modelo->obtenerNumeroVerbosCompuestos(),
            $this->modelo->obtenerOtroVocabulario()
        );
    }

    function generarEjercicios() {
        $reparto = $this->ObtenerReparto();

        $resultado = "<input type=\"hidden\" name=\"numberR\" value=\"$reparto[0]\" />";
        $resultado .= "<input type=\"hidden\" name=\"numberI\" value=\"$reparto[1]\" />";
        $resultado .= "<input type=\"hidden\" name=\"numberC\" value=\"$reparto[2]\" />";
        $resultado .= "<input type=\"hidden\" name=\"numberO\" value=\"$reparto[3]\" />";

        if ($reparto[0] > 0) {
            $resultado .= $this->generarEjerciciosR($reparto[0]);
        }

        if ($reparto[1] > 0) {
            $resultado .= $this->generarEjerciciosI($reparto[1]);
        }

        if ($reparto[2] > 0) {
            $resultado .= $this->generarEjerciciosC($reparto[2]);
        }

        if ($reparto[3] > 0) {
            $resultado .= $this->generarEjerciciosO($reparto[3]);
        }

        return $resultado;
    }

    function corregirEjercicios($valores) {
        $resultado = "";

        $numeroR = (int) $valores["numberR"];
        $numeroI = (int) $valores["numberI"];
        $numeroC = (int) $valores["numberC"];
        $numeroO = (int) $valores["numberO"];   
        
        if ($numeroR>0){
            $resultado .= $this->corregirEjerciciosR($valores,$numeroR);
        }
        
        if ($numeroI>0){
            $resultado .= $this->corregirEjerciciosI($valores,$numeroI);
        }
        
        if ($numeroC>0){
            $resultado .= $this->corregirEjerciciosC($valores,$numeroC);
        }
        
        if ($numeroO>0){
            $resultado .= $this->corregirEjerciciosO($valores,$numeroO);
        }       
        
        return $resultado;
    }

    private function ObtenerReparto() {

        $numeroTipo = array(0, 0, 0, 0);
        $numeroElementos = count($this->tipo);
        $i = 0;

        while ($i < ($numeroElementos - 1)) {
            $numeroTipo[$this->tipo[$i]] = min($this->numeroMaximo[$this->tipo[$i]], rand(1, $this->numero - 4 + $i - $this->ObtenerSuma($numeroTipo)));
            $i++;
        }

        $numeroTipo[$this->tipo[$i]] = min($this->numeroMaximo[$this->tipo[$i]], $this->numero - $this->ObtenerSuma($numeroTipo));


        return $numeroTipo;
    }

    private function ObtenerSuma($vector) {
        $suma = 0;

        foreach ($vector as $v) {
            $suma += $v;
        }

        return $suma;
    }

    private function generarEjerciciosR($numero) {
        $resultado = "<legend>Regular Verbs</legend>";
        $contador = 0;

        $ejercicios = $this->modelo->obtenerEjercicios(0, $numero);

        foreach ($ejercicios as $e) {
            $resultado .= "<div class=\"form-group\">";
            $resultado .= "<label class=\"control-label col-sm-3\">$e[1]</label>";
            $resultado .= "<div class=\"col-sm-9\">";
            $resultado .= "<input type=\"text\" name=\"R_SOL_$contador\" placeholder=\"Infinitive\" required=\"true\"  />";
            $resultado .= "<input type=\"hidden\" name=\"R_ID_$contador\" value=\"$e[0]\"/>";
            $resultado .= "</div></div>";
            $contador += 1;
        }

        return $resultado;
    }

    private function generarEjerciciosI($numero) {
        $resultado = "<legend>Irregular Verbs</legend>";
        $contador = 0;

        $ejercicios = $this->modelo->obtenerEjercicios(1, $numero);

        foreach ($ejercicios as $e) {
            $resultado .= "<div class=\"form-group\">";
            $resultado .= "<label class=\"control-label col-sm-3\">$e[1]</label>";
            $resultado .= "<div class=\"col-sm-3\"><input type=\"text\" name=\"I_SOL1_$contador\" placeholder=\"Infinitive\" required=\"true\" ></div>";
            $resultado .= "<div class=\"col-sm-3\"><input type=\"text\" name=\"I_SOL2_$contador\" placeholder=\"Past Simple\" required=\"true\" ></div>";
            $resultado .= "<div class=\"col-sm-3\"><input type=\"text\" name=\"I_SOL3_$contador\" placeholder=\"Past Participle\" required=\"true\" ></div>";
            $resultado .= "<input type=\"hidden\" name=\"I_ID_$contador\" value=\"$e[0]\"/>";
            $resultado .= "</div>";
            $contador += 1;
        }

        return $resultado;
    }

    private function generarEjerciciosC($numero) {
        $resultado = "<legend>Phrasal Verbs</legend>";
        $contador = 0;

        $ejercicios = $this->modelo->obtenerEjercicios(2, $numero);

        foreach ($ejercicios as $e) {
            $resultado .= "<div class=\"form-group\">";
            $resultado .= "<label class=\"control-label col-sm-3\">$e[1]</label>";
            $resultado .= "<div class=\"col-sm-9\">";
            $resultado .= "<input type=\"text\" name=\"C_SOL_$contador\" placeholder=\"English Verb\" required=\"true\" />";
            $resultado .= "<input type=\"hidden\" name=\"C_ID_$contador\" value=\"$e[0]\"/>";
            $resultado .= "</div></div>";
            $contador += 1;
        }

        return $resultado;
    }

    private function generarEjerciciosO($numero) {
        $resultado = "<legend>Other Vocabulary</legend>";
        $contador = 0;

        $ejercicios = $this->modelo->obtenerEjercicios(3, $numero);

        foreach ($ejercicios as $e) {           
            $resultado .= "<div class=\"form-group\">";
            $resultado .= "<label class=\"control-label col-sm-3\">$e[1] ($e[2])</label>";
            $resultado .= "<div class=\"col-sm-9\">";
            $resultado .= "<input type=\"text\" name=\"O_SOL_$contador\" placeholder=\"English\" required=\"true\" />";
            $resultado .= "<input type=\"hidden\" name=\"O_ID_$contador\" value=\"$e[0]\"/>";
            $resultado .= "</div></div>";
            $contador += 1;
        }

        return $resultado;
    }
    
    private function corregirEjerciciosR($valores,$numero){
        
        $resultado = "";
        
         for ($i = 0; $i < $numero; $i++) {
            $pregunta = "";
            $solucion = "";

            if ($i == 0) {
                $resultado .= "<legend>Regular Verbs</legend>";
            }

            if ($this->modelo->corregirVerboRegular($valores["R_ID_$i"], $valores["R_SOL_$i"], $pregunta, $solucion)) {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#128C07;\" >";
            } else {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#A80505;\" >";
            }

            $resultado .= "<div class=\"col-sm-4\">Question: <strong>$pregunta</strong></div>";
            $resultado .= "<div class=\"col-sm-8\">Answer: <strong>". strtoupper($valores["R_SOL_$i"]) . " ($solucion)</strong></div>";            
            $resultado .= "</div>";
        }                
        
        return $resultado;
    }
    
    private function corregirEjerciciosI($valores,$numero){
        
         $resultado = "";
        
        for ($i = 0; $i < $numero; $i++) {
            $pregunta = "";
            $solucion = "";

            if ($i == 0) {
                $resultado .= "<legend>Irregular Verbs</legend>";
            }

            if ($this->modelo->corregirVerboIrregular($valores["I_ID_$i"], array($valores["I_SOL1_$i"],$valores["I_SOL2_$i"],$valores["I_SOL3_$i"]), $pregunta, $solucion)) {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#128C07;\" >";
            } else {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#A80505;\" >";
            }

            $resultado .= "<div class=\"col-sm-3\">Question: <strong>$pregunta</strong></div>";
            $resultado .= "<div class=\"col-sm-3\">Answer I:<strong>". strtoupper($valores["I_SOL1_$i"]) . " ($solucion[0])</strong></div>";            
            $resultado .= "<div class=\"col-sm-3\">Answer PS: <strong>". strtoupper($valores["I_SOL2_$i"]) . " ($solucion[1])</strong></div>";            
            $resultado .= "<div class=\"col-sm-3\">Answer PP: <strong>". strtoupper($valores["I_SOL3_$i"]) . " ($solucion[2])</strong></div>";            
            $resultado .= "</div>";
        }
        
        return $resultado;
    }
    
    private function corregirEjerciciosC($valores,$numero){
        
         $resultado = "";
        
        for ($i = 0; $i < $numero; $i++) {
            $pregunta = "";
            $solucion = "";

            if ($i == 0) {
                $resultado .= "<legend>Phrasal Verbs</legend>";
            }

            if ($this->modelo->corregirVerboCompuesto($valores["C_ID_$i"], $valores["C_SOL_$i"], $pregunta, $solucion)) {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#128C07;\" >";
            } else {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#A80505;\" >";
            }

            $resultado .= "<div class=\"col-sm-4\">Question: <strong>$pregunta</strong></div>";
            $resultado .= "<div class=\"col-sm-8\">Answer: <strong>". strtoupper($valores["C_SOL_$i"]) . " ($solucion)</strong></div>";            
            $resultado .= "</div>";
        }
        return $resultado;
    }
    
    private function corregirEjerciciosO($valores,$numero){
        
         $resultado = "";
        
        for ($i = 0; $i < $numero; $i++) {
            $pregunta = "";
            $solucion = "";
            $tipo = "";

            if ($i == 0) {
                $resultado .= "<legend>Other Vocabulary</legend>";
            }

            if ($this->modelo->corregirOtroVocabulario($valores["O_ID_$i"], $valores["O_SOL_$i"], $pregunta, $solucion, $tipo)) {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#128C07;\" >";
            } else {
                $resultado .= "<div class=\"col-sm-12 panel panel-default\" style=\"color:#A80505;\" >";
            }

            $resultado .= "<div class=\"col-sm-4\">Question: <strong>$pregunta ($tipo)</strong></div>";
            $resultado .= "<div class=\"col-sm-8\">Answer: <strong>". strtoupper($valores["O_SOL_$i"]) . " ($solucion)</strong></div>";            
            $resultado .= "</div>";
        }
        return $resultado;
    }

}
