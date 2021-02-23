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
		font-size: 18px;
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

	.perfilmed_correo{
		color: #4f4f4f;
		font-size: 16px;
		font-weight: 500;
	}
	.perfilmed_correo i{
		color: #0081c6;
		font-size: 28px;
		margin-right: 20px;
		margin-top: 10px;
		margin-left: 17px
	}
	.titulo_perfil_medico{
		border-bottom: 1px solid #004c94;
		padding-top: 10px;
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 5px;
		color: #004c94;
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 15px;
	}
	.btn_agenda_aqui{
		background-color: #94bb1e;
		color: white;
		padding: 7px;
		padding-left: 25px;
		padding-right: 25px;
		transition: .3s;
		cursor: pointer;
		text-align: center;
		text-transform: uppercase;
		font-size: 15px;
		display: inline-block;
		border: 1px solid white;
	}
	.btn_agenda_aqui:hover{
		background-color: #84a71c;
	}
	.iframe_plataforma{
		width: 120%;
		height: 350px;
		border: none;
		margin-left: -28px;
		margin-top: -7px;
		transition: .3s;
	}

	.cuadro_agendar{
		background-color: #94bb1e;
		border: 1px solid #94bb1e;
		padding: 10px;
		margin-top: 20px;
		position: relative;
	}
	.overlay_cargando{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,.5);
		color: white;
		z-index: 5;
	}
	.select_servicio{
		width: 100%;
		font-size: 15px;
	}

	.link_pb{
		color: #2a3c50;
		font-weight: 500;
		font-size: 17px;
	}
	.cuadro_biografia{
		border: 1px solid lightgrey;
		background-color: #e6e5e5;
		padding: 10px;
		margin-top: 7px;
	}
	.cuadro_opciones{
		margin-top: 20px;
		font-size: 15px;
	}
	.cuadro_iframe{
		transition: .3s;
	}

	@media(max-width: 500px){
		.cuadro_perfilmed{
			padding: 24px;
		}
		.cuadro_agendar,.select_servicio{
			margin-bottom: 15px;
		}
		.btn_agenda_aqui{
			width: 100%;
		}
		.iframe_plataforma{
			margin-left: 0px;
			width: 100%;
		}


	}
</style>


<?php  $usuario_general   = JFactory::getUser(); ?>


<div class="container cuadro_perfilmed">
	<div class="titulo_contenido">
		<span>Perfil Médico</span>
	</div>
	<hr>

	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-5">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-5">
					<?php if($medico[1]){ ?>
						<img src="<?php echo($medico[1]); ?>" style="width: 100%;">
					<?php }else{ ?>
						<img src="images/sistema/foto_usuario.png">
					<?php } ?>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-7">
					<div class="datos_principal">
						<span class="perfilmed_nombre"><?php echo($medico[2] . " " . $medico[3]); ?></span>
						<div style="height: 7px;"></div>
						<span class="perfilmed_alma_mater"><?php echo(""); ?></span>
						<div style="height: 7px"></div>
						<span class="perfilmed_esp"><?php echo($medico[4] . " - " . $medico[5]); ?></span>						
					</div>
					<div class="cuadro_iconos">
					</div>
					<div class="direccion">
						<?php 
						$direccion = $medico[6];
						$direccion = str_replace('/br/', '<br>', $direccion);
						?>
						<span>Dirección: <?php echo($direccion); ?></span>
					</div>

					<a href="mailto: <?php echo($medico[7]); ?>" class="perfilmed_correo">
						<img src="images/sistema/icono_correo.png">
						<span><?php echo($medico[9]); ?></span>
					</a>
					<br>
					<a href="tel: <?php echo($medico[8]); ?>" class="perfilmed_correo">
						<span>Teléfono: <?php echo($medico[8]); ?></span>
					</a>
					<br>
					<a href="<?php echo($medico[18]); ?>" target="_blank" style="font-size: 16px;font-weight: 500">
						<span>Sitio Web: <?php echo($medico[18]); ?></span>
					</a>

				</div>
			</div>

								<div class="cuadro_opciones">
						<ul>
							<li>
								<a href="index.php?option=com_content&view=article&id=4&id_medico=<?php echo($medico[0]); ?>" class="link_pb">
									<span>Ver perfil biográfico</span>
								</a>
							</li>

							<li>
								<a href="index.php?option=com_content&view=article&id=18&id_medico=<?php echo($medico[0]); ?>" 
									class="link_pb">
									<span>Valoraciones del médico.</span>
								</a>
							</li>
						</ul>
						
					</div>

			<?php if($medico[17]){ ?>
				<div class="cuadro_agendar">
					<div class="overlay_cargando centro-abs">
						<img src="images/sistema/loading.gif" style="margin-right: 7px;width: 20px">
						<span>Cargando...</span>
					</div>
					<div>
						<input type="hidden" name="id_medico" value="<?php echo($medico[0]); ?>">
						<input type="hidden" name="cod_med_sm" id="hidden_cod_sm" value="">
						<input type="hidden" name="estilos_css" id="hidden_css" value="<?php echo($estilos); ?>">

						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-7">
								<div class="contenido_sm"></div>
								<?php include("script_portal.php"); ?>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="btn_agenda_aqui">
									<span>agenda aquí</span>
								</div>
							</div>
						</div>					
					</div>
				</div>
			<?php } ?>

		</div>
		<div class="col-sm-12 col-md-6 col-lg-7">
			<div class="cuadro_iframe">
				<img src="<?php echo($perfilmed_img_sust); ?>" style="width: 100%;opacity: .7">
			</div>
		</div>
	</div>
</div>




<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".btn_agenda_aqui").unbind('click').click(function(){
			var cadena_se = jQuery(".select_servicio").val();
			if(cadena_se == ""){
				alert("Debe seleccionar un item del listado");
			}else{
				var cod_sm_rol = '<?php echo($medico[17]); ?>';
				var id_medico = '<?php  echo($medico[0]); ?>';
				var arreglo = cadena_se.split(";");
				var cod_servicio = arreglo[0];
				var cod_esp = arreglo[1];
				var hidden_cod_sm = jQuery("#hidden_cod_sm").val();
				var estilos = jQuery("#hidden_css").val();

				var texto = "<iframe class='iframe_plataforma' src='https://app.portaldoc.com/Rol/<?php echo($medico[17]); ?>/" + cod_servicio + "/" + cod_esp + "/" + hidden_cod_sm + estilos +"'></iframe>";
				jQuery(".cuadro_iframe").html(texto);

				jQuery(".iframe_plataforma").css("height", "800px");
				jQuery(".cuadro_iframe").css("height", "800px");

				jQuery.ajax({
					type: 'POST',
					url: 'index.php?option=com_ajax&module=pd_perfil_medico&method=reg_intencion_agendar&format=debug',
					data: 'cod_sm_servicio=' + cod_servicio + "&cod_sm_esp=" + cod_esp + "&id_medico=" + id_medico +
						'&cod_sm_rol=' + cod_sm_rol,
					success: function(response){
						//alert(response);
					}
				});
			}

		});
	});

</script>