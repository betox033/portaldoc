<?php 


class ModPdResBusquedaHelper{

	public static function get_medicos_busqueda($especialidad, $ubicacion, $prevision, $servicio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(ju.id) as id' ,'ju.name','ju.apellido','ju.foto','ju.especialidad','ju.codigo_portal','ju.email'))
		->from($db->quoteName('#__users', 'ju'))
		->join('LEFT', $db->quoteName('#__prevision_usuario', 'jpu') . 
			' ON ' . $db->quoteName('jpu.id_usuario') . ' = ' . $db->quoteName('ju.id'))
		->join('LEFT', $db->quoteName('#__prevision', 'jp') . 
			' ON ' . $db->quoteName('jp.id') . ' = ' . $db->quoteName('jpu.id_prevision'))
		->join('LEFT', $db->quoteName('#__servicio_usuario', 'jsu') . 
			' ON ' . $db->quoteName('jsu.id_usuario') . ' = ' . $db->quoteName('ju.id'))
		->join('LEFT', $db->quoteName('#__servicio', 'js') . 
			' ON ' . $db->quoteName('js.id') . ' = ' . $db->quoteName('jsu.id_servicio'))
		->where("(" . $db->quoteName('ju.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('ju.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('ju.block') . ' = ' . $db->quote(0))
		//->where($db->quoteName('ju.especialidad') . ' LIKE ' . $db->quote("%" . $especialidad . "%"))
		->where($db->quoteName('jp.nombre') . ' LIKE ' . $db->quote("%" . $prevision . "%"))
		->where($db->quoteName('js.nombre') . ' LIKE ' . $db->quote("%" . $servicio . "%"))
		->where("(" . $db->quoteName('ju.comuna') . ' LIKE ' . $db->quote("%" . $ubicacion . "%") . " OR " . 
					  $db->quoteName('ju.region') . ' LIKE ' . $db->quote("%" . $ubicacion . "%") . ")")
		->where("(" . $db->quoteName('ju.name') . ' LIKE ' . $db->quote("%" . $especialidad . "%") . " OR " . 
					  $db->quoteName('ju.apellido') . ' LIKE ' . $db->quote("%" . $especialidad . "%") . " OR " .
					  $db->quoteName('ju.especialidad') . 'LIKE' . $db->quote("%" . $especialidad . "%" ) . ")");

		$db->setQuery($query);
		//echo("<div style='padding: 50px'>" . $query . "</div>");
		$results = $db->loadObjectList();

		foreach ($results as $key => $value) {
			//self::get_arreglo_portal($value->codigo_portal);
		}






		return $results;
	}

	public static function get_arreglo_portal($codigo_portal){
		$url = "https://app.portaldoc.com/api/rol/allow/" . $codigo_portal;
		$content = file_get_contents($url);
		var_dump($content);

	}


}




 ?>