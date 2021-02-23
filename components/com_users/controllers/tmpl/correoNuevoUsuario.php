
<div style="background-color: #2a3c50;padding: 10px;margin-bottom: 20px">
	<img src="https://portaldoc.com/images/logofooter.png" style="width: 200px">
</div>


<div style="background-color: #e0ff83; color:green; padding:10px; margin-bottom: 15px;">
	<span>Se ha registrado un nuevo médico/profesional de la salud en el sistema. Para activar su perfil debe ingresar a la sección </span>
	<strong>Usuarios->Gestionar</strong> del administrador y habilitarlo desde el listado.
</div>

<div style="padding: 10px; border: 1px solid lightgrey; margin-bottom: 15px;">
	<strong>DATOS DEL NUEVO MÉDICO REGISTRADO.</strong><br><br>
	<strong>Nombre: </strong><span><?php echo($usuario['name'] . " " . $usuario['apellido']); ?></span><br>
	<strong>Teléfono: </strong><span><?php echo($usuario['telefono']); ?></span><br>
	<strong>Email: </strong><span><?php echo($usuario['email']); ?></span><br>
	<strong>RUT: </strong><span><?php echo($usuario['rut']); ?></span>
</div>
