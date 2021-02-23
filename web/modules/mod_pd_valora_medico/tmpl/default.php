<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	#main-box{
		display: none;
	}
	.titulo_valoracion{
		border-bottom: 1px solid grey;
		padding-bottom: 7px;
		margin-bottom: 15px;
		overflow: hidden;
		font-size: 24px;
	}

	.datos_personales{
		border: 1px solid lightgrey;
		padding: 10px;
		font-size: 15px;
		color: #2a3c50;
	}

	.item_valor{
		border: 1px solid lightgrey;
		background-color: #f3f3f3;
		padding: 10px;
		font-size: 13px;
		margin-bottom: 10px;
	}
	.item_valor .texto{
		border: 1px solid lightgrey;
		padding: 7px;
		font-style: oblique;
		text-align: justify;
		color: black;
	}
	.estrella{
		color: #f3d33a;
		font-size: 15px;
	}
	.link_pm{
		color: #94bb1e;
		font-size: 15px;
		font-weight: 500;
		float: right;
		margin-top: 7px;
	}
	.btn_registrar_valoracion{
		margin-top: 15px;
		font-size: 15px;
		padding: 4px;
	}
	.cuadro_valoraciones i{
		font-size: 20px;
		color: #f1bd00;
	}
	.listado_opiniones{
		max-height: 500px;
		overflow-y: scroll;
		overflow-x: hidden;
		padding-right: 15px;
	}
	
	.mensaje_limite_opinion{
		width: 100%;
		border: 1px solid lightgrey;
		margin-top: 15px;
		padding: 10px;
		background-color: #90a6bf;
		color: #2a3c50;
	}
	.foto_val{
		width: 100%;
	}


	@media(max-width: 990px){
		.titulo_valoracion{
			margin-left: 15px;
			margin-right: 15px;
		}
		.datos_personales{
			margin: 15px;
		}
		.listado_opiniones{
			margin: 15px;
			padding-right: 0px;
		}
		.titulo_lst_opn{
			margin-left: 15px;
			margin-top: 45px;
		}
		.foto_val{
			width: 70%;
			margin-left: 15%;
			margin-bottom: 20px;
			border: 1px solid lightgrey;
		}

	}
</style>



<div class="container">
	<div class="titulo_contenido">
		<span>Valorar Médico</span>
		<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico[0]); ?>" 
			class="link_pm">
			<span><< Volver al Perfil</span>
		</a>
	</div>
	<hr>

	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div class="datos_personales">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-5">
						<?php if($medico[1]){ ?>
							<img src="<?php echo($medico[1]); ?>" class="foto_val">
						<?php }else{ ?>
							<img src="images/sistema/foto_usuario.png" class="foto_val">
						<?php } ?>

						<?php if($usuario_general->tipo == "3" && $ultima_validacion->diferencia > 6){ ?>
							<div class="btn_pd_verde btn_registrar_valoracion" data-toggle="modal" 
							data-target="#reg_opinion">
								<span>Registrar Valoración</span>
							</div>
						<?php } ?>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-7">
						<strong><?php echo($medico[2] . " " . $medico[3]); ?></strong><br>
						<span><?php echo($medico[4] . " - " . $medico[5]); ?></span><br>
						<strong>Dirección: </strong><span><?php echo($medico[6]); ?></span>
						<hr>
						<strong>RUT: </strong><span><?php echo($medico[7]); ?></span><br>
						<strong>Teléfono: </strong><span><?php echo($medico[8]); ?></span><br>
						<strong>Email: </strong><span><?php echo($medico[9]); ?></span><br>
						<hr>
						<strong>Especialidad: </strong><span><?php echo($medico[18]); ?></span>
						<p>
							<?php echo($medico[10]); ?>
						</p>
						<h3>Promedio: <?php echo(round($medico[19] + 0, 2)); ?></h3>
						<div class="cuadro_valoraciones">
							<div>
								<?php for($k=0; $k<round($medico[19]); $k++){ ?>
									<i class="fa fa-star"></i>
								<?php } ?>
								<?php if($medico[19] > round($medico[19])){ ?>
									<i class="fa fa-star-half"></i>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php if($usuario_general->tipo == "3" && $ultima_validacion->diferencia < 7){ ?>
					<div class="mensaje_limite_opinion">
						<span>Su última valoración fue registrada el <?php echo($ultima_validacion->fecha_formato_dia); ?>. Debe esperar al menos una semana desde que realice una valoración para volver a registrar otra.</span>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<h4 class="titulo_lst_opn">Listado de Opiniones.</h4>
			<div class="listado_opiniones">
				<?php if(count($valoraciones)){ ?>
					<?php foreach($valoraciones as $key=>$opinion){ ?>
						<div class="item_valor">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-4">
									<strong><?php echo($opinion->nombre . " " . $opinion->apellido); ?></strong><br>
									<span style="font-style: oblique;">(<?php echo($opinion->username); ?>)</span>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-8">
									<div class="texto">
										<i class="icon-calendar" title="<?php echo($opinion->fecha); ?>"></i>
										<span><?php echo($opinion->fecha); ?></span>
										<?php for($k=0; $k < $opinion->valoracion; $k++){ ?>
											<i class="icon-star estrella"></i>
										<?php } ?>
										<div style="height: 5px;"></div>
										<span><?php echo($opinion->opinion); ?></span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php }else{ ?>
					<div class="item_valor">
						<span>No hay opiniones registradas de este médico.</span>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>



<?php include("popup_registrar_valoracion.php"); ?>


