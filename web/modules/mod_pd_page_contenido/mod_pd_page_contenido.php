<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$page_contenido_titulo = $params['page_contenido_titulo'];
$page_contenido_bajada = $params['page_contenido_bajada'];
$page_contenido_parrafo = $params['page_contenido_parrafo'];
$page_contenido_imagen = $params['page_contenido_imagen'];
$page_contenido_parrafo_der = $params['page_contenido_parrafo_der'];

$page_contenido_option_cf = $params['page_contenido_option_cf'];
$page_contenido_conte = $params['page_contenido_conte'];

require JModuleHelper::getLayoutPath('mod_pd_page_contenido');








 ?>