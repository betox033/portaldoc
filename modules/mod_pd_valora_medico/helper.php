<?php 


class ModPdValoraMedicoHelper{

	function get_datos_medicoAjax($id_medico){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
		->select(array(
			'u.id', //0
			'u.foto',   
			'u.name',
			'u.apellido',
			'u.region',
			'u.comuna', //5
			'u.direccion',
			'u.rut',
			'u.telefono',
			'u.email',
			'u.especialidad_detalle', //10
			'u.docencia',
			'u.publicaciones',
			'u.actualidad',
			'u.formacion',
			'u.cursos',     //15
			'u.experiencia',
			'u.codigo_portal',
			'u.especialidad',
			'avg(vlr.valoracion) as valoracion_promedio',
			'u.sexo',//20
			'u.url_web',
			'u.direccion_2',
		))
		->from($db->quoteName('#__users','u'))
		->join('LEFT', $db->quoteName('#__valoracion', 'vlr') . 
			' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('vlr.id_medico_prof') . " and vlr.estado=true")
		->where('u.id=' . $db->Quote($id_medico));

		$db->setQuery($query);
		$medico = $db->loadRow();

		//var_dump($results);
		return $medico;
	}

	public static function get_valoraciones($id_medico){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query = $db
		->getQuery(true)
		->select(array('vlr.id','u.name as nombre','u.apellido','u.username','u.telefono','u.email','u.direccion','vlr.opinion','vlr.valoracion',"date_format(vlr.fecha, '%H:%i:%s %d-%m-%Y') as fecha"))
		->from($db->quoteName('#__valoracion','vlr'))
		->join('LEFT', $db->quoteName('#__users', 'u') . 
			' ON ' . $db->quoteName('u.id') . ' = ' . $db->quoteName('vlr.id_usuario'))
		->where($db->quoteName('vlr.id_medico_prof') . ' = ' . $db->quote($id_medico))
		->where($db->quoteName('vlr.estado') . ' = ' . $db->quote(1))
		->order('vlr.id DESC');;

		$db->setQuery($query);
		$results = $db->loadObjectList();

		return $results;
	}

	public static function registrar_valoracionAjax(){
		$opinion = $_POST['opinion'];
		$valoracion = $_POST['valoracion'];
		$id_medico_prof = $_POST['id_medico_prof'];
		$usuario_general   = JFactory::getUser();
		$id_usuario = $usuario_general->id;

		if($valoracion <= 2){
			$estado = 0;
			self::enviarCorreoAdministrador($id_usuario, $id_medico_prof, $valoracion, $opinion);
		}else{
			$estado = 1;
			self::enviarCorreoMedico($id_usuario, $id_medico_prof, $valoracion, $opinion);
		}

		date_default_timezone_set("America/Santiago");
		$fecha = date("Y-m-d G:i:s");

		$db = JFactory::getDbo(); $query = $db->getQuery(true);

		$columns = array('opinion', 'valoracion', 'id_medico_prof', 'id_usuario','estado','fecha');
		$values = array($db->quote($opinion), $valoracion , $id_medico_prof, $id_usuario, $estado, $db->quote($fecha));

		$query
		->insert($db->quoteName('#__valoracion'))
		->columns($db->quoteName($columns))
		->values(implode(',', $values));

		$db->setQuery($query); 
		$db->execute();

		echo("Opinion registrada correctamente.");
	}

	public static function enviarCorreoMedico($id_usuario, $id_medico_prof, $valoracion, $opinion){
		$medico = JFactory::getUser($id_medico_prof);
		$usuario = JFactory::getUser($id_usuario);

		require("class.phpmailer.php"); require("class.smtp.php");
		$smtpHost = "localhost"; $mail = new PHPMailer(); $mail->IsSMTP(); 
		$mail->SMTPAuth= false; $mail->SMTPSecure = false; $mail->Port = 25; 
		$mail->IsHTML(true); $mail->CharSet = "utf-8"; 
		$mail->Host = $smtpHost; $mail->FromName = "PORTAL DOC - Registro de valoración";
		$mail->SetFrom('noreply-agt@portaldoc.com', 'Registro de Valoraciones');

		$mail->AddAddress($medico->email); 

		$mail->Subject = "Registro de valoración :: PORTAL DOC | Médico: $medico->name $medico->apellido";
		ob_start(); require_once 'tmpl/correoValoracion.php'; $correoGeneral = ob_get_clean(); ob_end_flush(); 
		$mail->Body = $correoGeneral;

		$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

		$estadoEnvio = $mail->Send(); 
		if($estadoEnvio){
		}else{
			echo("Error en el envio de correo");
		}
	}

	public static function enviarCorreoAdministrador($id_usuario, $id_medico_prof, $valoracion, $opinion){
		$medico = JFactory::getUser($id_medico_prof);
		$usuario = JFactory::getUser($id_usuario);

		require("class.phpmailer.php"); require("class.smtp.php");
		$smtpHost = "localhost"; $mail = new PHPMailer(); $mail->IsSMTP(); 
		$mail->SMTPAuth= false; $mail->SMTPSecure = false; $mail->Port = 25; 
		$mail->IsHTML(true); $mail->CharSet = "utf-8"; 
		$mail->Host = $smtpHost; $mail->FromName = "PORTAL DOC - Registro de valoración negativa";
		$mail->SetFrom('noreply-agt@portaldoc.com', 'Registro de Valoraciones');

		$mail->AddAddress("rsolovera@portaldoc.com"); 
		$mail->AddCC("roberto@boxproject.cl");
		$mail->AddCC("sebastian@boxproject.cl"); 

		$mail->Subject = "Registro de valoración negativa :: PORTAL DOC | Médico: $medico->name $medico->apellido";
		ob_start(); require_once 'tmpl/correoValoracionNegativa.php'; $correoGeneral = ob_get_clean(); ob_end_flush(); 
		$mail->Body = $correoGeneral;

		$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

		$estadoEnvio = $mail->Send(); 
		if($estadoEnvio){
		}else{
			echo("Error en el envio de correo");
		}
	}

	public static function get_ultima_valoracion($id_medico, $id_usuario){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
		->select(array('vlr.id','vlr.opinion','vlr.valoracion','vlr.fecha',
			"date_format(vlr.fecha, '%H:%i:%s %d-%m-%Y') as fecha_formato",
			"DATEDIFF(curdate(), vlr.fecha) as diferencia",
			"date_format(vlr.fecha, '%d-%m-%Y') as fecha_formato_dia"))
		->from($db->quoteName('#__valoracion','vlr'))
		->where('id_medico_prof=' . $db->Quote($id_medico))
		->where('id_usuario=' . $db->Quote($id_usuario))
		->order($db->quoteName('vlr.fecha') . ' DESC')
		->setLimit('1');

		//echo("<div style='padding: 50px;'>" . $query . "</div>");

		$db->setQuery($query);
		$results = $db->loadObjectList();

		return $results;
	}







}




 ?>