<?php 


class ModPdEditPerfpublicoHelper{

	function update_datos_perfil_publicoAjax(){
		$perfil = array(
			'id' => $_POST['id'],
			'region' => $_POST['region'],
			'comuna' => $_POST['comuna'],
			'direccion' => $_POST['direccion'],
			'direccion_2' => $_POST['direccion_2'],
			'codigo_portal' => $_POST['codigo_portal'],
			'url_web' => $_POST['url_web'],
			'prevision' => $_POST['prevision'],
			'info_beneficiencia' => $_POST['info_beneficiencia'],
			'servicio' => $_POST['servicio'],
			'especialidad' => $_POST['especialidad'],
			'especialidad_detalle' => $_POST['especialidad_detalle'],
			'docencia' => $_POST['docencia'],
			'publicaciones' => $_POST['publicaciones'],
			'actualidad' => $_POST['actualidad'],
			'formacion' => $_POST['formacion'],
			'cursos' => $_POST['cursos'],
			'experiencia' => $_POST['experiencia'],
			'profesion' => $_POST['profesion'],
		);

		$db = JFactory::getDbo(); $query = $db->getQuery(true);
		$url_foto = self::upload_imagen($perfil['id']);

		$fields = array(
			$db->quoteName('foto') . ' = ' . $db->quote($url_foto),
			$db->quoteName('region') . ' = ' . $db->quote($perfil['region']),
			$db->quoteName('comuna') . ' = ' . $db->quote($perfil['comuna']),
			$db->quoteName('direccion') . ' = ' . $db->quote($perfil['direccion']),
			$db->quoteName('direccion_2') . ' = ' . $db->quote($perfil['direccion_2']),
			$db->quoteName('codigo_portal') . ' = ' . $db->quote($perfil['codigo_portal']),
			$db->quoteName('url_web') . ' = ' . $db->quote($perfil['url_web']),
			$db->quoteName('info_beneficiencia') . ' = ' . $db->quote($perfil['info_beneficiencia']),
			$db->quoteName('especialidad') . ' = ' . $db->quote($perfil['especialidad']),
			$db->quoteName('especialidad_detalle') . ' = ' . $db->quote($perfil['especialidad_detalle']),
			$db->quoteName('docencia') . ' = ' . $db->quote($perfil['docencia']),
			$db->quoteName('publicaciones') . ' = ' . $db->quote($perfil['publicaciones']),
			$db->quoteName('actualidad') . ' = ' . $db->quote($perfil['actualidad']),
			$db->quoteName('formacion') . ' = ' . $db->quote($perfil['formacion']),
			$db->quoteName('cursos') . ' = ' . $db->quote($perfil['cursos']),
			$db->quoteName('experiencia') . ' = ' . $db->quote($perfil['experiencia']),
			$db->quoteName('conf_perfil') . ' = ' . $db->quote(1),
			$db->quoteName('profesion') . ' = ' . $db->quote($perfil['profesion']),
		);

		$conditions = array($db->quoteName('id') . ' = ' . $perfil['id'], );
		$query->update($db->quoteName('#__users'))->set($fields)->where($conditions);
		$db->setQuery($query);

		$result = $db->execute();
		self::update_previsiones($perfil['id'], $perfil['prevision']);
		self::update_servicios($perfil['id'], $perfil['servicio']);
		
		if($result == 1){
			echo("Cambios guardados en el perfil público del médico");
		}else{
			echo("Error al actualizar perfil público del usuario");
		}
	}

	public static function update_perfil_limitadoAjax(){
		$perfil = array(
			'id' => $_POST['id'],
			'docencia' => $_POST['docencia'],
			'publicaciones' => $_POST['publicaciones'],
			'actualidad' => $_POST['actualidad'],
			'formacion' => $_POST['formacion'],
			'cursos' => $_POST['cursos'],
			'experiencia' => $_POST['experiencia'],
		);	

		$db = JFactory::getDbo(); $query = $db->getQuery(true);	

		$fields = array(
			$db->quoteName('docencia') . ' = ' . $db->quote($perfil['docencia']),
			$db->quoteName('publicaciones') . ' = ' . $db->quote($perfil['publicaciones']),
			$db->quoteName('actualidad') . ' = ' . $db->quote($perfil['actualidad']),
			$db->quoteName('formacion') . ' = ' . $db->quote($perfil['formacion']),
			$db->quoteName('cursos') . ' = ' . $db->quote($perfil['cursos']),
			$db->quoteName('experiencia') . ' = ' . $db->quote($perfil['experiencia']),
		);

		$conditions = array($db->quoteName('id') . ' = ' . $perfil['id'], );
		$query->update($db->quoteName('#__users'))->set($fields)->where($conditions);
		$db->setQuery($query);

		$result = $db->execute();

		if($result == 1){
			echo("Cambios guardados en el perfil público del médico");
		}else{
			echo("Error al actualizar perfil público del usuario");
		}
	}

	public static function upload_imagen($id_usuario){
		$nombre_imagen = $_FILES['file']['name'];
		if($nombre_imagen != ""){
			$nombre_imagen = md5($nombre_imagen);
			$location = "images/perfiles/" . $nombre_imagen . ".jpg";

			if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
				return $location;
			}else{
				echo("Error al subir la imagen.");
			}
		}else{
			$usuario_general = JFactory::getUser();
			return $usuario_general->foto;
		}
	}

	public static function update_servicios($id_usuario, $string_servicios){
		$arreglo_servicios = json_decode($string_servicios, true);

		foreach ($arreglo_servicios as $key => $servicio) {
			$registro_existe = self::buscar_linea_servicio($id_usuario, $servicio['id']);
			if($registro_existe){
				if(!$servicio['checked']){
					self::eliminar_registro_servicio($id_usuario, $servicio['id']);
				}
			}else{
				if($servicio['checked']){
					self::agregar_registro_servicio($id_usuario, $servicio['id']);
				}
			}
		}
	}

	public static function buscar_linea_servicio($id_usuario, $id_servicio){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('COUNT(*) as cantidad'))
		->from($db->quoteName('#__servicio_usuario'))
		->where($db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario))
		->where($db->quoteName('id_servicio') . ' = ' . $db->quote($id_servicio));

		$db->setQuery($query);
		$count = $db->loadResult();

		return $count;
	}

	public static function update_previsiones($id_usuario, $string_previsiones){
		$arreglo_previsiones = json_decode($string_previsiones, true);

		foreach ($arreglo_previsiones as $key => $prevision) {
			$registro_existe = self::buscar_linea_prevision($id_usuario, $prevision['id']);
			if($registro_existe){
				if(!$prevision['checked']){
					self::eliminar_registro_prevision($id_usuario, $prevision['id']);
				}
			}else{
				if($prevision['checked']){
					self::agregar_registro_prevision($id_usuario, $prevision['id']);
				}
			}
		}
	}

	public static function buscar_linea_prevision($id_usuario, $id_prevision){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('COUNT(*) as cantidad'))
		->from($db->quoteName('#__prevision_usuario'))
		->where($db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario))
		->where($db->quoteName('id_prevision') . ' = ' . $db->quote($id_prevision));

		$db->setQuery($query);
		$count = $db->loadResult();
		//echo("ID USUARIO: " . $id_usuario . " | ID PREVISION: " . $id_prevision . " | EXISTE: " . $count . "\n");

		return $count;
	}

	public static function eliminar_registro_prevision($id_usuario, $id_prevision){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);
		$conditions = array(
			$db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario), 
			$db->quoteName('id_prevision') . ' = ' . $db->quote($id_prevision)
		);

		$query->delete($db->quoteName('#__prevision_usuario'));
		$query->where($conditions);

		$db->setQuery($query); $result = $db->execute();
	}

	public static function agregar_registro_prevision($id_usuario, $id_prevision){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);
		$columns = array('id_usuario', 'id_prevision');
		$values = array($id_usuario, $id_prevision);

		$query
		->insert($db->quoteName('#__prevision_usuario'))
		->columns($db->quoteName($columns))
		->values(implode(',', $values));

		$db->setQuery($query); $db->execute();
	}

	public static function eliminar_registro_servicio($id_usuario, $id_servicio){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);
		$conditions = array(
			$db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario), 
			$db->quoteName('id_servicio') . ' = ' . $db->quote($id_servicio)
		);

		$query->delete($db->quoteName('#__servicio_usuario'));
		$query->where($conditions);

		$db->setQuery($query); $result = $db->execute();
	}

	public static function agregar_registro_servicio($id_usuario, $id_servicio){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);
		$columns = array('id_usuario', 'id_servicio');
		$values = array($id_usuario, $id_servicio);

		$query
		->insert($db->quoteName('#__servicio_usuario'))
		->columns($db->quoteName($columns))
		->values(implode(',', $values));

		$db->setQuery($query); $db->execute();
	}

	public static function get_previsiones(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id', 'nombre'))
		->from($db->quoteName('#__prevision'));

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
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

		$arreglo = array();
		foreach($results as $key => $prevision_usuario) {
			array_push($arreglo, $prevision_usuario->id_prevision);
		}

		return $arreglo;
	}

	public static function get_servicios(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id', 'nombre'))
		->from($db->quoteName('#__servicio'));

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;		
	}

	public static function get_servicios_usuarios($id_usuario){
		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('id_servicio'))
		->from($db->quoteName('#__servicio_usuario'))
		->where($db->quoteName('id_usuario') . ' = ' . $db->quote($id_usuario));

		$db->setQuery($query); $results = $db->loadObjectList();

		$arreglo = array();
		foreach($results as $key => $servicio_usuario) {
			array_push($arreglo, $servicio_usuario->id_servicio);
		}

		return $arreglo;
	}

	public static function get_profesion_nombre($id_profesion){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select(array('profesion'));
		$query->from($db->quoteName('#__profesion'));
		$query->where($db->quoteName('id') . ' = ' . $db->quote($id_profesion));

		$db->setQuery($query);

		$profesion = $db->loadResult();
		return $profesion;
	}

	public static function get_lista_profesiones(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select(array('id','profesion'));
		$query->from($db->quoteName('#__profesion'));;

		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;		
	}










}




?>