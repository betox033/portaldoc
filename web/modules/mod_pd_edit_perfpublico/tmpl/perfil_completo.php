<style type="text/css">
	#main{
		display: none;
	}
	#formulario_perfil_publico{
		margin-bottom: 30px;
	}
	#formulario_perfil_publico input[type=text],
	#formulario_perfil_publico textarea,
	#formulario_perfil_publico select{
		width: 100%;
		margin-bottom: 10px;
		background-color: #e4e9ef;
		transition: .3s;
		color: black;
	}
	#formulario_perfil_publico input[type=text]:hover,
	#formulario_perfil_publico textarea:hover,
	#formulario_perfil_publico select:hover,
	#formulario_perfil_publico input[type=text]:focus,
	#formulario_perfil_publico textarea:focus,
	#formulario_perfil_publico select:focus{
		background-color: #bbcee4;
	}

	#formulario_perfil_publico textarea{
		min-height: 100px;
		width: 100%;
		max-width: 100%;
		min-width: 100%;
	}
	#formulario_perfil_publico span,
	#formulario_perfil_publico strong{
		font-size: 15px;
	}
	.foto_perfil{
		width: 100%;
		background-color: lightgrey;
		margin-bottom: 15px;
		margin-top: 10px;
		border: 1px solid lightgrey;
	}
	.btn_guardar_cambios{
		border:none;
		float: right;
	}
	.cuadro_servicios{
		border: 1px solid lightgrey;
		padding: 10px;
		margin-bottom: 30px;
	}
</style>


<div class="container">
	<div class="editp_contsup">
		<h3>Configurar perfil público.</h3>
		<span>Complete los siguientes campos para cambiar los datos específicos del perfil público. Algunos de estos campos (región, comuna, especialidad, etc) podrían servir para indexar su perfil al filtro de búsqueda de médicos, por lo que agregar la mayor cantidad de datos no solo formará una mejor vista previa del perfil, si no que además ayudara a mejorar las búsquedas por parte de los pacientes. </span>
		<hr>
	</div>

	<form id="formulario_perfil_publico" onsubmit="return false;" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo($usuario_general->id); ?>">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<span>Foto</span><br>
				<?php if($usuario_general->foto){ ?>
					<img src="<?php echo($usuario_general->foto); ?>" class="foto_perfil">
				<?php }else{ ?>
					<img src="images/sistema/foto_usuario.png" class="foto_perfil">
				<?php } ?>
				
				<input type="file" name="foto" id="foto_usuario">
			</div>
			<div class="col-sm-12 col-md-6 col-lg-8">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-5">
						<span>Region</span> 	<select name="region" id="regiones"></select>
						<span>Comuna</span> 	<select name="comuna" id="comunas"></select>
						<span>Dirección</span> 	<input type="text" name="direccion" value="<?php echo($usuario_general->direccion); ?>">
						<span>Tipo de Servicio</span>
						<div class="cuadro_servicios">
							<div class="row">
								<?php foreach($arreglo_servicios as $servicio){ ?>
									<div class="col-sm-12 col-md-12 col-lg-12 columna_servicio">
										<input type="checkbox" name="" value="<?php echo($servicio->id); ?>"
										class="checkbox_servicio"
										<?php if(in_array($servicio->id, $servicios_usuario)){echo(' checked');} ?>>
										<span><?php echo($servicio->nombre); ?></span>
									</div>
								<?php } ?>
							</div>
						</div>
						<span>Información Adicional: ¿Está disponible para realizar atención de beneficencia?</span><br>
						<span>SI</span>
						<input type="radio" name="info_beneficiencia" value="1" 
						<?php if($usuario_general->info_beneficiencia == 1){echo("checked");} ?>>
						<span>&nbsp;&nbsp;NO</span>
						<input type="radio" name="info_beneficiencia" value="0" 
						<?php if($usuario_general->info_beneficiencia == 0){echo("checked");} ?>>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-7">
						<strong>Código Portal DOC</strong>
						<input type="text" name="codigo_portal" value="<?php echo($usuario_general->codigo_portal); ?>">
						<span>Sitio Web</span>
						<input type="text" name="url_web" value="<?php echo($usuario_general->url_web); ?>">
						<strong>Previsión</strong>
						<div class="row">
							<?php foreach($arreglo_previsiones as $prevision){ ?>
								<div class="col-sm-12 col-md-6 col-lg-6 columna_prevision">
									<input type="checkbox" name="" value="<?php echo($prevision->id); ?>" 
									class="checkbox_prevision" 
									<?php if(in_array($prevision->id, $previsiones_usuario)){echo(' checked');} ?>>
									<span><?php echo($prevision->nombre); ?></span><br>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

				<hr>

				<span>Especialidad</span>
				<input type="text" name="especialidad" id="especialidad" value="<?php echo($usuario_general->especialidad); ?>">
				<span>Especialista en:</span>
				<textarea name="especialidad_detalle"><?php echo($usuario_general->especialidad_detalle); ?></textarea>			
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<span>Docencia</span>
				<textarea name="docencia"><?php echo($usuario_general->docencia); ?></textarea>
				<span>Publicaciones</span>
				<textarea name="publicaciones"><?php echo($usuario_general->publicaciones); ?></textarea>
				<span>Actualidad</span>
				<textarea name="actualidad"><?php echo($usuario_general->actualidad); ?></textarea>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<span>Formación Académica</span><br>
				<textarea name="formacion"><?php echo($usuario_general->formacion); ?></textarea>
				<span>Cursos de Actualización</span>
				<textarea name="cursos"><?php echo($usuario_general->cursos); ?></textarea>
				<span>Experiencia</span>
				<textarea name="experiencia"><?php echo($usuario_general->experiencia); ?></textarea>
			</div>			
		</div>
		<hr>
		<div style="overflow: hidden">
			<button class="btn_pd_verde btn_guardar_cambios">
				<span>Guardar cambios</span>
			</button>			
		</div>
	</form>


</div>


<div class="container">
	<div id="cuadro_aux"></div>
</div>



<script type="text/javascript">
	jQuery(".btn_guardar_cambios").unbind('click').click(function(){
		var prevision = getValoresPrevision();
		var servicio = getValoresServicio();
		var files = jQuery("#foto_usuario")[0].files[0];

		var fd = new FormData();
		fd.append('file', files);
		fd.append('id', jQuery("input[name=id]").val());
		fd.append('region', jQuery("select[name=region]").val());
		fd.append('comuna', jQuery("select[name=comuna]").val());
		fd.append('direccion', jQuery("input[name=direccion]").val());
		fd.append('codigo_portal', jQuery("input[name=codigo_portal]").val());
		fd.append('url_web', jQuery("input[name=url_web]").val());
		fd.append('info_beneficiencia', jQuery("input[name=info_beneficiencia]").val());
		fd.append('especialidad', jQuery("#especialidad").val());
		fd.append('especialidad_detalle', jQuery("textarea[name=especialidad_detalle]").val());
		fd.append('docencia', jQuery("textarea[name=docencia]").val());
		fd.append('publicaciones', jQuery("textarea[name=publicaciones]").val());
		fd.append('actualidad', jQuery("textarea[name=actualidad]").val());
		fd.append('formacion', jQuery("textarea[name=formacion]").val());
		fd.append('cursos', jQuery("textarea[name=cursos]").val());
		fd.append('experiencia', jQuery("textarea[name=experiencia]").val());
		fd.append('prevision', prevision);
		fd.append('servicio', servicio);

		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_edit_perfpublico&method=update_datos_perfil_publico&format=debug',
			data: fd,
			processData: false,
  			contentType: false,
			success: function(response){
				alert(response);
				location.href="index.php?option=com_users&view=profile&Itemid=168";
				//jQuery("#cuadro_aux").html(response);
			}
		});
	});




	function getValoresPrevision(){
		var contador = 0;
		var arreglo_previsiones = new Array();
		jQuery(".checkbox_prevision").each(function(){
			arreglo_previsiones[contador] = {
				'id' : jQuery(this).val(),
				'nombre': jQuery(this).closest(".columna_prevision").find("span").html(),
				'checked' : jQuery(this).prop('checked')
			};
			contador++;
		});
		return JSON.stringify(arreglo_previsiones);
	}

	function getValoresServicio(){
		var contador = 0;
		var arreglo_servicios = new Array();
		jQuery(".checkbox_servicio").each(function(){
			arreglo_servicios[contador] = {
				'id' : jQuery(this).val(),
				'nombre': jQuery(this).closest(".columna_servicio").find("span").html(),
				'checked' : jQuery(this).prop('checked')
			};
			contador++;
		});
		return JSON.stringify(arreglo_servicios);
	}

</script>

<?php include("script_ubicacion.php"); ?>