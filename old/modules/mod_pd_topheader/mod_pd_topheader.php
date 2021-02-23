<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pdtopheader_botones = json_decode($params['pdtopheader_botones'], true);

require JModuleHelper::getLayoutPath('mod_pd_topheader');








 ?>