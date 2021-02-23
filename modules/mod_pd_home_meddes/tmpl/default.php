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
		margin-right: 2px;
	}
	.cuadro_medico .cuadro_foto{
		position: relative;
	}
	@media(min-width: 990px){
		.cuadro_medico .cuadro_foto{
			max-height: 275px;
			overflow: hidden;
		}
	}
	@media(max-width: 990px){
		.cuadro_medico .cuadro_foto{
			overflow: hidden;
			max-height: 200px;
		}
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
		line-height: 110%;
		margin-top: 15px;
		min-height: 57px;
	}
	@media(max-width: 990px){
		.cuadro_datos{
			min-height: 75px;
		}
	}
	.cuadro_datos .nombre{
		color: #074c94;
		font-weight: 700;
		text-transform: uppercase;
	}
	.cuadro_datos .alma_mater{
		color: #5599db;
	}
	.cuadro_datos .cuadro_esp{
		color: #0081c6;
		font-size: 13px;
		font-weight: 500;
	}
	.cuadro_datos .cuadro_esp .esp{
		font-size: 15px;
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
	.izquierda .btn_ver_perfil{
		float: left;
	}
	.derecha .btn_ver_perfil{
		float: right;
	}
	.btn_ver_perfil{
		/*background-color: #94bb1e;*/
		background-color: <?php echo($home_meddes_clrbtn_perfilmed); ?>;
		font-size: 12px;
		color: white;
		border-radius: 4px;
		padding: 3px;
		padding-left: 15px;
		padding-right: 15px;
		cursor: pointer;
		transition: .3s;
	}
	.btn_ver_perfil:hover{
		/*background-color: #81a21a;*/
		background-color: <?php echo($home_meddes_clrhvr_perfilmed); ?>;
	}
	.btn_ver_perfil p{
		margin: 0px;
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
	.btn_valoracion{
		/*background-color: #0081c6;*/
		background-color: <?php echo($home_meddes_clrbtn_valoraciones); ?>;
	}
	.btn_valoracion:hover{
		/*background-color: #02679c;*/
		background-color: <?php echo($home_meddes_clrhvr_valoraciones); ?>;
	}
	.cuadro_home_medicos_destacados{
		position: relative;
	}
	.cuadro_busqueda_mes_des{
		position: absolute;
		top: 30px;
		left: 10vw;
	}
	.cuadro_busqueda_mes_des img{
		float: left;
		width: 32px;
		margin-right: 10px;
	}
	.cuadro_busqueda_mes_des input{
		border-left: 1px solid #0081c6;
		border-top: 1px solid #0081c6;
		border-bottom: 1px solid #0081c6;
		border-right: 0px solid transparent;
		transition: .3s;
		background-color: transparent;
	}
	.cuadro_busqueda_mes_des input:hover,
	.cuadro_busqueda_mes_des input:focus{
		background-color: rgba(0,129,198,.1);
	}
	.res_mesdes{
		position: absolute;
		top: 35px;
		left: 0px;
		width: 100%;
		z-index: 5;
		background-color: white;
		max-height: 0px;
		opacity: 0;
		transition: .3s;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.3);
		overflow: hidden;
	}
	.res_mesdes.mostrar{
		max-height: none;
		opacity: 1;
	}
	.btn_buscar_resmed{
		float: right;
		width: 32px;
		height: 32px;
		border-right: 1px solid #0081c6;
		border-top: 1px solid #0081c6;
		border-bottom: 1px solid #0081c6;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
		color: #004c94;
		font-size: 17px;
		cursor: pointer;
		transition: .3s;
	}
	.btn_buscar_resmed:hover{
		background-color: #0081c6;
		color: white;
	}
	.cuadro_cargando_meddes{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,.5);
		z-index: 5;
		color: white;
		font-weight: bold;
		font-size: 28px;
		opacity: 0;
		max-height: 0px;
		overflow: hidden;
	}
	.cuadro_cargando_meddes.mostrar{
		opacity: 1;
		max-height: none;
	}
	.cuadro_ubi_meddes{
		overflow: hidden;
		margin-top: 5px;
		margin-bottom: 5px;
		font-weight: 500;
		min-height: 30px;
		line-height: 120%;
		font-size: 12px;
	}
	.cuadro_ubi_meddes i{
		float: left;
	}
	.cuadro_ubi_meddes .texto{
		padding-left: 15px;
	}
	@media(min-width: 990px){
		.btn_agenda_mobile{
			display: none;
		}
		.btn_agendar_77{
			width: 48%;
			text-align: center;
		}		
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
		.cuadro_busqueda_mes_des{
			position: relative;
			left: 0px;
			min-height: 50px;
		}
		.cuadro_busqueda_mes_des input{
			width: 75%;
			float: left;
		}
		.btn_buscar_resmed{
			float: left;
		}
		.btn_agendar_77{
			padding-top: 8px;
			padding-bottom: 8px;
			font-size: 15px;
		}
		.btn_agenda_desktop{
			display:none;
		}
		.cuadro_ubi_meddes{
			font-size: 12px;
			margin-top: 0px;
			margin-bottom: 0px;
			line-height: 110%;
			min-height: 40px;
		}
	}
</style>





<div id="sql_auxiliar"></div>



<div class="container cuadro_home_medicos_destacados">
	<div class="titulo_contenido" style="text-align: center">
		<span><?php echo($home_meddes_titulo); ?></span>
	</div>

	<div class="cuadro_busqueda_mes_des">
		<img src="<?php echo($home_meddes_icono_img); ?>" id="img_meddes_icon">
		<input type="text" name="" placeholder="<?php echo($home_meddes_placeholder); ?>" id="input_buscarmedes">
		<div class="btn_buscar_resmed centro-abs">
			<i class="fa fa-search"></i>
		</div>
		<div class="res_mesdes">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<div class="cuadro_carrusel">
				<?php include("lista_medicos.php"); ?>
			</div>
			<div class="cuadro_cargando_meddes centro-abs">
				<span>Cargando...</span>
			</div>	
		</div>
	</div>
</div>





<div style="height: 20px"></div>



<script type="text/javascript">

	jQuery(".btn_buscar_resmed").unbind('click').click(function(){
		var buscar_por = jQuery("#input_buscarmedes").val();
		if(!buscar_por){
			alert("Debe ingresar un valor para buscar");
		}else{
			var btn_agendar_77 = jQuery(".btn_agendar_77 span").html();
			var btn_valoracion = jQuery(".btn_valoracion span").html();
			jQuery.ajax({
				type: 'POST',
				url: 'index.php?option=com_ajax&module=pd_home_meddes&method=buscar_meddes&format=debug',
				data: 'buscar_por=' + buscar_por + "&btn_agendar_77=" + btn_agendar_77 + 
				"&btn_valoracion=" + btn_valoracion,
				beforeSend: function(){
					jQuery(".cuadro_cargando_meddes").addClass("mostrar");
					jQuery(".res_mesdes").removeClass("mostrar");
				},
				success: function(response){
					jQuery(".cuadro_carrusel").html(response);
					setCarruselMedicos();
					jQuery(".cuadro_cargando_meddes").removeClass("mostrar");
				} 
			});
		}
	});

	jQuery("#input_buscarmedes").keyup(function(){
		var valor_busqueda = jQuery(this).val();
		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_home_meddes&method=buscar_especialidades&format=debug',
			data: 'valor_busqueda=' + valor_busqueda,
			success: function(response){
				//alert(response);
				jQuery(".res_mesdes").html(response);
				clickLineMedDes();
			}
		});
	});



	function clickLineMedDes(){
		jQuery(".linea_esp").unbind('click').click(function(){
			var texto = jQuery(this).find("span").html();
			jQuery("#input_buscarmedes").val(texto);
			jQuery(".res_mesdes").removeClass("mostrar");
			setTimeout(function() {
				jQuery(".btn_buscar_resmed").click();
			},100);
		});
	}

	jQuery("#input_buscarmedes").unbind('click').click(function(){
		var cuadro_res_med = jQuery(".res_mesdes");
		if(cuadro_res_med.hasClass("mostrar")){
			cuadro_res_med.removeClass("mostrar");
		}else{
			cuadro_res_med.addClass("mostrar");
		}
	});

	jQuery(document).ready(function(){
		setCarruselMedicos();
	});

	function setCarruselMedicos(){
		jQuery('#carrusel_medicos').owlCarousel({
			loop:(jQuery('#carrusel_medicos .cuadro_medico').length > 4 ),
			margin:10,
			responsiveClass:true,
			autoplay: true,
			responsive:{
				0:{
					items:2,
				},
				600:{
					items:3,
				},
				1000:{
					items:4,
				}
			}
		});		
	}





</script>