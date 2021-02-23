<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.cuadro_pasos{
		width: 63vw;
		height: 50px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.3);
		position: fixed;
		top: 100px;
		right: 8vw;
		z-index: 50;
		max-width: 0px;
		overflow: hidden;
		transition: .3s;
		opacity: 0;
		border-top-left-radius: 12px;
		border-bottom-left-radius: 12px;
		border-top-right-radius: 12px;
		border-bottom-right-radius: 12px;
	}
	.cuadro_pasos.mostrar{
		max-width: none;
		overflow: inherit;
		opacity: 1;
	}
	.cuadro_pasos.miniatura{
		top: 85px;
	}
	.cuadro_opcion_gen{
		float: left;
		/*border: 1px solid black;*/
		height: 50px !important;
		position: relative;
		padding-left: 10px;
	}
	.cuadro_1{
		width: 23.5%;
	}
	.cuadro_2{
		width: 23.5%;
	}
	.cuadro_3{
		width: 23.5%;
	}
	.cuadro_4{
		width: 23.5%;
	}
	.btn_buscar_filtro{
		width: 6%;
		height: 100%;
		transition: .3s;
		cursor: pointer;
		background-color: #0081c6;
		font-size: 22px;
		color: white;
		height: 50px;
    	border: none;
    	border-top-right-radius: 12px;
    	border-bottom-right-radius: 12px;
	}
	.btn_buscar_filtro:hover{
		background-color: #026194;
	}

	.centro-abs {
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.overlay_filtro{
		position: fixed;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,.7);
		z-index: 49;
		max-height: 0px;
		opacity: 0;
		overflow: hidden;
		transition: .3s;
	}
	.overlay_filtro.mostrar{
		opacity: 1;
		max-height: none;
	}

	@media(max-width: 990px){
		.cuadro_pasos{
			width: 95vw;
			right: 2.5vw;
			border-bottom-left-radius: 0px;
		}
		.cuadro_opcion_gen{
			width: 100%;
		}
		.btn_buscar_filtro{
			width: 100%;
			border-bottom-left-radius: 12px;
		}


	}
</style>




<div class="cuadro_pasos">
	<form id="form_filtro_busqueda" action="index.php?option=com_content&view=article&id=5&Itemid=151" 
	method="POST" autocomplete="off">
		<?php include("cuadro_1.php"); ?>
		<?php include("cuadro_2.php"); ?>
		<?php include("cuadro_3.php"); ?>
		<?php include("cuadro_4.php"); ?>
		<button type="submit" class="btn_buscar_filtro centro-abs">
			<i class="icon-search"></i>
		</button>
	</form>		
</div>
<div class="overlay_filtro"></div> 



<script type="text/javascript">

	jQuery(document).click(function(e){
		var cuadro_resultados_1 = jQuery(".cuadro_resultados_1");
		if(jQuery(e.target).hasClass("click_campo_1")){
			cuadro_resultados_1.addClass("mostrar");
		}else{
			cuadro_resultados_1.removeClass("mostrar");
		}
	});

	jQuery(document).click(function(e){
		var cuadro_resultados_2 = jQuery(".resultado_ubicacion");
		if(jQuery(e.target).hasClass("click_campo_2")){
			cuadro_resultados_2.addClass("mostrar");
		}else{
			cuadro_resultados_2.removeClass("mostrar");
		}
	});

	jQuery(document).click(function(e){
		var resultado_ubicacion = jQuery(".resultado_prevision");
		if(jQuery(e.target).hasClass("click_campo_3")){
			resultado_ubicacion.addClass("mostrar");
		}else{
			resultado_ubicacion.removeClass("mostrar");
		}
	});

	jQuery(document).click(function(e){
		var resultado_ubicacion = jQuery(".resultado_servicio");
		if(jQuery(e.target).hasClass("click_campo_4")){
			resultado_ubicacion.addClass("mostrar");
		}else{
			resultado_ubicacion.removeClass("mostrar");
		}
	});

	jQuery(document).ready(function(){
		jQuery(".boton_registro").unbind('click').click(function(){
			var cuadro_pasos = jQuery(".cuadro_pasos");
			if(cuadro_pasos.hasClass("mostrar")){
				cuadro_pasos.removeClass("mostrar");
			}else{
				cuadro_pasos.addClass("mostrar");
			}
		});	

		jQuery(".boton_filtro_float").unbind('click').click(function(){
			var cuadro_pasos = jQuery(".cuadro_pasos");
			cuadro_pasos.addClass("mostrar");
			jQuery(".overlay_filtro").addClass("mostrar");
		});
		jQuery(".overlay_filtro").unbind('click').click(function(){
			var cuadro_pasos = jQuery(".cuadro_pasos");
			cuadro_pasos.removeClass("mostrar");
			jQuery(".overlay_filtro").removeClass("mostrar");
		});
	});

	jQuery(window).scroll(function() {
		var item_menu_buscar = jQuery(".cuadro_pasos");
		if (jQuery(document).scrollTop() > 150) {
			item_menu_buscar.addClass("miniatura");
		}else {
			item_menu_buscar.removeClass("miniatura");
		}
	});
</script>











