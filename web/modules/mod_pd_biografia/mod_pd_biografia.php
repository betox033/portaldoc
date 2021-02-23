<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$id_medico = $_GET['id_medico'];

$medico = modPdBiografiaHelper::get_datos_medicoAjax($id_medico);
$previsiones_medico = modPdBiografiaHelper:: get_previsiones_medico($id_medico);

//var_dump($medico);

require JModuleHelper::getLayoutPath('mod_pd_biografia');








 ?>