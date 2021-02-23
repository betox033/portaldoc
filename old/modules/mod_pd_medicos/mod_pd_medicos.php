<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_lista_medicos = json_decode($params['pd_lista_medicos'], true);

require JModuleHelper::getLayoutPath('mod_pd_medicos');








 ?>