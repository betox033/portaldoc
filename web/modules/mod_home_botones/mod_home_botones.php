<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';


$pd_btnhome_clrleft = $params['pd_btnhome_clrleft'];
$pd_btnhome_clrright = $params['pd_btnhome_clrright'];

$pd_lista_btnhome = json_decode($params['pd_lista_btnhome'], true);

require JModuleHelper::getLayoutPath('mod_home_botones');








 ?>