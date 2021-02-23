<?php 


defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$pd_filtro_icono_ea = $params['pd_filtro_icono_ea'];
$pd_filtro_texto_ea = $params['pd_filtro_texto_ea'];
$pd_filtro_head_ea = $params['pd_filtro_head_ea'];

$pd_filtro_icono_rc = $params['pd_filtro_icono_rc'];
$pd_filtro_texto_rc = $params['pd_filtro_texto_rc'];

$pd_filtro_icono_pr = $params['pd_filtro_icono_pr'];
$pd_filtro_texto_pr = $params['pd_filtro_texto_pr'];

$pd_filtro_icono_sv = $params['pd_filtro_icono_sv'];
$pd_filtro_texto_sv = $params['pd_filtro_texto_sv'];
$pd_filtro_head_sv = $params['pd_filtro_head_sv'];



//$lista_medicos = modPdFiltroBusquedaHelper::get_lista_medicos('');
$lista_regiones = modPdFiltroBusquedaHelper::get_lista_regiones('');
$lista_comunas = modPdFiltroBusquedaHelper::get_lista_comunas('');
$lista_previsiones = modPdFiltroBusquedaHelper::get_lista_previsiones('');
$lista_servicios = modPdFiltroBusquedaHelper::get_lista_servicios('');

require JModuleHelper::getLayoutPath('mod_pd_filtro_busqueda');








 ?>