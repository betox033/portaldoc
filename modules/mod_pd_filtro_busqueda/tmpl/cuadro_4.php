



<style type="text/css">
	.cuadro_4{
		background-color: white;
		padding: 10px;
	}
	.cuadro_servicio{
		width: 100%;
		height: 100%;
	}
	.cuadro_servicio input{
		font-size: 13px;
		border: none;
		box-shadow: none;
		transition: .3s;
		width: 77vw;
	}
	.cuadro_servicio input:hover,
	.cuadro_servicio input:focus{
		outline: 1.5px solid #0081c6;
	}
	.cuadro_servicio input::placeholder{
		opacity: .7;
		font-weight: 300;
	}
	.cuadro_servicio img{
		width: 35px;
		opacity: .7;
	}
	.resultado_servicio{
		width: 150%;
		position: absolute;
		background-color: white;
		z-index: 10;
		top: 50px;
		left: 0px;
		max-height: 0px;
		transition: .3s;
		overflow-y: scroll;
		transition: .3s;
		opacity: 0;
	}
	.resultado_servicio.mostrar{
		max-height: none;
		opacity: 1;
	}
	.linea_servicio{
		padding: 10px;
		font-size: 15px;
		transition: .3s;
		color: #2a3c50;
		cursor: pointer;
		border-bottom: 1px solid lightgrey;
	}
	.linea_servicio:hover{
		background-color: #efefef;

	}
	.linea_servicio img{
		width: 20px;
		margin-right: 7px;
	}
	.resultado_servicio .encabezado{
		background-color: #dae4ec;
		padding: 10px;
		font-size: 14px;
		color: #004f6f;
	}

	@media(max-width: 990px){
		.cuadro_servicio{
			display: inherit;
			position: relative;
			padding-left: 45px;
		}
		.cuadro_servicio img{
			position: absolute;
			left: 0px;
		}
		.resultado_servicio{
			width: 300px;
		}
		.cuadro_servicio input{
			font-size: 15px;
		}
		.resultado_servicio .encabezado{
			background-color: rgba(0,129,198,.1);
		}
	}
</style>





<div class="cuadro_4 cuadro_opcion_gen click_campo_4">
	<div class="cuadro_servicio centro-abs click_campo_4">
		<img src="<?php echo($pd_filtro_icono_sv); ?>">
		<input type="text" name="servicio" placeholder="<?php echo($pd_filtro_texto_sv); ?>" 
		class="click_campo_4">
	</div>
	<div class="resultado_servicio">
		<div class="encabezado">
			<span><?php echo($pd_filtro_head_sv); ?></span>
		</div>
		<div class="cuerpo"><?php include("linea_servicio.php"); ?></div>
	</div>
</div>


<script type="text/javascript">
	jQuery(document).ready(function(){
		setBtnSeleccionServicio();
	});

	function setBtnSeleccionServicio(){
		jQuery(".linea_servicio").unbind('click').click(function(){
			var valor_seleccion = jQuery(this).find("span").html();
			jQuery(".cuadro_servicio input").val(valor_seleccion);

			setTimeout(function() {
				jQuery(".btn_buscar_filtro").click();
			},100);
		});
	}
</script>


