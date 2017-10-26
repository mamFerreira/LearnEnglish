<?php
//Establece la zona horaria predeterminada usada por todas las funciones de fecha/hora
date_default_timezone_set('Europe/Madrid');
require_once("clases.php");
$rutas = new Rutas();
$controlador = new controlador_base();
$controlador->set_rutas($rutas);
$controlador->repartidor();