<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$perfilmed_foto = $params['perfilmed_foto'];
$perfilmed_nombre = $params['perfilmed_nombre'];
$perfilmed_alma_mater = $params['perfilmed_alma_mater'];
$perfilmed_esp = $params['perfilmed_esp'];

$perfilmed_estetoscopio = $params['perfilmed_estetoscopio'];
$perfilmed_camara = $params['perfilmed_camara'];
$perfilmed_casa = $params['perfilmed_casa'];

$perfilmed_direccion = $params['perfilmed_direccion'];
$perfilmed_direccion = str_replace('/br/', '<br>', $perfilmed_direccion);

$perfilmed_correo = $params['perfilmed_correo'];

require JModuleHelper::getLayoutPath('mod_pd_perfil_medico');








 ?>