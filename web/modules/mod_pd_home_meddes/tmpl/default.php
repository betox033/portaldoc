<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	#content, #main{
		display: none;
	}
	.titulo_medicos{
		border-bottom: 1px solid #004c94;
		padding-top: 10px;
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 5px;
		color: #004c94;
		font-size: 24px;
		font-weight: bold;
		margin-bottom: 15px;
		margin-top: 30px;
	}
	.cuadro_medico{
		border: 1.2px solid rgba(0,129,198,.7);
		padding: 10px;
		border-bottom-left-radius: 8px;
		border-bottom-right-radius: 8px;
	}
	.cuadro_medico .cuadro_foto{
		position: relative;
	}
	.cuadro_medico .cuadro_foto img{
		width: 100%;
	}
	.cuadro_medico .cuadro_foto .overlay_blue{
		cursor: pointer;
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: 5;
		background-color: rgba(0,129,198,.5);
		opacity: 0;
		transition: .3s;
		top: 0px;
		left: 0px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		font-size: 20px;
	}
	.cuadro_medico .cuadro_foto:hover .overlay_blue{
		opacity: 1;
	}
	.cuadro_datos{
		line-height: 120%;
		margin-top: 15px;
		min-height: 30px;
	}
	.cuadro_datos .nombre{
		color: #074c94;
		font-weight: 700;
		text-transform: uppercase;
	}
	.cuadro_datos .alma_mater{
		color: #5599db;
	}
	.cuadro_datos .esp{
		color: #0081c6;
		font-size: 13px;
		font-weight: 500;
	}
	.cuadro_opciones{
		overflow: hidden;
		margin-top: 10px;
	}
	.cuadro_medico .cuadro_iconos{
		color: #94bb1e;
		float: left;
		overflow: hidden;
	}
	.cuadro_medico .cuadro_iconos img{
		width: 25px !important;
		float: left;
		margin-right: 3px;
		cursor: pointer;
	}
	.btn_ver_perfil{
		background-color: #94bb1e;
		font-size: 12px;
		float: right;
		color: white;
		border-radius: 4px;
		padding: 3px;
		padding-left: 15px;
		padding-right: 15px;
		cursor: pointer;
		transition: .3s;
	}
	.btn_ver_perfil:hover{
		background-color: #81a21a;
	}
	.cuadro_valoraciones i{
		font-size: 17px;
		color: #f1bd00;
	}
	.botones_cuadro{
		overflow: hidden;
	}
	.botones_cuadro .iquierda{
		float: left;
		width: 50%;
	}



	@media(max-width: 990px){
		.titulo_medicos{
			margin-left: 10px;
			margin-right: 10px;
		}
		.botones_cuadro .iquierda{
			width: 100%;
		}
		.btn_ver_perfil{
			width: 100%;
			margin-bottom: 3px;
			text-align: center;
		}

	}

</style>


<div class="container">
	<div class="titulo_contenido" style="text-align: center">
		<span>Médicos mejor valorados</span>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<div class="owl-carousel" id="carrusel_medicos">
				<?php foreach($lista_medicos_destacados as $medico){ ?>
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<img src="images/sistema/foto_usuario.png">
							<?php } ?>
							
							<div class="overlay_blue">
								<i class="icon icon-search"></i>
							</div>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<span class="esp">
									<?php echo($medico->especialidad . " " . $medico->sub_especialidad); ?>
								</span>
							<?php } ?>
						</div>
						<div class="cuadro_valoraciones">
							<strong>Valoración promedio: <?php echo(round($medico->valoracion_promedio + 0, 2)); ?></strong>
							<div>
								<?php for($k=0; $k<round($medico->valoracion_promedio); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico->valoracion_promedio > round($medico->valoracion_promedio)){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
						<div class="cuadro_opciones">
							<div class="cuadro_iconos">
								<?php if($medico->option_est){ ?>
									<img src="images/sistema/estetoscopio.png" title="El profesional atiende en su consulta particular">
								<?php } ?>
								<?php if($medico->option_cam){ ?>
									<img src="images/sistema/camara_video_icon.png">
								<?php } ?>
								<?php if($medico->option_home){ ?>
									<img src="images/sistema/icono_casa.png">
								<?php } ?>
							</div>

							<div class="botones_cuadro">
								<div class="izquierda">
									<a href="index.php?option=com_content&view=article&id=18&Itemid=183&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Valoraciones</span>
										</div>					
									</a>
								</div>
								<div class="izquierda">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Agende aquí</span>
										</div>					
									</a>
								</div>
							</div>

						</div>

					</div>			
				<?php } ?>

				<!-- ######################################################## -->
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<img src="images/sistema/foto_usuario.png">
							<?php } ?>
							
							<div class="overlay_blue">
								<i class="icon icon-search"></i>
							</div>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<span class="esp">
									<?php echo($medico->especialidad . " " . $medico->sub_especialidad); ?>
								</span>
							<?php } ?>
						</div>
						<div class="cuadro_valoraciones">
							<strong>Valoración promedio: <?php echo(round($medico->valoracion_promedio + 0, 2)); ?></strong>
							<div>
								<?php for($k=0; $k<round($medico->valoracion_promedio); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico->valoracion_promedio > round($medico->valoracion_promedio)){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
						<div class="cuadro_opciones">
							<div class="cuadro_iconos">
								<?php if($medico->option_est){ ?>
									<img src="images/sistema/estetoscopio.png" title="El profesional atiende en su consulta particular">
								<?php } ?>
								<?php if($medico->option_cam){ ?>
									<img src="images/sistema/camara_video_icon.png">
								<?php } ?>
								<?php if($medico->option_home){ ?>
									<img src="images/sistema/icono_casa.png">
								<?php } ?>
							</div>

							<div style="overflow: hidden">
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=18&Itemid=183&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Valoraciones</span>
										</div>					
									</a>
								</div>
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Agende aquí</span>
										</div>					
									</a>
								</div>
							</div>



							

						</div>
					</div>
				<!-- ######################################################## -->
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<img src="images/sistema/foto_usuario.png">
							<?php } ?>
							
							<div class="overlay_blue">
								<i class="icon icon-search"></i>
							</div>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<span class="esp">
									<?php echo($medico->especialidad . " " . $medico->sub_especialidad); ?>
								</span>
							<?php } ?>
						</div>
						<div class="cuadro_valoraciones">
							<strong>Valoración promedio: <?php echo(round($medico->valoracion_promedio + 0, 2)); ?></strong>
							<div>
								<?php for($k=0; $k<round($medico->valoracion_promedio); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico->valoracion_promedio > round($medico->valoracion_promedio)){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
						<div class="cuadro_opciones">
							<div class="cuadro_iconos">
								<?php if($medico->option_est){ ?>
									<img src="images/sistema/estetoscopio.png" title="El profesional atiende en su consulta particular">
								<?php } ?>
								<?php if($medico->option_cam){ ?>
									<img src="images/sistema/camara_video_icon.png">
								<?php } ?>
								<?php if($medico->option_home){ ?>
									<img src="images/sistema/icono_casa.png">
								<?php } ?>
							</div>

							<div style="overflow: hidden">
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=18&Itemid=183&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Valoraciones</span>
										</div>					
									</a>
								</div>
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Agende aquí</span>
										</div>					
									</a>
								</div>
							</div>



							

						</div>
					</div>
				<!-- ######################################################## -->
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<img src="images/sistema/foto_usuario.png">
							<?php } ?>
							
							<div class="overlay_blue">
								<i class="icon icon-search"></i>
							</div>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<span class="esp">
									<?php echo($medico->especialidad . " " . $medico->sub_especialidad); ?>
								</span>
							<?php } ?>
						</div>
						<div class="cuadro_valoraciones">
							<strong>Valoración promedio: <?php echo(round($medico->valoracion_promedio + 0, 2)); ?></strong>
							<div>
								<?php for($k=0; $k<round($medico->valoracion_promedio); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico->valoracion_promedio > round($medico->valoracion_promedio)){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
						<div class="cuadro_opciones">
							<div class="cuadro_iconos">
								<?php if($medico->option_est){ ?>
									<img src="images/sistema/estetoscopio.png" title="El profesional atiende en su consulta particular">
								<?php } ?>
								<?php if($medico->option_cam){ ?>
									<img src="images/sistema/camara_video_icon.png">
								<?php } ?>
								<?php if($medico->option_home){ ?>
									<img src="images/sistema/icono_casa.png">
								<?php } ?>
							</div>

							<div style="overflow: hidden">
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=18&Itemid=183&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Valoraciones</span>
										</div>					
									</a>
								</div>
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Agende aquí</span>
										</div>					
									</a>
								</div>
							</div>



							

						</div>
					</div>
				<!-- ######################################################## -->
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<img src="images/sistema/foto_usuario.png">
							<?php } ?>
							
							<div class="overlay_blue">
								<i class="icon icon-search"></i>
							</div>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<span class="esp">
									<?php echo($medico->especialidad . " " . $medico->sub_especialidad); ?>
								</span>
							<?php } ?>
						</div>
						<div class="cuadro_valoraciones">
							<strong>Valoración promedio: <?php echo(round($medico->valoracion_promedio + 0, 2)); ?></strong>
							<div>
								<?php for($k=0; $k<round($medico->valoracion_promedio); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico->valoracion_promedio > round($medico->valoracion_promedio)){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
						<div class="cuadro_opciones">
							<div class="cuadro_iconos">
								<?php if($medico->option_est){ ?>
									<img src="images/sistema/estetoscopio.png" title="El profesional atiende en su consulta particular">
								<?php } ?>
								<?php if($medico->option_cam){ ?>
									<img src="images/sistema/camara_video_icon.png">
								<?php } ?>
								<?php if($medico->option_home){ ?>
									<img src="images/sistema/icono_casa.png">
								<?php } ?>
							</div>

							<div style="overflow: hidden">
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=18&Itemid=183&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Valoraciones</span>
										</div>					
									</a>
								</div>
								<div style="float: left; width: 50%">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
										<div class="btn_ver_perfil">
											<span>Agende aquí</span>
										</div>					
									</a>
								</div>
							</div>



							

						</div>
					</div>
				<!-- ######################################################## -->


			</div>	
		</div>
	</div>
	
</div>


<div style="height: 20px"></div>






<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#carrusel_medicos').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			autoplay: true,
			responsive:{
				0:{
					items:2,
				},
				600:{
					items:4,
				},
				1000:{
					items:4,
				}
			}
		})
	});
</script>