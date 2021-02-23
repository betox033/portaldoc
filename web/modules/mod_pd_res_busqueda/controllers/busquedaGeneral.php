<?php 


$criterio_busqueda = $_POST['criterio_busqueda'];
$valor_busqueda = $_POST['valor_busqueda'];

$lista_medicos = getMedicosBusqueda($criterio_busqueda, $valor_busqueda);
$template = getTemplateResultado($lista_medicos);

echo($template);


function getMedicosBusqueda($criterio, $valor){
	$mysqli = new mysqli("localhost", "portal10", "NC7p18K#[loxU2", "portal10_web");

	$arreglo_criterios = explode(";", $criterio);

	$texto = ""; $condicion_extra = "";
	foreach ($arreglo_criterios as $key => $criterio) {
		if($key > 0){
			$condicion_extra = " or ";
		}
		$texto = $texto . " " . $condicion_extra . $criterio . " like '%" . $valor . "%' ";
	}

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}
	$mysqli->set_charset("utf8");

	$sql = "select * from josiu_prueba_medicos where " . $texto;

	$resultado = $mysqli->query($sql);
	$lineas = array();
	if($resultado){
		while ($fila = $resultado->fetch_assoc()) {
			array_push($lineas, $fila);
		}
		$resultado->close();
	}else{
		$lineas = array();

	}
	return $lineas;
}

function getTemplateResultado($lista_medicos){
	ob_start(); 
	require_once 'templates/resultado_busqueda.php'; 
	$template = ob_get_clean(); 
	ob_end_flush(); 
	return $template;	
}









 ?>