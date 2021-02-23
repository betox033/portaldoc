<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$id_medico = $_GET['id_medico'];

$perfilmed_img_sust = $params['perfilmed_img_sust'];

/*
$codigo_portal = $_POST['codigo_portal'];
$arreglo_sm = explode(";", $codigo_portal);
$cod_med_sm = $_POST['cod_med_sm'];
*/

$medico = modPdPerfilMedicoHelper::get_datos_medicoAjax($id_medico);

//$cod_servicio = $arreglo_sm[0]; $cod_especialidad = $arreglo_sm[1]; $cod_medico = $cod_med_sm; $codigo_empresa = $medico[17];

// Los estilos css estan en base64;
$estilos = "?css=bmF2Lm5hdmJhciwgZm9ybS5mb3JtLWhvcml6b250YWw6bm90KC5zdWIpIGRpdi5yb3c6bm90KC50YWtlKSwgLmZhLXN0YWNrIHsNCiBkaXNwbGF5OiBub25lOw0KfQ0KYm9keXsNCmJhY2tncm91bmQtY29sb3I6IHdoaXRlOw0KfQ==";

$url_iframe_base = "https://app.portaldoc.com/Rol/" . $codigo_empresa;
//$url_iframe_codigo = $url_iframe_base . "/" . $cod_servicio . "/" . $cod_especialidad . "/" . $cod_medico;
//echo("<div style='padding: 30px'>" . $url_iframe_codigo . "</div>");
$url_iframe_estilo = $url_iframe_base . $estilos;
$url_iframe_comple = $url_iframe_codigo . $estilos; 

require JModuleHelper::getLayoutPath('mod_pd_perfil_medico');

 ?>