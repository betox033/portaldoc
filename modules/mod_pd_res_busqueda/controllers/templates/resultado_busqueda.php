
<div class="row">
	<?php foreach ($lista_medicos as $key => $medico) { ?>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div class="itemb_medico">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-5">
						<img src="<?php echo($medico['foto']); ?>" class="foto">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-7">
						<div class="cuadro_datos">
							<span class="nombre"><?php echo($medico['nombre']); ?></span><br>
							<span class="alma_mater"><?php echo($medico['alma_mater']); ?></span><br>
							<span class="esp"><?php echo($medico['especialidad'] . " " . $medico['sub_especialidad']); ?></span>
						</div>
						<div class="cuadro_iconos">
							<?php if($medico['option_est']){ ?>
								<img src="images/sistema/estetoscopio.png">
							<?php } ?>
							<?php if($medico['option_cam']){ ?>
								<img src="images/sistema/camara_video_icon.png">
							<?php } ?>
							<?php if($medico['option_home']){ ?>
								<img src="images/sistema/icono_casa.png">
							<?php } ?>										
						</div>
						<div class="cuadro_opciones">
							<a href="mailto: <?php echo($medico['correo']); ?>">
								<img src="images/sistema/icono_correo.png">
								<span><?php echo($medico['correo']); ?></span>
							</a>
							<div></div>
						</div>
						<div class="cuadro_botones_busqueda">
							<a href="index.php?option=com_content&view=article&id=4&id_medico=<?php echo($medico['id']); ?>&Itemid=138">
								<div class="btn_ver_perfil">
									<span>Ver Perfil</span>
								</div>					
							</a>
						</div>
					</div>
				</div>
			</div>				
		</div>
	<?php } ?>			
</div>