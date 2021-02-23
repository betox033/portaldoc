<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	#main{
		display: none;
	}
	.titulo_biografia{
		border-bottom: 1px solid #004c94;
		padding-top: 10px;
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 5px;
		color: #004c94;
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 15px;
		overflow: hidden;
	}
	.btn_agenda_aqui{
		background-color: #94bb1e;
		color: white;
		padding: 7px;
		padding-left: 30px;
		padding-right: 30px;
		transition: .3s;
		cursor: pointer;
		text-align: center;
		text-transform: uppercase;
		font-size: 18px;
		display: inline-block;
		border: none;
		width: 100%;
		opacity: 0;
	}
	.btn_agenda_aqui:hover{
		background-color: #84a71c;
	}
	.datos_direccion{
		padding: 15px;
		background-color: #e8e8e8;
		font-size: 15px;
		margin-top: 25px;
	}
	.titulo_area{
		font-size: 18px;
		border-bottom: 1px solid lightgrey;
		margin-bottom: 15px;
		margin-top: 20px;
	}
	.contenido_area{
		font-size: 15px;
		text-align: justify;
		color: grey;
	}
	.foto_perfil{
		width: 50%;
		height: auto;
		margin-left: 25%;
		/*box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);*/
		border: 1px solid lightgrey;
	}
	.cuadro_agendar{
		background-color: #efffbd;
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
	}

	.link_pm{
		color: #94bb1e;
		font-size: 15px;
		font-weight: 500;
		float: right;
		margin-top: 7px;
	}

	@media(max-width: 990px){
		.cuadro_biografia{
			padding: 24px;
		}

	}
</style>



<div class="container cuadro_biografia">
	<div class="titulo_contenido">
		<span><?php echo($medico[2] . " " . $medico[3]); ?></span>
		<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico[0]); ?>" 
			class="link_pm">
			<span><< Volver al Perfil</span>
		</a>
	</div>
	<hr>

	<div class="row" style="margin-bottom: 30px">
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div class="contenido_biografia">
				<div class="titulo_area"><span>Expertiz en: </span></div>
				<div class="contenido_area"><span><?php echo($medico[10]); ?></span></div>

				<div class="titulo_area"><span>Docencias: </span></div>
				<div class="contenido_area"><span><?php echo($medico[11]); ?></span></div>

				<div class="titulo_area"><span>Publicaciones</span></div>
				<div class="contenido_area"><span><?php echo($medico[12]); ?></span></div>

				<div class="titulo_area"><span>Actualidad.</span></div>
				<div class="contenido_area"><span><?php echo($medico[13]); ?></span></div>

				<div class="titulo_area"><span>Formación: </span></div>
				<div class="contenido_area"><span><?php echo($medico[14]); ?></span></div>
			</div>
			<hr>
			<div>
				<span style="font-size: 17px">Sistema de Previsión</span>
				<ul style="padding-left: 15px">
					<?php foreach($previsiones_medico as $prevision){ ?>
						<li><span style="font-size: 16px;">&nbsp;&nbsp;<?php echo($prevision->nombre); ?></span></li>
					<?php } ?>
					
				</ul>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<?php if($medico[1]){ ?>
				<img src="<?php echo($medico[1]); ?>" class="foto_perfil">
			<?php }else{ ?>
				<img src="images/sistema/foto_usuario.png" class="foto_perfil">
			<?php } ?>

			<div class="datos_direccion">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<strong>RUT: </strong><span><?php echo($medico[7]); ?></span><br>
						<strong>Teléfono: </strong><span><?php echo($medico[8]); ?></span><br>
						<strong>Correo: </strong><?php echo($medico[9]); ?>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12">
						<strong>Región: </strong><span><?php echo($medico[4]); ?></span><br>
						<strong>Comuna: </strong><span><?php echo($medico[5]); ?></span><br>
						<strong>Dirección: </strong><span><?php echo($medico[6]); ?></span>							
					</div>
				</div>
			</div>

			<div class="titulo_area"><span>Cursos: </span></div>
			<div class="contenido_area"><span><?php echo($medico[15]); ?></span></div>

			<div class="titulo_area"><span>Experiencia:</span></div>
			<div class="contenido_area"><span><?php echo($medico[16]); ?></span></div>

		</div>
	</div>


</div>