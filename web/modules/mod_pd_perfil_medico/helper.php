<?php 


class ModPdPerfilMedicoHelper{

	function get_datos_medicoAjax($id_medico){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
		->select($db->quoteName(array(
			'id', //0
			'foto',   
			'name',
			'apellido',
			'region',
			'comuna', //5
			'direccion',
			'rut',
			'telefono',
			'email',
			'especialidad_detalle', //10
			'docencia',
			'publicaciones',
			'actualidad',
			'formacion',
			'cursos',     //15
			'experiencia',
			'codigo_portal',
			'url_web'
		)))
		->from($db->quoteName('#__users'))
		->where('id=' . $db->Quote($id_medico));

		$db->setQuery($query);
		$medico = $db->loadRow();

		//var_dump($results);
		return $medico;
	}

	public static function reg_intencion_agendarAjax(){
		$cod_sm_rol = $_POST['cod_sm_rol'];
		$cod_sm_servicio = $_POST['cod_sm_servicio'];
		$cod_sm_esp = $_POST['cod_sm_esp'];
		$id_medico = $_POST['id_medico'];
		$estado = true;
		$fecha_hora = date("Y-m-d H:i:s"); 

		$usuario_general   = JFactory::getUser();
		$id_usuario = $usuario_general->id;

		//echo("COD_SM_SERVICIO: " . $cod_sm_servicio . "\nCOD_SM_ESP: " . $cod_sm_esp . "\nID MEDICO: " . $id_medico . 
		//	"\nESTADO: " . $estado . "\nFECHA_HORA:" . $fecha_hora . "\nID USUARIO: " . $id_usuario);


		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$columns = array('id_medico', 'cod_sm_rol','cod_sm_servicio', 'cod_sm_esp', 'id_usuario','fecha_hora', 'estado');
		$values = array($id_medico, $db->quote($cod_sm_rol),$db->quote($cod_sm_servicio), $db->quote($cod_sm_esp), 
			$id_usuario, $db->quote($fecha_hora), $estado);

		$query
    		->insert($db->quoteName('#__intencion_agendar'))
    		->columns($db->quoteName($columns))
    		->values(implode(',', $values));

		$db->setQuery($query); $db->execute();
	}








}




 ?>