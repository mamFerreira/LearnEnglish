<?php

class VerboIrregular {
    
    private $id;
    private $infinitive;
    private $past_simple;
    private $past_participle;
    private $spanish;
    
    function __construct($i,$ps,$pp,$s) {
        $this->infinitive = $i;
        $this->past_simple = $ps;
        $this->past_participle = $pp;
        $this->spanish = $s;
    }
    
    function get_infinitivo (){
        return $this->infinitive;
    }
    
    function get_pasado_simple (){
        return $this->past_simple;
    }
    
    function get_pasado_participio (){
        return $this->past_participle;
    }
    
    function get_espanol (){
        return $this->spanish;
    }
        
}

