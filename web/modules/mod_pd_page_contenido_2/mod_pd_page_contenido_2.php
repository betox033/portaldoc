<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_pct2_titulo = $params['pd_pct2_titulo'];
$pd_pct2_parrafo_left = $params['pd_pct2_parrafo_left'];
$pd_pct2_imagen = $params['pd_pct2_imagen'];

$pd_pct2_lista_items = json_decode($params['pd_pct2_lista_items'],true);

require JModuleHelper::getLayoutPath('mod_pd_page_contenido_2');








 ?>