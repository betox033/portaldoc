<?php 





class ModPdFiltroBusquedaHelper{



	public static function get_lista_medicos($criterio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id','name','apellido','sexo','foto','especialidad'))
		->from($db->quoteName('#__users'))
		->where("(" . $db->quoteName('tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('block') . ' = ' . $db->quote(0))
		->where("(" . $db->quoteName('apellido') . ' LIKE ' . $db->quote($criterio . "%") . ' OR ' . 
			$db->quoteName('especialidad') . ' LIKE ' . $db->quote($criterio . "%") . ")");

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public static function get_lista_especialidades($criterio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(especialidad) as especialidad'))
		->from($db->quoteName('#__users'))
		->where("(" . $db->quoteName('tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('block') . ' = ' . $db->quote(0))
		->where($db->quoteName('especialidad') . ' LIKE ' . $db->quote($criterio . "%"))
		->where($db->quoteName('especialidad') . '!=' . $db->quote(""));

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public static function buscar_medicosAjax(){
		$valor_busqueda = $_POST['valor_busqueda'];

		$lista_medicos = self::get_lista_medicos($valor_busqueda);
		$lista_especialidades = self::get_lista_especialidades($valor_busqueda);
		ob_start(); require_once 'tmpl/linea_medico.php'; $template_medicos = ob_get_clean(); ob_end_flush();

		echo($template_medicos);
	}

	public static function get_lista_regiones($criterio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(region) as region'))
		->from($db->quoteName('#__users'))
		->where("(" . $db->quoteName('tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('block') . ' = ' . $db->quote(0))
		->where($db->quoteName('region') . ' LIKE ' . $db->quote("%" . $criterio . "%"))
		->where($db->quoteName('region') . ' != ' . $db->quote(""));

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;		
	}

	public static function get_lista_comunas($criterio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(comuna) as comuna'))
		->from($db->quoteName('#__users'))
		->where($db->quoteName('comuna') . ' LIKE ' . $db->quote("%" . $criterio . "%"))
		->where("(" . $db->quoteName('tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('block') . ' = ' . $db->quote(0))
		->where($db->quoteName('comuna') . ' != ' . $db->quote(""));

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public static function buscar_ubicacionesAjax(){
		$valor_busqueda = $_POST['valor_busqueda'];

		$lista_regiones = self::get_lista_regiones($valor_busqueda);
		$lista_comunas = self::get_lista_comunas($valor_busqueda);
		ob_start(); require_once 'tmpl/linea_ubicacion.php'; $template_ubicaciones = ob_get_clean(); ob_end_flush();

		echo($template_ubicaciones);
	}

	public static function get_lista_previsiones($criterio){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(jp.id) as id','jp.nombre'))
		->from($db->quoteName('#__prevision','jp'))
		->join('INNER', $db->quoteName('#__prevision_usuario', 'jpu') . 
			' ON ' . $db->quoteName('jp.id') . ' = ' . $db->quoteName('jpu.id_prevision'))
		->join('INNER', $db->quoteName('#__users', 'ju') . 
			' ON ' . $db->quoteName('jpu.id_usuario') . ' = ' . $db->quoteName('ju.id'))
		->where($db->quoteName('jp.nombre') . ' LIKE ' . $db->quote('%' . $criterio . '%'))
		->where("(" . $db->quoteName('ju.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('ju.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('ju.block') . ' = ' . $db->quote(0));

		$db->setQuery($query);

		//echo($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public static function buscar_previsionAjax(){
		$valor_busqueda = $_POST['valor_busqueda'];

		$lista_previsiones = self::get_lista_previsiones($valor_busqueda);
		ob_start(); require_once 'tmpl/linea_prevision.php'; $template_prevision = ob_get_clean(); ob_end_flush();

		echo($template_prevision);
	}

	public static function get_lista_servicios($criterio){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(js.id) as id','js.nombre'))
		->from($db->quoteName('#__servicio','js'))
		->join('INNER', $db->quoteName('#__servicio_usuario', 'jsu') . 
			' ON ' . $db->quoteName('js.id') . ' = ' . $db->quoteName('jsu.id_servicio'))
		->join('INNER', $db->quoteName('#__users', 'ju') . 
			' ON ' . $db->quoteName('jsu.id_usuario') . ' = ' . $db->quoteName('ju.id'))
		->where($db->quoteName('js.nombre') . ' LIKE ' . $db->quote('%' . $criterio . '%'))
		->where("(" . $db->quoteName('ju.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('ju.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('ju.block') . ' = ' . $db->quote(0))
		->order('js.orden');

		$db->setQuery($query);
		//echo($query);
		$results = $db->loadObjectList();
		return $results;
	}


}









?>