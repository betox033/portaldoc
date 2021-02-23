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
			<div class="col-sm-12 col-md-6 col-lg-3">
				<?php if($usuario_general->foto){ ?>
					<img src="<?php echo($usuario_general->foto); ?>" class="foto_perfil">
				<?php }else{ ?>
					<img src="images/sistema/foto_usuario.png" class="foto_perfil">
				<?php } ?>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-9">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">

						<table class="table table-striped">
							<tbody>
								<tr>
									<td style="width: 40%"><strong>Region: </strong></td>
									<td style="width: 60%"><span><?php echo($usuario_general->region); ?></span></td>
								</tr>
								<tr>
									<td><strong>Comuna: </strong></td>
									<td><span><?php echo($usuario_general->comuna); ?></span></td>
								</tr>
								<tr>
									<td><strong>Dirección: </strong></td>
									<td><span><?php echo($usuario_general->direccion); ?></span></td>
								</tr>
								<tr>
									<td><strong>Código Portal DOC</strong></td>
									<td><span><?php echo($usuario_general->codigo_portal); ?></span></td>
								</tr>
								<tr>
									<td><strong>Sitio Web</strong></td>
									<td><span><?php echo($usuario_general->url_web); ?></span></td>
								</tr>
								<tr>
									<td><strong>Especialidad</strong></td>
									<td><span><?php echo($usuario_general->especialidad); ?></span></td>
								</tr>
								<tr>
									<td><strong>Especialista en: </strong></td>
									<td><span><?php echo($usuario_general->especialidad_detalle); ?></span></td>
								</tr>
							</tbody>
						</table>

					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">

						<table class="table table-striped">
							<tbody>
								<tr>
									<td style="width: 40%"><strong>Previsión</strong></td>
									<td style="width: 60%">
										<ul>
											<?php foreach($arreglo_previsiones as $prevision){ ?>
												<?php if(in_array($prevision->id, $previsiones_usuario)){ ?>
													<li><?php echo($prevision->nombre); ?></li>
												<?php } ?> 
											<?php } ?>
										</ul>
									</td>
								</tr>
								<tr>
									<td><strong>Servicios</strong></td>
									<td>
										<ul>
											<?php foreach($arreglo_servicios as $servicio){ ?>
												<?php if(in_array($servicio->id, $servicios_usuario)){ ?>
													<li><?php echo($servicio->nombre); ?></li>
												<?php } ?>
											<?php } ?>	
										</ul>
									</td>
								</tr>
								<tr>
									<td><strong>Información Adicional: ¿Está disponible para realizar atención de beneficencia?</strong></td>
									<td>
										<?php if($usuario_general->info_beneficiencia){ ?>
											<i class="fa fa-check"></i>
										<?php }else{ ?>
											<i class="fa fa-close"></i>
										<?php } ?>
									</td>
								</tr>
							</tbody>
						</table>
						
					</div>
				</div>
		
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

		var fd = new FormData();
		fd.append('id', jQuery("input[name=id]").val());
		fd.append('docencia', jQuery("textarea[name=docencia]").val());
		fd.append('publicaciones', jQuery("textarea[name=publicaciones]").val());
		fd.append('actualidad', jQuery("textarea[name=actualidad]").val());
		fd.append('formacion', jQuery("textarea[name=formacion]").val());
		fd.append('cursos', jQuery("textarea[name=cursos]").val());
		fd.append('experiencia', jQuery("textarea[name=experiencia]").val());

		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_edit_perfpublico&method=update_perfil_limitado&format=debug',
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



</script>

<?php include("script_ubicacion.php"); ?>