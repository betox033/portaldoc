<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$id_medico = $_GET['id_medico'];

$biomed_pos_col = $params['biomed_pos_col'];
$biomed_texto_back = $params['biomed_texto_back'];
$biomed_color_fondo_box = $params['biomed_color_fondo_box'];
$biomed_color_texto_box = $params['biomed_color_texto_box'];

$biomed_titulo_direccion_1 = $params['biomed_titulo_direccion_1'];
$biomed_titulo_direccion = $params['biomed_titulo_direccion'];

$medico = modPdBiografiaHelper::get_datos_medicoAjax($id_medico);
$previsiones_medico = modPdBiografiaHelper:: get_previsiones_medico($id_medico);

//var_dump($medico);

require JModuleHelper::getLayoutPath('mod_pd_biografia');








 ?>