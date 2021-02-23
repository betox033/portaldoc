<?php 


class ModPdHomeMeddesHelper{

	public static function getMedicosDestacados(){
	
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('usr.id','usr.name','usr.apellido','usr.foto','usr.especialidad','avg(vlr.valoracion) as valoracion_promedio'))
		->from($db->quoteName('#__users','usr'))
		->join('INNER', $db->quoteName('#__valoracion', 'vlr') . 
			' ON ' . $db->quoteName('usr.id') . ' = ' . $db->quoteName('vlr.id_medico_prof') . " and vlr.estado=true")
		->where("(" . $db->quoteName('usr.tipo') . ' = ' . $db->quote(1) . " OR " . 
					  $db->quoteName('usr.tipo') . ' = ' . $db->quote(2) . ")")
		->where($db->quoteName('usr.block') . ' = ' . $db->quote(0))
		->group($db->quoteName('usr.id'))
		->order('valoracion_promedio DESC')
		->setLimit('7');

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}








/*
$db = JFactory::getDbo();

$query = $db->getQuery(true)
            ->select($db->quoteName('hello'))
            ->from($db->quoteName('#__helloworld'))
            ->where('lang = ' . $db->Quote('en-GB'));

$db->setQuery($query);

$result = $db->loadResult();

return $result;
*/





}




 ?>