<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$especialidad = $_POST['especialidad'];
$ubicacion = $_POST['ubicacion'];
if($ubicacion == "Cualquiera"){
	$ubicacion = "";
}
$prevision = $_POST['prevision'];
if($prevision == "Cualquiera"){
	$prevision = "";
}
$servicio = $_POST['servicio'];

$criterios = "ESPECIALIDAD: " . $especialidad . "<br>UBICACION: " . $ubicacion . "<br>PREVISION: " . $prevision . "<br>SERVICIO: " . $servicio;





$lista_medicos = modPdResBusquedaHelper::get_medicos_busqueda($especialidad, $ubicacion, $prevision, $servicio);








require JModuleHelper::getLayoutPath('mod_pd_res_busqueda');








?>