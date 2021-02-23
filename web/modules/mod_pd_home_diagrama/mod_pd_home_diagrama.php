<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_home_diag_titulo = $params['pd_home_diag_titulo'];
$pd_home_diag_parrafo = $params['pd_home_diag_parrafo'];

$pd_home_diag_btn_text = $params['pd_home_diag_btn_text'];
$pd_home_diag_btn_color = $params['pd_home_diag_btn_color'];
$pd_home_diag_btn_color_hover = $params['pd_home_diag_btn_color_hover'];
$pd_home_diag_btn_url = $params['pd_home_diag_btn_url'];

$pd_home_diag_lista_iconos = json_decode($params['pd_home_diag_lista_iconos'], true);

$pd_home_diag_url_iframe = $params['pd_home_diag_url_iframe'];
$pd_home_diag_img_prev = $params['pd_home_diag_img_prev'];

require JModuleHelper::getLayoutPath('mod_pd_home_diagrama');








 ?>