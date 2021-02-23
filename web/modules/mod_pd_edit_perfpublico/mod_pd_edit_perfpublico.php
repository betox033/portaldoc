<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$usuario_general = JFactory::getUser();
$arreglo_previsiones = modPdEditPerfpublicoHelper::get_previsiones();
$previsiones_usuario = modPdEditPerfpublicoHelper::get_previsiones_usuarios($usuario_general->id);

$arreglo_servicios = modPdEditPerfpublicoHelper::get_servicios();
$servicios_usuario = modPdEditPerfpublicoHelper::get_servicios_usuarios($usuario_general->id);



require JModuleHelper::getLayoutPath('mod_pd_edit_perfpublico');








?>