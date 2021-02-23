<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.boton_registro{
		background-color: #94bb1e;
		padding-left: 50px !important;
		padding-right: 50px !important;
		transition: .3s;
	}
	.boton_registro:hover{
		background-color: #789818 !important;
	}
	#popup_pd .modal-content{
		background-color: rgba(151,183,39,.95);
		border-radius: 10px;
		min-height: 100px;
		position: relative;
		padding: 30px;
		padding-top: 40px;
		padding-bottom: 40px;
		color: white;
	}
	.btn_cerrar{
		font-size: 24px;
		color: white;
		position: absolute;
		top: 5px;
		right: 10px;
		cursor: pointer;
	}
	#form_registro input[type=radio]{
		width: 20px;
		height: 20px;
		color: grey;
		background-color: grey;
		margin-right: 3px;
		margin-top: 3px;
		margin-left: 10px;
	}
	#form_registro input[type=text]{
		width: 100%;
		padding: 3px;
		padding-left: 7px;
		border: none;
		margin-bottom: 7px;
	}
	#form_registro input[type=text]::placeholder{
		padding: 3px;
		padding-left: 7px;
	}
	#form_registro textarea{
		padding: 3px;
		width: 100%;
		height: 150px;
		max-height: 150px;
		min-height: 150px;
	}
	.btn_enviar_registro{
		color: white;
		background-color: #005db4;
		font-size: 18px;
		font-weight: 100;
		float: right;
		padding: 5px;
		padding-left: 40px;
		padding-right: 40px;
		transition: .3s;
		cursor: pointer;
		border: none;
	}
	.contenido_popup{
		display: none;
	}
</style>


<div class="contenido_popup">
	<div class="btn_cerrar" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></div>
	<strong style="font-size: 18px">Formulario de Contacto</strong>
	<div style="font-weight: 100; line-height: 120%; font-size: 15px;margin-top: 15px;margin-bottom: 15px;">
		<span>Si desean ser contactado por uno de nuestros ejecutivo, completa
		el formulario a continuación y te llamaremos a la brevedad posible</span>
	</div>

	<form id="form_registro">
		<input type="radio" name="tipo">
		<span>Registro Paciente</span>
		<input type="radio" name="tipo">
		<span>Registro Médico</span>
		<div style="height: 18px;"></div>
		<input type="text" name="nombre" placeholder="Nombre y Apellidos">
		<input type="text" name="rut" placeholder="RUT sin puntos ni guión">
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="telefono" placeholder="Teléfono">
		<input type="text" name="asunto" placeholder="Asunto">
		<textarea name="mensaje" placeholder="Mensaje"></textarea>

		<div style="position: relative;margin-top: 20px;margin-bottom: 10px">
			<button class="btn_enviar_registro" type="submit">
				<span>ENVIAR</span>
			</button>
		</div>
	</form>
</div>


<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".boton_registro").unbind('click').click(function(){
			var contenido_popup = jQuery(".contenido_popup").html();
			jQuery("#popup_pd .modal-content").html(contenido_popup);

			jQuery("#popup_pd").modal("show");
		});
	});
</script>

