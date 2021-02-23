



<style type="text/css">
	.cuadro_2{
		background-color: white;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.cuadro_ubicacion{
		width: 100%;
		height: 100%;
		border-right: 1px solid lightgrey;
	}
	.cuadro_ubicacion input{
		font-size: 13px;
		border:none;
		box-shadow: none;
		transition: .3s;
		width: 77vw;
	}
	.cuadro_ubicacion input:hover,
	.cuadro_ubicacion input:focus{
		outline: 1px solid #0081c6;
	}
	.cuadro_ubicacion input::placeholder{
		opacity: .7;
		font-weight: 300;
	}
	.cuadro_ubicacion img{
		width: 35px;
		opacity: .7;
	}
	.resultado_ubicacion{
		position: absolute;
		top: 50px;
		left: 0px;
		background-color: white;
		width: 450px;
		z-index: 5;
		transition: .3s;
		max-height: 0px;
		overflow-y: scroll;
		opacity: 0;
		height: 250px;
	}
	.resultado_ubicacion.mostrar{
		max-height: none;
		opacity: 1;
	}
	.linea_ubi{
		overflow: hidden;
		padding: 7px;
		font-size: 14px;
		transition: .3s;
		cursor: pointer;
		border-right: 1px solid lightgrey;
		border-bottom: 1px solid lightgrey;
		color: #2a3c50;
	}
	.linea_ubi:hover{
		background-color: #ececec;
	}
	.linea_ubi a{
		color: #004f6f;
	}
	.linea_ubi img{
		width: 20px;
	}
	.resultado_ubicacion .encabezado{
		background-color: #dae4ec;
		padding: 10px;
		font-size: 14px;
		color: #004f6f;
	}
	.resultado_ubicacion .cuerpo{
		overflow: hidden;
	}
	.resultado_ciudades, .resultado_comunas{
		width: 50%;
		float: left;
	}
	.head_ubi{
		background-color: #f5f5f5;
		color: #093b5b;
		padding-left: 5px;
		font-weight: bold;
		font-size: 14px;
		border-right: 1px solid lightgrey;
		border-bottom: 1px solid lightgrey;
	}

	@media(max-width: 990px){
		.cuadro_2{
			border-bottom: 1px solid lightblue;
		}
		.cuadro_ubicacion{
			display: inherit;
			position: relative;
			padding-left: 45px;
		}
		.cuadro_ubicacion img{
			position: absolute;
			left: 0px;
		}
		.linea_ubi{
			font-size: 12px;
		}
		.resultado_ubicacion{
			width: 350px;
		}
		.cuadro_ubicacion input{
			font-size: 15px;
		}

	}
</style>


<div class="cuadro_2 cuadro_opcion_gen click_campo_2">
	<div class="cuadro_ubicacion centro-abs click_campo_2">
		<img src="<?php echo($pd_filtro_icono_rc); ?>">
		<input type="text" name="ubicacion" placeholder="<?php echo($pd_filtro_texto_rc); ?>" 
		class="click_campo_2">
	</div>
	<div class="resultado_ubicacion click_campo_2">
		<!--
		<div class="encabezado">
			<span>Ingrese una region o comuna.</span>
		</div>
		-->
		<div class="linea_ubi">
			<img src="images/sistema/ubica_icon.png">
			<span>Cualquiera</span>
		</div>
		
		<div class="cuerpo">
			<?php include("linea_ubicacion.php"); ?>		
		</div>		
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		setBtnLineaUbicacion();
	});

	jQuery(".cuadro_ubicacion input").keyup(function(){
		var valor_busqueda = jQuery(this).val();
		
		jQuery.ajax({
			type: 'POST',
			url: 'index.php?option=com_ajax&module=pd_filtro_busqueda&method=buscar_ubicaciones&format=debug',
			data: 'valor_busqueda=' + valor_busqueda,
			success: function(response){
				jQuery(".resultado_ubicacion .cuerpo").html(response);
				setBtnLineaUbicacion();
			}
		});
	});
	function setBtnLineaUbicacion(){
		jQuery(".linea_ubi").unbind('click').click(function(){
			var valor = jQuery(this).find("span").html();
			jQuery(".cuadro_ubicacion input").val(valor);

			jQuery(".cuadro_isapre input").focus();
			setTimeout(function() {
				jQuery(".cuadro_3 .resultado_prevision").addClass("mostrar");
			},100);
		});
	}
</script>


