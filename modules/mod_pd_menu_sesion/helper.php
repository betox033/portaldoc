<?php 

defined('_JEXEC') or die;

class ModPdMenuSesionHelper{

	function validar_existe_usuarioAjax(){
		$username = $_POST['username'];
		$tipo = $_POST['tipo'];
		//echo("USERNAME: " . $username . "\nTIPO: " . $tipo);

		$db = JFactory::getDbo();

		$query = $db
		->getQuery(true)
		->select(array('COUNT(*) as cantidad'))
		->from($db->quoteName('#__users'))
		->where($db->quoteName('username') . ' = ' . $db->quote($username))
		->where($db->quoteName('tipo') . ' = ' . $db->quote($tipo));

		$db->setQuery($query);

		$resultado = $db->loadResult();
		//echo("RESPUESTA: " . $resultado);

		$arreglo = array(
			'resultado' => $resultado,
			'mensaje' => "Los datos ingresados no corresponden a un usuario registrado en este sistema.",
		);
		return json_encode($arreglo);
	}

	function logear_usuarioAjax(){
		$valido = "valido";

		$app = JFactory::getApplication('site');
		jimport('joomla.plugin.helper');
		$credentials = array();
		$credentials['username'] = $_POST['username'];
		$credentials['password'] = $_POST['password'];

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('id, password')
		->from('#__users')
		->where('username=' . $db->quote($credentials['username']));

		$db->setQuery($query);
		$result = $db->loadObject();

		if ($result){
			$match = JUserHelper::verifyPassword($credentials['password'], $result->password, $result->id);

			if ($match === true){
				$user = JUser::getInstance($result->id);
				$error = $app->login($credentials);
				$logged_user = JFactory::getUser();
				//$app->redirect('index.php');
				$mensaje = "Inicio de sesión correcto.";
			}else{
				//echo 'Joomla! Token is:' . JHTML::_( 'form.token' ) . '<br>';
				$mensaje = "Contraseña inválida. Inténtelo nuevamente.";
				$valido = "no_valido";
			}
		} else {
			$mensaje = "No se encontró al usuario registrado en el sistema.";
			$valido = "no_valido";
		}


		$arreglo = array(
			'valido' => $valido,
			'mensaje' => $mensaje,
		);

		echo(json_encode($arreglo));
	}




}




?>