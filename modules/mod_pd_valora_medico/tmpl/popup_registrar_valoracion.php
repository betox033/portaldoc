

<style type="text/css">
	#reg_opinion .modal-content{
		padding: 40px;
	}
	.titulo_reg_val{
		font-size: 20px;
		border-bottom: 1px solid lightgrey;
	}
	#form_reg_opinion{
		margin-top: 20px;
	}
	#form_reg_opinion input, #form_reg_opinion textarea{
		width: 100%;
		margin-bottom: 7px;
		background-color: #e4e4e4;
		border: none;
	}
	#form_reg_opinion textarea{
		height: 120px;
		max-height: 120px;
		min-height: 120px;
		width: 100%;
		max-width: 100%;
		min-width: 100%;
	}
	.btn_cerrar_aux{
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}
	.btn_cerrar_aux img{
		width: 25px;
		opacity: .7;
		transition: .3s;
	}
	.btn_cerrar_aux img:hover{
		opacity: 1;
	}
	.datos_usuario{
		border: 1px solid lightgrey;
		padding: 10px;
	}
	.estrella_val{
		color: lightgrey;
		font-size: 22px;
		margin-left: 10px;
		margin-right: 10px;
		transition: .3s;
		cursor: pointer;
	}
	.estrella_val:hover, .estrella_val.marcar{
		color: #f3d33a;
	}
	.estrella_val.proviso{
		color: #caa808;
	}

	.cuadro_error{
		margin-top: 5px;
		margin-bottom: 5px;
		border: 1px solid red;
		background-color: #ffd5d5;
		color: red;
		font-size: 15px;
		opacity: 0;
		max-height: 0px;
		transition: .3s;
		overflow: hidden;
	}
	.cuadro_error.mostrar{
		padding: 10px;
		max-height: none;
		opacity: 1;
	}
	.info_reg{
		text-align: justify;
		margin-top: 10px;
	}
</style>





<div class="modal fade" id="reg_opinion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">

		<div class="btn_cerrar_aux" data-dismiss="modal" aria-label="Close">
			<img src="images/sistema/icono_cerrar.png">
		</div>

		<div class="titulo_reg_val">
			<span>Registrar Valoración del Médico</span>
		</div>

		<div class="info_reg">
			<span>La evaluación de los médicos nos permite mejorar nuestros servicios de atención, al mismo tiempo que ayudar a posicionar a los profesionales de la salud dentro de nuestros perfiles destacados. Cabe mencionar que el registro de estas valoraciones son de exclusiva responsabilidad de quien las emite.</span>
			<br>
			<span>Los administradores del sitio pueden despublicar una opinión, si es que ésta no cumple con los estándares mínimos de respeto que merecen nuestro médicos. </span><br>
			<span>Para volver a registrar una opinion debe pasar al menos una semana.</span>
		</div>

		<form id="form_reg_opinion">
			<div class="datos_usuario">
				<strong>Nombre: </strong>
				<span><?php echo($usuario_general->name . " " . $usuario_general->apellido); ?></span><br>
				<strong>Teléfono: </strong><span><?php echo($usuario_general->telefono); ?></span><br>
				<strong>Email: </strong><span><?php echo($usuario_general->email); ?></span><br>
			</div>

			<div style="border: 1px solid lightgrey; padding: 10px;margin-top: 10px;margin-bottom: 10px;padding-bottom: 20px">
				<span>Valoración</span>
				<div class="cuadro_valoracion centro-abs">
					<?php for($k=1; $k < 6; $k++){ ?>
						<i class="icon-star estrella_val" valor="<?php echo($k); ?>"></i>
					<?php } ?>
				</div>    			
			</div>

			<textarea name="opinion" placeholder="Opinion(*)" id="input_opinion"></textarea>
			<input type="hidden" id="id_medico_prof" value="<?php echo($medico[0]); ?>">
			<div class="cuadro_error">
				
			</div>
			<div class="centro-abs">

				<div class="btn_pd_verde btn_registrar_final" style="border: none">
					<span>Registrar Valoración</span>
				</div>				
			</div>
		</form>

	</div>
</div>
</div>



<script type="text/javascript">
	jQuery(".btn_registrar_final").unbind('click').click(function(){
		var opinion = jQuery("#input_opinion").val();
		var valoracion = getValoracionEstrellas();
		var id_medico_prof = jQuery("#id_medico_prof").val();

		var error = validarCamposValoracion(opinion, valoracion);
		if(error == ""){
			jQuery.ajax({
				type: 'POST',
				url: 'index.php?option=com_ajax&module=pd_valora_medico&method=registrar_valoracion&format=debug',
				data: 'opinion=' + opinion + "&valoracion=" + valoracion + "&id_medico_prof=" + id_medico_prof,
				beforeSend: function(){

				},
				success: function(response){
					alert(response);
					location.reload();
				}
			});
		}else{
			jQuery(".cuadro_error").html(error);
			jQuery(".cuadro_error").addClass("mostrar");
			setTimeout(function() {
				jQuery(".cuadro_error").removeClass("mostrar");
			},10000);
		}



	});

	function validarCamposValoracion(opinion, valoracion){
		var mensaje = "";
		if(opinion == ""){
			mensaje = "Debe ingresar una opinión en la valoración.";
		}
		if(valoracion == 0){
			mensaje = mensaje + "<br>" + "Debe seleccionar un rango de valoración de al menos 1 estrella.";
		}
		return mensaje;
	}

	function getValoracionEstrellas(){
		var cantidad = 0;
		jQuery(".estrella_val").each(function(){
			if(jQuery(this).hasClass("marcar")){
				cantidad++;
			}
		});
		return cantidad;
	}

	jQuery(".estrella_val").unbind('click').click(function(){
		var valor = jQuery(this).attr("valor");
		jQuery(".estrella_val").each(function(){
			if(jQuery(this).attr("valor") <= valor){
				jQuery(this).addClass("marcar");
			}else{
				jQuery(this).removeClass("marcar");
			}
		});
	});
	jQuery(".estrella_val").mouseover(function(){
		var valor = jQuery(this).attr("valor");
		jQuery(".estrella_val").each(function(){
			if(jQuery(this).attr("valor") <= valor){
				jQuery(this).addClass("proviso");
			}else{
				jQuery(this).removeClass("proviso");
			}
		});
	});
	jQuery(".estrella_val").mouseleave(function(){
		jQuery(".estrella_val").each(function(){
			jQuery(this).removeClass("proviso");
		});
	});
</script>