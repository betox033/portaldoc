<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_slidermain = json_decode($params['pd_slidermain'], true);

require JModuleHelper::getLayoutPath('mod_pd_slidermain');








 ?>