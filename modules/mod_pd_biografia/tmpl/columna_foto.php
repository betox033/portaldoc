<style type="text/css">





	.btn_agenda_aqui{

		margin-top: 10px;

		width: 50%;

		margin-left: 25%;

	}





	@media(max-width: 990px){

		.datos_direccion{

			border: 1px solid #0481c6;

		}



	}



	.tabla_datos_generales{

		width: 100%;

	}

	.tabla_datos_generales i{

		font-size: 18px;

	}

	.lista_prevision{
color: grey;

	}

</style>







<div class="col-sm-12 col-md-6 col-lg-5">

	<?php if($medico[1]){ ?>

		<img src="<?php echo($medico[1]); ?>" class="foto_perfil">

	<?php }else{ ?>

		<?php if($medico[19] == "F"){ ?>

			<img src="images/sistema/foto_usuario_mujer.png" class="foto_perfil">

		<?php }else{ ?>

			<img src="images/sistema/foto_usuario.png" class="foto_perfil">

		<?php } ?>

	<?php } ?>



	<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico[0]); ?>">

		<div class="btn_agenda_aqui" style="opacity: 1">

			<span>Agenda aquí</span>

		</div>	

	</a>



	<div class="datos_direccion">

		<table class="tabla_datos_generales">

			<tbody>

				<tr>

					<td style="width: 35px"><i class="fa fa-user"></i></td>

					<td><span><?php echo($medico[7]); ?></span></td>

				</tr>

				<tr>

					<td><i class="fa fa-mobile"></i></td>

					<td>

						<a href="tel: <?php echo($medico[8]); ?>">

							<span><?php echo($medico[8]); ?></span>

						</a>

					</td>

				</tr>

				<tr>

					<td><i class="fa fa-envelope"></i></td>

					<td>

						<a href="mailto: <?php echo($medico[9]); ?>">

							<span><?php echo($medico[9]); ?></span>

						</a>

					</td>

				</tr>

				<tr>

					<td><i class="fa fa-map-marker"></i></td>

					<td>

						<strong><?php echo($biomed_titulo_direccion_1); ?></strong><br>

						<span><?php echo($medico[6]); ?></span>

					</td>

				</tr>

				<tr>

					<td><i class="fa fa-map-marker"></i></td>

					<td>

						<strong><?php echo($biomed_titulo_direccion); ?></strong><br>

						<span><?php echo($medico[18]); ?></span>

					</td>

				</tr>

			</tbody>

		</table>

	</div>



	<div class="titulo_area"><span>Área de Expertiz</span></div>

	<div class="contenido_area"><span><?php echo($medico[10]); ?></span></div>



	<div>

		<div class="titulo_area"><span>Fonasa / Isapre / Particular</span></div>

		<ul style="padding-left: 15px" class="lista_prevision">

			<?php foreach($previsiones_medico as $prevision){ ?>

				<li><span style="font-size: 16px;">&nbsp;&nbsp;<?php echo($prevision->nombre); ?></span></li>

			<?php } ?>

		</ul>

	</div>



</div>



