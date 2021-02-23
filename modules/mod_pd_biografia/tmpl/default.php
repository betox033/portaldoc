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
		font-size: 15px;
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
		/*background-color: #e8e8e8;*/
		background-color: <?php echo($biomed_color_fondo_box); ?>;
		color: <?php echo($biomed_color_texto_box); ?>;
		font-size: 15px;
		margin-top: 25px;
	}
	.titulo_area{
		font-size: 18px;
		border-bottom: 1px solid lightgrey;
		margin-bottom: 15px;
		margin-top: 20px;
		color: #0481c6;
		font-weight: bold;
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


<?php 

//index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico[0]); ?>
 ?>

<div class="container cuadro_biografia">
	<div class="titulo_contenido">
		<span><?php echo($medico[2] . " " . $medico[3]); ?></span>
		<a href="javascript:history.back()" class="link_pm">
			<span><< <?php echo($biomed_texto_back); ?></span>
		</a>
	</div>
	<hr>

	<div class="row" style="margin-bottom: 30px">
		<?php
		if($biomed_pos_col == "eskerra"){
			include("columna_foto.php");
			include("otra_columna.php");
		} else{
			include("otra_columna.php");
			include("columna_foto.php");
		}
		 ?>
	</div>


</div>