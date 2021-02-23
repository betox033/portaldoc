<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	#main{
		display: none;
	}
	.cuadro_perfilmed{
		margin-bottom: 50px;
	}
	.perfilmed_nombre{
		font-size: 24px;
		font-weight: 500;
		color: #004c94;
	}
	.perfilmed_alma_mater{
		font-size: 20px;
		font-weight: 500;
		color: #58b1ee;
	}
	.perfilmed_esp{
		font-size: 20px;
		font-weight: 500;
		color: #4784c6;
	}
	.datos_principal{
		line-height: 130%;
		margin-top: 10px;
	}
	.direccion{
		font-size: 16px;
		color: #4f4f4f;
		line-height: 120%;
		font-weight: 500;
		margin-bottom: 10px;
	}
	.cuadro_iconos{
		margin-top: 15px;
		margin-bottom: 15px;
		overflow: hidden;
	}
	.cuadro_iconos img{
		float: left;
		width: 25px;
		margin-right: 3px;
	}
</style>


<div style="height: 170px"></div>


<div class="container cuadro_perfilmed">
	<div class="titulo_perfil_medico">
		<span>Médicos Traumatólogos</span>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<img src="<?php echo($perfilmed_foto); ?>" style="width: 100%;">
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="datos_principal">
						<span class="perfilmed_nombre"><?php echo($perfilmed_nombre); ?></span>
						<div style="height: 7px;"></div>
						<span class="perfilmed_alma_mater"><?php echo($perfilmed_alma_mater); ?></span>
						<div style="height: 7px"></div>
						<span class="perfilmed_esp"><?php echo($perfilmed_esp); ?></span>						
					</div>
					<div class="cuadro_iconos">
						<?php if($perfilmed_estetoscopio){ ?>
							<img src="images/sistema/estetoscopio.png">
						<?php } ?>
						<?php if($perfilmed_camara){ ?>
							<img src="images/sistema/camara_video_icon.png">
						<?php } ?>
						<?php if($perfilmed_casa){ ?>
							<img src="images/sistema/icono_casa.png">
						<?php } ?>
					</div>
					<div class="direccion">
						<span><?php echo($perfilmed_direccion); ?></span>
					</div>
					<a href="mailto: <?php echo($perfilmed_correo); ?>">
						<span><?php echo($perfilmed_correo); ?></span>
					</a>
					
					<div class="btn_agenda aqui">
						<span>agenda aquí</span>
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<span>iframe sistema medico</span>
		</div>
	</div>
</div>