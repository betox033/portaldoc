<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	#main{
		display: none;
	}
	.titulo_res_busqueda{
		color: #004f6f;
		font-size: 24px;
		font-weight: 500;
		border-bottom:1px solid #004f6f;
		margin-bottom: 20px;
	}
	.lista_criterios_busqueda{
		color: #004f6f;
		font-size: 16px;
		font-weight: 500;
		margin-bottom: 20px;
		padding-left: 30px !important;		
	}
	.itemb_medico{
		padding: 15px;
		margin-bottom: 15px;
		cursor: pointer;
		transition: .3s;
		box-shadow: 0 2px 2px 0 rgba(0,0,0,.16), 0 2px 2px 0 rgba(0,0,0,.16);
		border: 1px solid lightgrey;
		background-color: white;
	}
	.itemb_medico:hover{
	}
	.itemb_medico .foto{
		width: 100%;
		border: 1px solid lightgrey;
	}
	.fondo_busqueda{
		background-color: #f9f9f9;
		padding-top: 25px;
		padding-bottom: 25px;
	}
	.cuadro_datos{

	}
	.cuadro_datos .nombre{
		font-size: 18px;
		font-weight: 600;
		color: #004c94;
	}
	.cuadro_datos .esp{
		font-size: 16px;
		font-weight: 500;
		color: #4784c6;
	}
	.cuadro_datos .alma_mater{
		font-size: 16px;
		font-weight: 500;
		color: #58b1ee;
	}
	.cuadro_iconos{
		margin-top: 20px;
	}
	.cuadro_iconos img{
		width: 25px;
	}
	.cuadro_opciones{
		margin-top: 30px;
		font-size: 16px;
		font-weight: 500;
	}
	.btn_ver_perfil{
		background-color: #94bb1e;
		font-size: 12px;
		color: white;
		border-radius: 4px;
		padding: 5px;
		padding-left: 20px;
		padding-right: 20px;
		cursor: pointer;
		transition: .3s;
		text-align: center;
		text-transform: uppercase;
		font-weight: 500;
	}
	.btn_ver_perfil:hover{
		background-color: #81a21a;
	}
	.cuadro_botones_busqueda{
		margin-top: 20px;
	}

	.fondo_titulo{
		background-image: url(images/sistema/fondo_buscar.jpg);
		background-size: cover;
		padding-top: 25px;
		padding-bottom: 25px;
	}
	.cuadro_buscar_general{
		width: 100% !important;
		padding: 7px !important;
		font-size: 20px !important;
		background-color: rgba(255,255,255,.5) !important;
	}
	.cuadro_buscar_general::placeholder{
		color: grey;
	}


	@media(max-width: 990px){
		.itemb_medico .foto{
			width: 50%;
			margin-left: 25%;
		}

	}
</style>


<div class="fondo_titulo">
	<div class="container">
		<div class="titulo_res_busqueda">
			<span>Resultado de búsqueda por <?php echo($criterio); ?>.</span>
		</div>
		<ul class="lista_criterios_busqueda">
			<?php if($especialidad){echo("<li>Especialidad/Apellido: '" . $especialidad . "'</li>");} ?>
			<?php if($ubicacion){echo("<li>Región/Comuna: '" . $ubicacion . "'</li>");} ?>
			<?php if($prevision){echo("<li>Prevision: '" . $prevision . "'</li>");} ?>
			<?php if($servicio){echo("<li>Servicio: '" . $servicio . "'</li>");} ?>
		</ul>
	</div>	
</div>


<div class="fondo_busqueda">
	<div class="container">
		<div class="cuerpo_busqueda">
			<div class="row">
				<?php foreach ($lista_medicos as $key => $medico) { ?>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="itemb_medico">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-4">
									<?php if($medico->foto){ ?>
										<img src="<?php echo($medico->foto); ?>" class="foto">
									<?php }else{ ?>
										<?php if($medico->sexo == "F"){ ?>
											<img src="images/sistema/foto_usuario_mujer.png" class="foto">
										<?php }else{ ?>
											<img src="images/sistema/foto_usuario.png" class="foto">
										<?php } ?>
									<?php } ?>
									<div class="cuadro_botones_busqueda">
										<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
											<div class="btn_ver_perfil">
												<span>Ver Perfil</span>
											</div>					
										</a>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-8">
									<div class="cuadro_datos">
										<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span>
										<br>
										<span class="esp"><?php echo($medico->especialidad . " (" . $medico->especialidad_detalle.")"); ?></span>
										<br>

										<?php $val_prom_ent = round($medico->valoracion_promedio); ?>
										<div class="cuadro_valoracion" style="color: #2a3c50;overflow: hidden">
											<div style="float: left;margin-right: 15px">
												<?php for($k=0; $k<$val_prom_ent; $k++){ ?>
													<i class="fa fa-star"></i>
												<?php } ?>
												<?php if($val_prom_ent < $medico->valoracion_promedio){ ?>
													<i class="fa fa-star-half"></i>
												<?php } ?>
											</div>
											<strong><?php echo($medico->cant_valoracion . " opiniones"); ?></strong>
										</div>
									</div>
									<div style="height: 15px;"></div>

									<table>
										<tbody>
											<tr>
												<td style="width: 20px"><i class="fa fa-map-marker" style="font-size: 20px"></i></td>
												<td>
													<strong><?php echo($medico->region . " - " . $medico->comuna); ?></strong><br>
													<?php $direccion = str_replace("/br/", "<br>", $medico->direccion); ?>
													<span><?php echo($direccion); ?></span>
												</td>
											</tr>
											<tr>
												<td><i class="fa fa-envelope"></i></td>
												<td>
													<a href="mailto: <?php echo($medico->email); ?>">
														<span><?php echo($medico->email); ?></span>
													</a>
												</td>
											</tr>
											<tr>
												<td><i class="fa fa-globe" style="font-size: 20px"></i></td>
												<td>
													<a href="<?php echo($medico->url_web); ?>" target="_blank">
														<span><?php echo($medico->url_web); ?></span>
													</a>
												</td>
											</tr>
											<tr>
												<td><i class="fa fa-mobile" style="font-size: 20px"></i></td>
												<td>
													<a href="tel: <?php echo($medico->telefono); ?>">
														<span><?php echo($medico->telefono); ?></span>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
									
								</div>
							</div>
						</div>				
					</div>
				<?php } ?>			
			</div>
		</div>
	</div>	
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){






		jQuery(".cuadro_buscar_general").keyup(function(){
			var valor_busqueda = jQuery(this).val();
			var criterio_busqueda = jQuery("#criterio_busqueda").val();

			jQuery.ajax({
				type: 'POST',
				url: '/web/modules/mod_pd_res_busqueda/controllers/busquedaGeneral.php',
				data:'valor_busqueda=' + valor_busqueda + "&criterio_busqueda=" + criterio_busqueda,
				success: function(response){
					jQuery(".cuerpo_busqueda").html(response);
				}
			});
		});
	});
</script>

