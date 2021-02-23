<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class OpinionesModelOpiniones extends JModelList{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery(){
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);


		$query = $db
		->getQuery(true)
		->select(array('vlr.id','vlr.id_medico_prof','u.name as nombre','u.apellido','u.telefono','u.email','u.direccion','vlr.opinion','vlr.valoracion',"date_format(vlr.fecha, '%H:%i:%s %d-%m-%Y') as fecha",'u2.id as id_paciente',
			'u2.name as nombre_paciente', 'u2.apellido as apellido_paciente', 'vlr.estado'))
		->from($db->quoteName('#__valoracion','vlr'))
		->join('LEFT', $db->quoteName('#__users', 'u') . 
			' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('vlr.id_medico_prof'))
		->join('LEFT', $db->quoteName('#__users', 'u2') . 
			' ON ' . $db->quoteName('u2.id') . ' = ' . $db->quoteName('vlr.id_usuario'))
		->order('vlr.fecha DESC');;


		$search = $this->getState('filter.search');
		if (!empty($search)){
			$like = $db->quote('%' . $search . '%');
			$query->where('(u.name LIKE ' . $like . ')');
		}

		$apellido = $this->getState('filter.apellido');
		if (!empty($apellido)){
			$like = $db->quote('%' . $apellido . '%');
			$query->where('(u.apellido LIKE ' . $like . ')');
		}

		$published = $this->getState('filter.estado');
		if (is_numeric($published)){
			$query->where('estado = ' . (int) $published);
		}elseif ($published === ''){
			$query->where('(estado IN (0, 1))');
		}

		$nombre_p = $this->getState('filter.nombre_p');
		if (!empty($nombre_p)){
			$like = $db->quote('%' . $nombre_p . '%');
			$query->where('(u2.name LIKE ' . $like . ')');
		}

		$apellido_p = $this->getState('filter.apellido_p');
		if (!empty($apellido_p)){
			$like = $db->quote('%' . $apellido_p . '%');
			$query->where('(u2.apellido LIKE ' . $like . ')');
		}

		$palabra_op = $this->getState('filter.palabra_op');
		if (!empty($palabra_op)){
			$like = $db->quote('%' . $palabra_op . '%');
			$query->where('(vlr.opinion LIKE ' . $like . ')');
		}

		$fecha = $this->getState('filter.fecha');
		if (!empty($fecha)){
			$fecha = date("Y-m-d",strtotime($fecha));
			$query->where('(vlr.fecha LIKE ' . $db->quote('%' . $fecha . '%') . ')');
		}

		$valoracion = $this->getState('filter.valoracion');
		if (is_numeric($valoracion)){
			$query->where('valoracion = ' . (int) $valoracion);
		}elseif ($published === ''){
			$query->where('(valoracion IN (1,2,3,4,5))');
		}

		return $query;
	}

	public function publicarOpinion($id_opinion){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$fields = array($db->quoteName('estado') . ' = 1');
		$conditions = array($db->quoteName('id') . ' = ' . $id_opinion);

		$query->update($db->quoteName('#__valoracion'))->set($fields)->where($conditions);
		$db->setQuery($query);
		$result = $db->execute();
	}

	public function despublicarOpinion($id_opinion){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$fields = array($db->quoteName('estado') . ' = false');
		$conditions = array($db->quoteName('id') . ' = ' . $id_opinion);
		
		$query->update($db->quoteName('#__valoracion'))->set($fields)->where($conditions);
		$db->setQuery($query);
		$result = $db->execute();
	}

}