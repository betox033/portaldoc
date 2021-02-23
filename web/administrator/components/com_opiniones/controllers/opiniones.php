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
 * Opiniones Controller
 *
 * @since  0.0.1
 */
class OpinionesControllerOpiniones extends JControllerAdmin{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'Opiniones', $prefix = 'OpinionesModel', $config = array('ignore_request' => true)){
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	public function despublicar(){
		$arreglo_datos = $_POST['cid'];

		$model = $this->getModel();
		foreach ($arreglo_datos as $key => $id_opinion) {
			$model->despublicarOpinion($id_opinion);
		}

		$mensaje = "Opinión despublicada en el perfil del médico.";
		$this->setRedirect(JRoute::_('index.php?option=com_opiniones',$mensaje));
	}

	public function publish(){
		$arreglo_datos = $_POST['cid'];

		$model = $this->getModel();
		foreach ($arreglo_datos as $key => $id_opinion) {
			$model->publicarOpinion($id_opinion);
		}

		$mensaje = "Opinión publicada en el perfil del médico.";
		$this->setRedirect(JRoute::_('index.php?option=com_opiniones',$mensaje));
	}

}