<?php 





class ModPdHomeMeddesHelper{

	public static function getMedicosDestacados($valor_busqueda){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('usr.id','usr.sexo','usr.name','usr.apellido','usr.foto','usr.especialidad','usr.especialidad_detalle',
			'avg(vlr.valoracion) as valoracion_promedio','usr.comuna','usr.region','usr.direccion'))
		->from($db->quoteName('#__users','usr'))
		->join('INNER', $db->quoteName('#__valoracion', 'vlr') . 
			' ON ' . $db->quoteName('usr.id') . ' = ' . $db->quoteName('vlr.id_medico_prof') . " and vlr.estado=true")
		->where("(" . $db->quoteName('usr.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('usr.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('usr.block') . ' = ' . $db->quote(0))
		->where($db->quoteName('usr.especialidad') . ' LIKE ' . $db->quote("%" . $valor_busqueda . "%"))
		->group($db->quoteName('usr.id'))
		->order('valoracion_promedio DESC')
		->setLimit('15');

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public static function buscar_especialidadesAjax(){
		$valor_busqueda = $_POST['valor_busqueda'];
		$lista_especialidades = self::getEspecialidadesBusqueda($valor_busqueda);

		ob_start(); 
		require_once 'tmpl/lista_especialidades.php'; 
		$tmpl_lst_esp = ob_get_clean(); 
		ob_end_flush();

		echo($tmpl_lst_esp);
	}

	public static function getEspecialidadesBusqueda($valor_busqueda){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('distinct(usr.especialidad) as especialidad'))
		->from($db->quoteName('#__users','usr'))
		->join('INNER', $db->quoteName('#__valoracion', 'vlr') . 
			' ON ' . $db->quoteName('usr.id') . ' = ' . $db->quoteName('vlr.id_medico_prof') . " and vlr.estado=true")
		->where("(" . $db->quoteName('usr.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('usr.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('usr.block') . ' = ' . $db->quote(0))
		->where($db->quoteName('usr.especialidad') . ' LIKE ' . $db->quote('%' . $valor_busqueda . '%'))
		->setLimit('7');

		$db->setQuery($query);
		$results = $db->loadObjectList();

		return $results;		
	}

	public static function buscar_meddesAjax(){
		$buscar_por = $_POST['buscar_por'];
		$home_meddes_txtbtn_perfilmed = $_POST['btn_agendar_77'];
		$home_meddes_txtbtn_valoraciones = $_POST['btn_valoracion'];

		$lista_medicos_destacados = self::getMedicosDestacados($buscar_por);

		ob_start(); 
		require_once 'tmpl/lista_medicos.php'; 
		$tmpl_lst_medicos = ob_get_clean(); 
		ob_end_flush();

		echo($tmpl_lst_medicos);
	}


}









 ?>