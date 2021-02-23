<?php 


class ModPdPopupRegistroHelper{


	public static function enviar_correo_contactoAjax(){
		$tipo = $_POST['tipo'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$rut = $_POST['rut'];
		$telefono = $_POST['telefono'];
		$asunto = $_POST['asunto'];
		$mensaje = $_POST['mensaje'];

		require("class.phpmailer.php"); require("class.smtp.php");
		$smtpHost = "localhost"; $mail = new PHPMailer(); $mail->IsSMTP(); 
		$mail->SMTPAuth= false; $mail->SMTPSecure = false; $mail->Port = 25; 
		$mail->IsHTML(true); $mail->CharSet = "utf-8"; 
		$mail->Host = $smtpHost; $mail->FromName = "PORTAL DOC - Formulario de contacto";
		$mail->SetFrom('noreply-agt@portaldoc.com', 'Formulario de contacto');

		$mail->AddAddress("rsolovera@portaldoc.com"); 
		$mail->AddCC("roberto@boxproject.cl");
		$mail->AddCC("sebastian@boxproject.cl");

		$mail->Subject = "Contacto :: PORTAL DOC $nombre $apellido - $telefono - $email";
		ob_start(); require_once 'tmpl/correoGeneral.php'; $correoGeneral = ob_get_clean(); ob_end_flush(); 
		$mail->Body = $correoGeneral;

		$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));


		$estadoEnvio = $mail->Send(); 
		if($estadoEnvio){
			echo("El mensaje fue enviado correctamente!!!");
		}else{
			echo("Error en el envio de correo");
		}

	}








}




 ?>