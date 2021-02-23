
<div style="background-color: #2a3c50;padding: 10px;margin-bottom: 20px">
	<img src="https://portaldoc.com/web/images/logofooter.png" style="width: 200px">
</div>


<div style="background-color: #e0ff83; color:green; padding:10px; margin-bottom: 15px;">
	<strong>Estimado <?php echo($medico->name . " " . $medico->apellido); ?></strong><br>
	<strong>Se ha registrado una valoración de unos de los usuarios en tu perfil médico.</strong>
</div>

<div style="padding: 10px; border: 1px solid lightgrey; margin-bottom: 15px;">
	<strong>DATOS DEL USUARIO QUE REGISTRÓ LA VALORACIÓN.</strong><br><br>
	<strong>Nombre: </strong><span><?php echo($usuario->name . " " . $usuario->apellido); ?></span><br>
	<strong>Teléfono: </strong><span><?php echo($usuario->telefono); ?></span><br>
	<strong>Email: </strong><span><?php echo($usuario->email); ?></span><br>
	<strong>RUT: </strong><span><?php echo($usuario->rut); ?></span>
</div>

<div style="padding: 10px; border: 1px solid lightgrey;background-color: #f3f3f3">
	<strong>VALORACIÓN: <?php echo($valoracion); ?></strong><br>
	<span><?php echo($opinion); ?></span>
</div>