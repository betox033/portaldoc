<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pdfooter_color_fondo = $params['pdfooter_color_fondo'];
$pdfooter_logo = $params['pdfooter_logo'];
$pdfooter_texto_1 = $params['pdfooter_texto_1'];
$pdfooter_texto_2 = $params['pdfooter_texto_2'];

$pdfooter_columnas = $params['pdfooter_columnas'];

require JModuleHelper::getLayoutPath('mod_pd_footer');








 ?>