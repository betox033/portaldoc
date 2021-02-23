

<style type="text/css">
	.cuadro_1{
		background-color: #ffffff;
		padding-top: 10px;
		padding-bottom: 10px;
		border-top-left-radius: 12px;
		border-bottom-left-radius: 12px;
		border-left: 10px solid #94bb1e;
	}
	.cuadro_busqueda{
		width: 100%;
		height: 100%;
		border-right: 1px solid lightgrey;
	}
	.cuadro_busqueda input{
		width: 77vw;
		font-size: 13px;
		border: none;
		box-shadow: none;
		transition: .3s;
	}
	.cuadro_busqueda input:hover,
	.cuadro_busqueda input:focus{
		outline: 1px solid #0081c6;
	}
	.cuadro_busqueda input:focus{
		border: none;
	}
	.cuadro_busqueda input::placeholder{
		opacity: .7;
		font-weight: 300;
	}
	.cuadro_resultados_1{
		position: absolute;
		top: 50px;
		width: 500px;
		background-color: white;
		z-index: 5;
		max-height: 0px;
		overflow-y: scroll;
		transition: .3s;
		height: 250px;
	}
	.cuadro_resultados_1.mostrar{
		max-height: none;
	}
	.linea_resultado_1{
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
		padding-top: 5px;
		padding-bottom: 5px;
		transition: .3s;
		cursor: pointer;
	}
	.linea_resultado_1:hover{
		background-color: #ececec;
	}
	.linea_resultado_1 .cuadro_foto{
		width: 60px;
		height: 60px;
		overflow: hidden;
		float: left;
		border-radius: 100%;
		border: 1px solid lightgrey;
		margin-right: 7px;
	}
	.linea_resultado_1 .foto{
		width: 60px;
		height: auto;
	}
	.linea_resultado_1 .cuadro_datos{
		padding: 7px;
		line-height: 135%;
		margin-top: 0px;
	}
	.linea_resultado_1 .cuadro_datos .nombre{
		font-weight: 500;
		color: #2a3c50;
		font-size: 15px;
		transition: .3s;
	}
	.linea_resultado_1:hover .cuadro_datos .nombre{
		color: black;
	}
	.linea_resultado_1 .cuadro_datos .esp{
		font-weight: 300;
		color: #004f6f;
		font-size: 15px;
	}
	.cuadro_resultados_1 .encabezado{
		background-color: #dae4ec;
		padding: 10px;
		font-size: 14px;
		color: #004f6f;
	}
	.cuadro_resultados_1 .cuerpo{
	}

	.cuadro_busqueda img{
		width: 35px;
    	opacity: .7;
	}

	@media(max-width: 990px){
		.cuadro_1{
			border-bottom-left-radius: 0px;
			border-left: none;
			border-top-right-radius: 12px;
			border-bottom: 1px solid lightblue;
		}
		.linea_especialidad{
			font-size: 11px !important;
			padding: 0px !important;
		}
		.cuadro_resultados_1{
			width: 350px;
		}
		.linea_resultado_1 .cuadro_datos .nombre,
		.linea_resultado_1 .cuadro_datos .esp{
			font-size: 12px;
		}
		.resultado_especialidades{
			width: 35%;
		}
		.cuadros_afk_1{
			width: 65%;
		}
		.linea_resultado_1{
			padding: 0px;
			padding-left: 7px;
		}
		.cuadro_busqueda{
			position: relative;
			display: inherit;
			padding-left: 45px;
		}
		.cuadro_busqueda img{
			position: absolute;
			left: 0px;
		}
		.cuadro_busqueda input{
			font-size: 15px;
		}
		.cuadro_resultados_1 .encabezado{
			background-color: rgba(0,129,198,.1);
		}


	}
</style>



<div class="cuadro_1 cuadro_opcion_gen click_campo_1">
	<div class="cuadro_busqueda centro-abs click_campo_1">
		<img src="<?php echo($pd_filtro_icono_ea); ?>">
		<input type="text" name="especialidad" placeholder="<?php echo($pd_filtro_texto_ea); ?>" 
		class="click_campo_1" required/>
	</div>
	<div class="cuadro_resultados_1">
		<div class="encabezado">
			<span><?php echo($pd_filtro_head_ea); ?></span>
		</div>
		<div class="cuerpo">
			<?php include("linea_medico.php"); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(".cuadro_busqueda input").keyup(function(){
		var valor_busqueda = jQuery(this).val();
		
		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_filtro_busqueda&method=buscar_medicos&format=debug',
			data: 'valor_busqueda=' + valor_busqueda,
			success: function(response){
				jQuery(".cuadro_resultados_1 .cuerpo").html(response);
				//alert(response);
				setBtnLineaEspecialidad();
			}
		});
	});

	function setBtnLineaEspecialidad(){
		jQuery(".linea_especialidad").unbind('click').click(function(){
			var valor = jQuery(this).find("span").html();
			jQuery(".cuadro_busqueda input").val(valor);

			jQuery(".cuadro_ubicacion input").focus();
			setTimeout(function() {
				jQuery(".cuadro_2 .resultado_ubicacion").addClass("mostrar");
			},100);
		});
	}
</script>


