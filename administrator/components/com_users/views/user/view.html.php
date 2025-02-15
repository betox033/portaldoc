<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * User view class.
 *
 * @since  1.5
 */
class UsersViewUser extends JViewLegacy
{
	protected $form;

	protected $item;

	protected $grouplist;

	protected $groups;

	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 *
	 * @since   1.5
	 */
	public function display($tpl = null)
	{
		$this->form      = $this->get('Form');
		$this->item      = $this->get('Item');
		$this->state     = $this->get('State');
		$this->tfaform   = $this->get('Twofactorform');
		$this->otpConfig = $this->get('otpConfig');
		

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		// Prevent user from modifying own group(s)
		$user = JFactory::getUser();

		if ((int) $user->id != (int) $this->item->id || $user->authorise('core.admin'))
		{
			$this->grouplist = $this->get('Groups');
			$this->groups    = $this->get('AssignedGroups');
		}


		$this->form->setValue('password', null);
		$this->form->setValue('password2', null);

		$arreglo = self::get_previsiones($this->item->id);
		$this->form->setValue('lista_prevision', null, json_encode($arreglo)); 

		parent::display($tpl);
		$this->addToolbar();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @since   1.6
	 */
	protected function addToolbar(){
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user      = JFactory::getUser();
		$canDo     = JHelperContent::getActions('com_users');
		$isNew     = ($this->item->id == 0);
		$isProfile = $this->item->id == $user->id;

		JToolbarHelper::title(
			JText::_(
				$isNew ? 'COM_USERS_VIEW_NEW_USER_TITLE' : ($isProfile ? 'COM_USERS_VIEW_EDIT_PROFILE_TITLE' : 'COM_USERS_VIEW_EDIT_USER_TITLE')
			),
			'user ' . ($isNew ? 'user-add' : ($isProfile ? 'user-profile' : 'user-edit'))
		);

		if ($canDo->get('core.edit') || $canDo->get('core.create'))
		{
			JToolbarHelper::apply('user.apply');
			JToolbarHelper::save('user.save');
		}

		if ($canDo->get('core.create') && $canDo->get('core.manage'))
		{
			JToolbarHelper::save2new('user.save2new');
		}

		if (empty($this->item->id))
		{
			JToolbarHelper::cancel('user.cancel');
		}
		else
		{
			JToolbarHelper::cancel('user.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolbarHelper::divider();
		JToolbarHelper::help('JHELP_USERS_USER_MANAGER_EDIT');
	}

	public static function get_previsiones($id_usuario){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id', 'nombre'))
		->from($db->quoteName('#__prevision'));

		$db->setQuery($query);
		$lista_previsiones = $db->loadObjectList();
		
		$prev_usuario = self::get_previsiones_usuarios($id_usuario);

		foreach ($lista_previsiones as $key_prev => $prevision) {
			foreach ($prev_usuario as $key => $pru) {
				if($prevision->id == $pru->id_prevision){
					$lista_previsiones[$key_prev]->activo = 1;
					$lista_previsiones[$key_prev]->activo_old = 1;
				}
			}
		}

		return $lista_previsiones;
	}

	public static function get_previsiones_usuarios($id_usuario){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id_prevision'))
		->from($db->quoteName('#__prevision_usuario'))
		->where($db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario));

		$db->setQuery($query);
		$results = $db->loadObjectList();

		return $results;
	}
}
