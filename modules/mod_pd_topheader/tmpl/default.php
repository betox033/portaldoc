<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.cuadro_top_header{
		/*background-color: #dcdcdc;*/
		background-color: transparent;
		position: fixed;
		top: 0px;
		left: 0px;
		z-index: 45;
		width: 100%;
		transition: .3s;
		height: 32px;
		padding-right: 8vw;
	}
	.cuadro_top_header.miniatura{
		background-color: white !important;
	}
	.botones_top_header{
		overflow: hidden;
		float: right;
	}
	.btn_top_header{
		float: right;
		transition: .3s;
		padding: 1px;
		font-size: .82vw;
		color: white;
		padding-left: 5px;
		padding-right: 5px;
		cursor: pointer;
		width: 9vw;
		text-align: center;
	}
	<?php for($k=0; $k < count($pdtopheader_botones['texto']); $k++){ ?>
		.btn_th__<?php echo($k); ?>{
			background-color: <?php echo($pdtopheader_botones['color'][$k]); ?>;
			width: <?php echo($pdtopheader_botones['ancho'][$k] . "vw"); ?>;
		}
		.btn_th__<?php echo($k); ?>:hover{
			background-color: <?php echo($pdtopheader_botones['color_hover'][$k]); ?>;
		}
	<?php } ?>
	.btn_top_header img{
		width: 20px;
		margin-right: 7px;
	}
	.cuadro_redes_sociales{
		float: right;
		margin-right: 20px;
	}
	.cuadro_redes_sociales .icono_thh{
		width: 20px;
		height: auto;
		margin-right: 0px;
		margin-top: -5px;
		/*background-color: rgba(255,255,255,.5);*/
		border-radius: 100%;
		transition: .3s;
		cursor: pointer;
	}
	.cuadro_redes_sociales .icono_thh:hover{
		/*background-color: white;*/
	}
	.link_telefono{
		margin-right: 7px;
		font-size: 15px;
		color: white;
		transition: .3s;
	}
	.link_telefono img{
		width: 20px;
		margin-top: -3px;
	}
	.cuadro_top_header.miniatura .link_telefono{
		color: #004f6f;
	}
	.icono_th .icono_hover,.icono_th.miniatura .icono_base{
		display: none;
	}
	.icono_th .icono_base, .icono_th.miniatura .icono_hover{
		display: inherit;
	}
	.btn_flotante_tp{
		position: fixed;
		transition: .3s;
		cursor: pointer;
		font-size: 18px;
		font-weight: 500;
		padding: 10px;
		padding-right: 30px;
		padding-left: 15px;
	}
	.btn_flotante_tp:hover{
		padding-right: 35px;
	}
	.btn_flotante_tp img{
		width: 24px;
		margin-right: 7px;
	}

	<?php for($k=0; $k<count($pdtopheader_btnfloat['icono']); $k++){ ?>
		.flota__<?php echo($k); ?>{
			background-color: <?php echo($pdtopheader_btnfloat['color'][$k]); ?>;
			top: <?php echo($pdtopheader_btnfloat['top'][$k]); ?>vh;
			right: <?php echo($pdtopheader_btnfloat['right'][$k]); ?>vw;
		}
		.flota__<?php echo($k); ?>:hover{
			background-color: <?php echo($pdtopheader_btnfloat['color_hover'][$k]); ?>;
		}
	<?php } ?>


	@media(max-width: 990px){
		.botones_top_header{
			width: 100%;
		}
		.btn_top_header{
			font-size: 9px;
			padding-left: 0px;
			padding-right: 0px;
			padding-top: 7px;
			padding-bottom: 7px;
			width: 33.333%;
			overflow: hidden;
		}
		.cuadro_top_header.miniatura .cuadro_redes_sociales{
			top: 77px;
			background-color: white;
			border-bottom: 1px solid lightgrey;
		}
		.cuadro_redes_sociales{
			float: left;
			margin-right: 0px;
			margin-top: 5px;
			padding-left: 10px;
			position: fixed;
			width: 100%;
			left: 0px;
			top: 112px;
    		display: flex;
    		align-items: center;
    		justify-content: center;
    		background-color: rgba(255,255,255,.93);
    		transition: .3s;
		}
		.cuadro_redes_sociales .icono_thh{
			margin-left: 3px;
			margin-right: 3px;
		}
		.cuadro_top_header{
			padding-right: 0px;
		}

	}

	@media(min-width: 990px){
		.solo_mobile{
			display: none;
		}
	}
	

	
</style>


<div class="cuadro_top_header">
		<div class="botones_top_header">
			<?php for($k=0; $k < count($pdtopheader_botones['texto']); $k++){ ?>
				<a href="<?php echo($pdtopheader_botones['url'][$k]); ?>"
					<?php if($pdtopheader_botones['new_tab'][$k]){echo(" target='_blank'");} ?>
					class="
						<?php if($pdtopheader_botones['mobile'][$k]){echo("solo_mobile");} ?> 
						<?php echo($pdtopheader_botones['clase'][$k]); ?>
						">
					<div class="btn_top_header btn_th__<?php echo($k); ?>">
						<img src="<?php echo($pdtopheader_botones['icono'][$k]); ?>"
						class="<?php if($pdtopheader_botones['btn_sesion'][$k]){echo('cls');} ?>">
						<span class="<?php if($pdtopheader_botones['btn_sesion'][$k]){echo('cls');} ?>">
							<?php echo($pdtopheader_botones['texto'][$k]); ?>
						</span>
					</div> 					
				</a>
			<?php } ?>
		</div>

		<div class="cuadro_redes_sociales">
			<?php for($k=0; $k < count($pdtopheader_rs['icono']); $k++){ ?>
				<a href="<?php echo($pdtopheader_rs['url'][$k]); ?>" class="icono_th <?php echo($pdtopheader_rs['clase'][$k]); ?>"
					<?php if($pdtopheader_rs['new_tab'][$k]){echo(" target='_blank'");} ?>
					title="<?php echo($pdtopheader_rs['texto'][$k]); ?>">
					<img src="<?php echo($pdtopheader_rs['icono'][$k]); ?>" class="icono_thh">
				</a>
			<?php } ?>
		</div>
</div>



<script type="text/javascript">
	jQuery(window).scroll(function() {
		if (jQuery(document).scrollTop() > 50) {
			jQuery(".link_telefono").addClass("miniatura");
			jQuery(".cuadro_top_header").addClass("miniatura");
			jQuery(".icono_th").addClass("miniatura");
		}else {
			jQuery(".link_telefono").removeClass("miniatura");
			jQuery(".cuadro_top_header").removeClass("miniatura");
			jQuery(".icono_th").removeClass("miniatura");
		}
	});
</script>