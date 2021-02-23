<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$menu_sesion_titulo = $params['menu_sesion_titulo'];
$menu_sesion_subtitulo = $params['menu_sesion_subtitulo'];

$menu_sesion_color_select_tipo = $params['menu_sesion_color_select_tipo'];
$menu_sesion_color_rec_pass = $params['menu_sesion_color_rec_pass'];

require JModuleHelper::getLayoutPath('mod_pd_menu_sesion');








 ?>