<?php 


class ModPdBiografiaHelper{


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
			'direccion_2',
			'sexo',
		)))
		->from($db->quoteName('#__users'))
		->where('id=' . $db->Quote($id_medico));

		$db->setQuery($query);
		$medico = $db->loadRow();

		//var_dump($results);
		return $medico;
	}

	public static function get_previsiones_medico($id_medico){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(jp.id) as id','jp.nombre'))
		->from($db->quoteName('#__prevision','jp'))
		->join('INNER', $db->quoteName('#__prevision_usuario', 'jpu') . 
			' ON ' . $db->quoteName('jp.id') . ' = ' . $db->quoteName('jpu.id_prevision'))
		->join('INNER', $db->quoteName('#__users', 'ju') . 
			' ON ' . $db->quoteName('jpu.id_usuario') . ' = ' . $db->quoteName('ju.id'))
		->where($db->quoteName('ju.id') . ' = ' . $db->quote($id_medico));


		$db->setQuery($query);

		//echo($query);
		$results = $db->loadObjectList();
		return $results;

	}










}




?>