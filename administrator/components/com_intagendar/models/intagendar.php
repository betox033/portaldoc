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
class IntagendarModelIntagendar extends JModelList{
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
		->select(array('inta.id','u.id as id_medico','u.name as nombre_medico', 'u.apellido as apellido_medico','u2.id as id_paciente','u2.name as nombre_usuario','u2.apellido as apellido_usuario','inta.cod_sm_rol','inta.cod_sm_servicio','inta.cod_sm_esp',"date_format(inta.fecha_hora, '%H:%i:%s %d-%m-%Y') as fecha"))
		->from($db->quoteName('#__intencion_agendar','inta'))
		->join('LEFT', $db->quoteName('#__users', 'u') . 
			' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('inta.id_medico'))
		->join('LEFT', $db->quoteName('#__users', 'u2') . 
			' ON ' . $db->quoteName('u2.id') . ' = ' . $db->quoteName('inta.id_usuario'))
		->order('inta.id DESC');

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

		$rol_sacmed = $this->getState('filter.rol_sacmed');
		if (!empty($rol_sacmed)){
			$like = $db->quote('%' . $rol_sacmed . '%');
			$query->where('(u.codigo_portal LIKE ' . $like . ')');
		}

		$cod_servicio = $this->getState('filter.cod_servicio');
		if (!empty($cod_servicio)){
			$like = $db->quote('%' . $cod_servicio . '%');
			$query->where('(inta.cod_sm_servicio LIKE ' . $like . ')');
		}

		$cod_esp = $this->getState('filter.cod_esp');
		if (!empty($cod_esp)){
			$like = $db->quote('%' . $cod_esp . '%');
			$query->where('(inta.cod_sm_esp LIKE ' . $like . ')');
		}

		$fecha = $this->getState('filter.fecha');
		if (!empty($fecha)){
			$fecha = date("Y-m-d",strtotime($fecha));
			$query->where('(inta.fecha_hora LIKE ' . $db->quote('%' . $fecha . '%') . ')');
		}

		return $query;
	}


}