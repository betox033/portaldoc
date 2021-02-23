<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.cuadro_flota_sesion{
		position: fixed;
		top: 32px;
		right: 104px;
		z-index: 1100;
		width: 250px;
		background-color: white;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.3);
		color: black;
		overflow: hidden;
		max-height: 0px;
		transition: .3s;
		opacity: 0;
	}
	.cuadro_flota_sesion.mostrar{
		max-height: none;
		opacity: 1;
	}
	.titulo_form_is{
		
	}
	.titulo_form_is .titulo{
		text-transform: uppercase;
		font-size: 18px;
		font-weight: bold;
		text-align: center;
	}
	.titulo_form_is .subtitulo{
		line-height: 120%;
		margin-bottom: 15px;
	}
	#form_iniciar_sesion input,
	#form_iniciar_sesion select{
		width: 100%;
		margin-bottom: 5px;
	}
	.btn_is{
		width: 100%;
		border: none;
		font-size: 12px;
		padding: 6px;
	}
	.linea_opcion{
		transition: .3s;
		line-height: 120%;
		font-size: 15px;
		padding: 10px;
		border-bottom: 1px solid lightgrey;
	}
	.linea_opcion:hover{
		background-color: lightgrey;
	}
	.link_sesion{
		color: #2a3c50;
	}
	.cuadro_sup_sesion{
		padding: 15px;
	}
	.link_menu_sesion{
		color: black;
		font-size: 12px;
	}

	#cuadro_iniciar_sesion{
		right: 8vw;
		width: 18vw;
	}

	@media(max-width: 990px){
		#cuadro_iniciar_sesion{
			width: 65vw;
		}

	}


</style>



<?php  $usuario_general   = JFactory::getUser(); ?>


<?php if (!empty($cookieLogin) || $usuario_general->get('id')){ ?>
	<div class="cuadro_flota_sesion cls">
		<a href="index.php?option=com_users&view=profile" class="link_sesion cls">
			<div class="linea_opcion cls">
				<i class="icon-user cls"></i>
				<span class="cls">Mi perfil</span>
			</div>		
		</a>
		<a href="index.php?option=com_users&view=login&layout=logout&task=user.menulogout" class="link_sesion cls">
			<div class="linea_opcion cls">
				<i class="icon-out cls"></i>
				<span class="cls">Cerrar Sesión</span>
			</div>		
		</a>
	</div>

	<script type="text/javascript">
		var nombre_usuario = '<?php echo($usuario_general->name); ?>';
		jQuery(".btn_mi_portal span").html("Hola " + nombre_usuario + "!");
	</script>
<?php }else{ ?>
	<div class="cuadro_flota_sesion cls" id="cuadro_iniciar_sesion">
		<div class="cuadro_sup_sesion cls">
			<div class="titulo_form_is cls">
				<div class="titulo cls"><span class="cls">iniciar sesión</span></div>
				<div class="subtitulo cls">
					<span class="cls">Selecciona tu tipo de usuario e ingresa a nuestra plataforma.</span>
				</div>
			</div>
			<form id="form_iniciar_sesion" class="cls">
				<select name="tipo" class="cls">
					<option value="1">Médico</option>
					<option value="2">Profesional</option>
					<option value="3">Paciente</option>
				</select>
				<input type="text" name="username" data-toggle="tooltip" title="Debe ingresar el nombre de usuario."
				class="cls">
				<input type="password" name="password" data-toggle="tooltip" title="Debe ingresar una contraseña."
				class="cls">
				<button type="submit" class="btn_pd_verde btn_is cls">
					<span class="cls">Iniciar Sesión</span>
				</button>
			</form>
			<a href="index.php?option=com_users&view=reset" class="link_menu_sesion cls">
				<span class="cls">Recuperar contraseña</span>
			</a>
			<br>
			<a href="index.php?option=com_users&view=registration&tipo=general" class="link_menu_sesion cls">
				<span class="cls">Registrar Usuario</span>
			</a>
		</div>
	</div>
<?php } ?>





<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".dropdown-toggle").click(function(){
			var cuadro_flota_sesion = jQuery(".cuadro_flota_sesion");
			cuadro_flota_sesion.removeClass("mostrar");
		});
	});

	jQuery(document).click(function(e){
		var cuadro_flota_sesion = jQuery(".cuadro_flota_sesion");
		if(jQuery(e.target).hasClass("cls") || jQuery(e.target).hasClass("btn_mi_portal")){
			cuadro_flota_sesion.addClass("mostrar");
		}else{
			cuadro_flota_sesion.removeClass("mostrar");
		}
	});

/*
	jQuery(".btn_mi_portal").unbind('click').click(function(){
		var cuadro_flota_sesion = jQuery(".cuadro_flota_sesion");
		if(cuadro_flota_sesion.hasClass("mostrar")){
			cuadro_flota_sesion.removeClass("mostrar");
		}else{
			cuadro_flota_sesion.addClass("mostrar");
		}
	});
	*/

	jQuery("#form_iniciar_sesion").validate({
		rules: {
			username: 'required',
			password: 'required',
		},
		errorPlacement: function(){
			jQuery('[data-toggle="tooltip"]').tooltip()
			return false; 
		},
		submitHandler: function(form, e) {
			jQuery.ajax({
				type: 'POST',
				url: 'index.php?option=com_ajax&module=pd_menu_sesion&method=validar_existe_usuario&format=debug',
				data: jQuery("#form_iniciar_sesion").serialize(),
				success: function(response){
					var arregloRespuesta = JSON.parse(response);
					var resultado = arregloRespuesta['resultado'];

					if(resultado == '1'){
						jQuery.ajax({
							type: 'POST',
							url: 'index.php?option=com_ajax&module=pd_menu_sesion&method=logear_usuario&format=debug',
							data: jQuery("#form_iniciar_sesion").serialize(),
							success: function(response){
								var arreglo = JSON.parse(response);
								if(arreglo['valido'] == "valido"){
									alert("Inicio de sesión correcto.");
									location.reload();
								}else{
									alert(arreglo['mensaje']);
								}
							}
						});
					}else{
						var mensaje = arregloRespuesta['mensaje'];
						alert(mensaje);
					}	
				}
			});
		}
	});

</script>





