			<div class="owl-carousel" id="carrusel_medicos">
				<?php foreach($lista_medicos_destacados as $medico){ ?>
					<div class="cuadro_medico">
						<div class="cuadro_foto">
							<?php if($medico->foto){ ?>
								<img src="<?php echo($medico->foto); ?>">
							<?php }else{ ?>
								<?php if($medico->sexo == 'F'){ ?>
									<img src="images/sistema/foto_usuario_mujer.png">
								<?php }else{ ?>
									<img src="images/sistema/foto_usuario.png">
								<?php } ?>
							<?php } ?>
							<a href="index.php?option=com_content&view=article&id=4&id_medico=<?php echo($medico->id); ?>">
								<div class="overlay_blue">
									<i class="icon icon-search"></i>
								</div>
							</a>
						</div>
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
							<?php if($medico->especialidad){ ?>
								<div class="cuadro_esp">
									<span class="esp"><?php echo($medico->especialidad); ?></span><br>	
									<span class="esp_detalle"><?php echo($medico->especialidad_detalle); ?></span>		
								</div>
							<?php } ?>
						</div>

						<div class="cuadro_ubi_meddes">
							<i class="fa fa-map-marker"></i>
							<div class="texto">
								<span><?php echo($medico->direccion); ?></span>
							</div>
						</div>

						<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>" class="btn_agenda_mobile">
							<div class="btn_ver_perfil btn_agendar_77">
								<span><?php echo($home_meddes_txtbtn_perfilmed); ?></span>
							</div>					
						</a>

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
										<div class="btn_ver_perfil btn_valoracion">
											<span><?php echo($home_meddes_txtbtn_valoraciones); ?></span>
										</div>					
									</a>
								</div>

								<div class="derecha">
									<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>" class="btn_agenda_desktop">
										<div class="btn_ver_perfil btn_agendar_77">
											<span><?php echo($home_meddes_txtbtn_perfilmed); ?></span>
										</div>					
									</a>
								</div>
							</div>

						</div>

					</div>			
				<?php } ?>
			</div>

			<?php if(!$lista_medicos_destacados){ ?>
				<div style="border: 1px solid lightgrey;padding: 20px;font-size: 17px;color:grey">
					<span>No hay médicos que coincidan con la búsqueda.</span>
				</div>
			<?php } ?>