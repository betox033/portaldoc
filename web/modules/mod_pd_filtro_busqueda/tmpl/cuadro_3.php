



<style type="text/css">
	.cuadro_3{
		background-color: white;
		padding: 10px;
	}
	.cuadro_isapre{
		width: 100%;
		height: 100%;
		border-right: 1px solid lightgrey;
	}
	.cuadro_isapre input{
		font-size: 13px;
		border: none;
		box-shadow: none;
	}
	.cuadro_isapre input::placeholder{
		opacity: .7;
		font-weight: 300;
	}
	.cuadro_isapre img{
		width: 35px;
		opacity: .7;
	}
	.resultado_prevision{
		width: 150%;
		height: 250px;
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
	.resultado_prevision.mostrar{
		max-height: none;
		opacity: 1;
	}
	.linea_prevision{
		padding: 10px;
		font-size: 15px;
		transition: .3s;
		color: #2a3c50;
		cursor: pointer;
	}
	.linea_prevision:hover{
		background-color: #efefef;

	}
	.linea_prevision img{
		width: 20px;
		margin-right: 7px;
	}
	.resultado_prevision .encabezado{
		background-color: #dae4ec;
		padding: 10px;
		font-size: 14px;
		color: #004f6f;
	}

	@media(max-width: 990px){
		.cuadro_isapre{
			display: inherit;
		}

	}
</style>





<div class="cuadro_3 cuadro_opcion_gen click_campo_3">
	<div class="cuadro_isapre centro-abs click_campo_3">
		<img src="<?php echo($pd_filtro_icono_pr); ?>">
		<input type="text" name="prevision" placeholder="Previsión" class="click_campo_3">
	</div>
	<div class="resultado_prevision">
		<div class="encabezado">
			<span>Ingrese el nombre del sistema previsional.</span>
		</div>
		<div class="cuerpo"><?php include("linea_prevision.php"); ?></div>
	</div>
</div>



<script type="text/javascript">
	jQuery(document).ready(function(){
		setBtnSeleccionPrevision();
	});

	jQuery(".cuadro_isapre input").keyup(function(){
		var valor_busqueda = jQuery(this).val();
		
		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_filtro_busqueda&method=buscar_prevision&format=debug',
			data: 'valor_busqueda=' + valor_busqueda,
			success: function(response){
				jQuery(".resultado_prevision .cuerpo").html(response);
				setBtnSeleccionPrevision();
			}
		});
	});

	function setBtnSeleccionPrevision(){
		jQuery(".linea_prevision").unbind('click').click(function(){
			var valor_seleccion = jQuery(this).find("span").html();
			jQuery(".cuadro_isapre input").val(valor_seleccion);

			jQuery(".cuadro_servicio input").focus();
			setTimeout(function() {
				jQuery(".cuadro_4 .resultado_servicio").addClass("mostrar");
			},100);

		});
	}
</script>



