<?php 


class ModPdCarruselMedicosHelper{

	public static function getMedicosDestacados(){
	
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id','name','apellido','foto','especialidad'))
		->from($db->quoteName('#__users'))
		->where($db->quoteName('tipo') . ' = ' . $db->quote(1));

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