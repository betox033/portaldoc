<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pdheader_logo_principal = $params['pdheader_logo_principal'];
$pdheader_lista_botones = json_decode($params['pdheader_lista_botones'], true);


require JModuleHelper::getLayoutPath('mod_pd_header');








 ?>