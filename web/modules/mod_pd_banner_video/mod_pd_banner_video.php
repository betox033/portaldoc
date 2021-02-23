<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_banner_video = $params['pd_banner_video'];
$pd_banner_video_textos = json_decode($params['pd_banner_video_textos'], true);

require JModuleHelper::getLayoutPath('mod_pd_banner_video');











 ?>