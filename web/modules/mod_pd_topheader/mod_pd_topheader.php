<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$pdtopheader_botones = json_decode($params['pdtopheader_botones'], true);
$pdtopheader_rs = json_decode($params['pdtopheader_rs'], true);

$pdtopheader_btnfloat = json_decode($params['pdtopheader_btnfloat'], true);

require JModuleHelper::getLayoutPath('mod_pd_topheader');








 ?>