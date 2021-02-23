<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pdfooter_color_fondo = $params['pdfooter_color_fondo'];

$pdfooter_titulo_1 = $params['pdfooter_titulo_1'];
$pdfooter_img_aux = $params['pdfooter_img_aux'];
$pdfooter_img_aux_url = $params['pdfooter_img_aux_url'];

$pdfooter_logo = $params['pdfooter_logo'];
$pdfooter_logo_url = $params['pdfooter_logo_url'];

$pdfooter_texto_1 = $params['pdfooter_texto_1'];
$pdfooter_texto_2 = $params['pdfooter_texto_2'];

$pdfooter_columnas = $params['pdfooter_columnas'];

$pdfooter_textos_finales = json_decode($params['pdfooter_textos_finales'], true);

require JModuleHelper::getLayoutPath('mod_pd_footer');








 ?>