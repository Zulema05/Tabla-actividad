<?php

require_once "controladores/rutas.controlador.php";
require_once "controladores/actividad.controlador.php";

require_once "modelos/actividad.modelo.php";


$rutas = new controladorRutas();
$rutas -> index();