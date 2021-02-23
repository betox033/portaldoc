<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$edit_perfpub_titulo = $params['edit_perfpub_titulo'];
$edit_perfpub_texto = $params['edit_perfpub_texto'];

$usuario_general = JFactory::getUser();

$usuario_general->profesion_nombre = modPdEditPerfpublicoHelper::get_profesion_nombre($usuario_general->profesion);
$lista_profesiones = modPdEditPerfpublicoHelper::get_lista_profesiones();

$arreglo_previsiones = modPdEditPerfpublicoHelper::get_previsiones();
$previsiones_usuario = modPdEditPerfpublicoHelper::get_previsiones_usuarios($usuario_general->id);

$arreglo_servicios = modPdEditPerfpublicoHelper::get_servicios();
$servicios_usuario = modPdEditPerfpublicoHelper::get_servicios_usuarios($usuario_general->id);



require JModuleHelper::getLayoutPath('mod_pd_edit_perfpublico');








?>