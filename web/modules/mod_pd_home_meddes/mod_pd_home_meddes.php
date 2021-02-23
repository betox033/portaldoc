<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$lista_medicos_destacados = modPdHomeMeddesHelper::getMedicosDestacados();

require JModuleHelper::getLayoutPath('mod_pd_home_meddes');








 ?>