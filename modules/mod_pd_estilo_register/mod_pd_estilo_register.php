<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$tipo = $_GET['tipo'];

$pd_estilo_register_titulo = $params['pd_estilo_register_titulo'];
$pd_estilo_register_subtitulo = $params['pd_estilo_register_subtitulo'];
$pd_estilo_register_img = $params['pd_estilo_register_img'];

$pd_estilo_register_titulo_2 = $params['pd_estilo_register_titulo_2'];
$pd_estilo_register_titulo_2_color = $params['pd_estilo_register_titulo_2_color'];
$pd_estilo_register_subtitulo_2 = $params['pd_estilo_register_subtitulo_2'];
$pd_estilo_register_img_2 = $params['pd_estilo_register_img_2'];
$pd_estilo_register_texto_selector = $params['pd_estilo_register_texto_selector'];

require JModuleHelper::getLayoutPath('mod_pd_estilo_register');








 ?>