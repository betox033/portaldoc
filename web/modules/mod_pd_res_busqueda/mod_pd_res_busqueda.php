<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$especialidad = $_POST['especialidad'];
$ubicacion = $_POST['ubicacion'];
$prevision = $_POST['prevision'];
$servicio = $_POST['servicio'];

$criterios = "ESPECIALIDAD: " . $especialidad . "<br>UBICACION: " . $ubicacion . "<br>PREVISION: " . $prevision . "<br>SERVICIO: " . $servicio;





$lista_medicos = modPdResBusquedaHelper::get_medicos_busqueda($especialidad, $ubicacion, $prevision, $servicio);








require JModuleHelper::getLayoutPath('mod_pd_res_busqueda');








?>