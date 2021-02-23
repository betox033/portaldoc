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
		font-weight: 500;
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
		font-size: 16px;
		color: white;
		border-radius: 4px;
		padding: 5px;
		padding-left: 20px;
		padding-right: 20px;
		cursor: pointer;
		transition: .3s;
		display: inline-block;
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
								<div class="col-sm-12 col-md-6 col-lg-5">
									<?php if($medico->foto){ ?>
										<img src="<?php echo($medico->foto); ?>" class="foto">
									<?php }else{ ?>
										<img src="images/sistema/foto_usuario.png" class="foto">
									<?php } ?>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-7">
									<div class="cuadro_datos">
										<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
										<span class="esp"><?php echo($medico->especialidad); ?></span>
									</div>
									<div class="cuadro_opciones">
										<a href="mailto: <?php echo($medico->email); ?>">
											<img src="images/sistema/icono_correo.png">
											<span><?php echo($medico->email); ?></span>
										</a>
										<div></div>
									</div>
									<div>
										<div class="contenido_sm_<?php echo($medico->id); ?>"></div>
									</div>
									<div class="cuadro_botones_busqueda">
										<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
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

