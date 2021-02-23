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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class OpinionesViewOpiniones extends JViewLegacy{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null){
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		$this->addToolBar();
		//$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolBar(){
		JToolbarHelper::title(JText::_('Listado de opiniones de pacientes a médicos.'));
		//JToolbarHelper::addNew('opiniones.add');
		//JToolbarHelper::editList('opiniones.edit');
		//JToolbarHelper::deleteList('', 'opiniones.delete');
		JToolbarHelper::publish('opiniones.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('opiniones.despublicar', 'JTOOLBAR_UNPUBLISH', true);
	}
}