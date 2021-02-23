<?php 





defined('_JEXEC') or die;



require_once dirname(__FILE__).'/helper.php';



$id_medico = $_GET['id_medico'];



$perfilmed_titulo = $params['perfilmed_titulo'];
$perfilmed_img_sust = $params['perfilmed_img_sust'];

///////////////////// ENLACES //////////////////////////////////////////////
$perfilmed_texto_bio = $params['perfilmed_texto_bio'];
$perfilmed_color_bio = $params['perfilmed_color_bio'];
$perfilmed_texto_val = $params['perfilmed_texto_val'];

///////////////////////////////////////////////////////////////////

$perfilmed_texto_selector = $params['perfilmed_texto_selector'];



$perfilmed_titulo_direccion_1 = $params['perfilmed_titulo_direccion_1'];
$perfilmed_titulo_direccion = $params['perfilmed_titulo_direccion'];


$perfilmed_noagenda_txt = $params['perfilmed_noagenda_txt'];
$perfilmed_noagenda_color_fondo = $params['perfilmed_noagenda_color_fondo'];
$perfilmed_noagenda_color_borde = $params['perfilmed_noagenda_color_borde'];

/*

$codigo_portal = $_POST['codigo_portal'];

$arreglo_sm = explode(";", $codigo_portal);

$cod_med_sm = $_POST['cod_med_sm'];

*/



$medico = modPdPerfilMedicoHelper::get_datos_medicoAjax($id_medico);

$medico[100] = modPdPerfilMedicoHelper::get_profesion_nombre($medico[22]);



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