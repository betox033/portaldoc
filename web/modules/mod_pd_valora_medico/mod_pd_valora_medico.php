<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$id_medico = $_GET['id_medico'];
$medico = modPdValoraMedicoHelper::get_datos_medicoAjax($id_medico);
$valoraciones = modPdValoraMedicoHelper::get_valoraciones($id_medico);

$usuario_general   = JFactory::getUser();

if($usuario_general->id){
	$arreglo = modPdValoraMedicoHelper::get_ultima_valoracion($id_medico, $usuario_general->id);
	$ultima_validacion = $arreglo[0];
	if(!$ultima_validacion->id){
		$ultima_validacion->diferencia = 30;

	}
}else{
	$ultima_validacion = "";
}




require JModuleHelper::getLayoutPath('mod_pd_valora_medico');








 ?>