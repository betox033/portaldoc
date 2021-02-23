<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$lista_medicos = modPdCarruselMedicosHelper::getMedicosDestacados();

	echo("<div style='padding: 50px;position:fixed;background-color: lightgreen;z-index: 100;top: 0px;left: 0px'>Mensaje de Prueba</div>");
require JModuleHelper::getLayoutPath('mod_pd_carrusel_medicos');








 ?>