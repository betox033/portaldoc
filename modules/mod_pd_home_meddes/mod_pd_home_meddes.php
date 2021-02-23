<?php 





defined('_JEXEC') or die;



require_once dirname(__FILE__).'/helper.php';


$home_meddes_titulo = $params['home_meddes_titulo'];
$home_meddes_icono_img = $params['home_meddes_icono_img'];
$home_meddes_placeholder = $params['home_meddes_placeholder'];

$home_meddes_clrbtn_perfilmed = $params['home_meddes_clrbtn_perfilmed'];
$home_meddes_clrhvr_perfilmed = $params['home_meddes_clrhvr_perfilmed'];
$home_meddes_txtbtn_perfilmed = $params['home_meddes_txtbtn_perfilmed'];

$home_meddes_clrbtn_valoraciones = $params['home_meddes_clrbtn_valoraciones'];
$home_meddes_clrhvr_valoraciones = $params['home_meddes_clrhvr_valoraciones'];
$home_meddes_txtbtn_valoraciones = $params['home_meddes_txtbtn_valoraciones'];



$valor_busqueda = "";
$lista_medicos_destacados = modPdHomeMeddesHelper::getMedicosDestacados($valor_busqueda);

require JModuleHelper::getLayoutPath('mod_pd_home_meddes');



 ?>