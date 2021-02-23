<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.cuadro_general_banner{
		/*background-color: <?php echo($pd_bnhm_color_fondo); ?>;*/
		padding: 30px;
		padding-top: 45px;
		padding-bottom: 45px;
		color: white;
		background-image: url(<?php echo($pd_bnhm_img_fondo); ?>);
		background-size: cover;
		background-position: center;
		position: relative;
	}
	.cuadro_general_banner .titulo_banner{
		font-size: 32px;
		margin-bottom: 25px;
		font-weight: 600;
	}
	.cuadro_general_banner .parrafo_banner{
		font-size: 24px;
		line-height: 120%;
		width: 90%;
	}
	.cuadro_general_banner .btn_banner{
		border: 1px solid white;
		padding: 15px;
		font-size: 22px;
		text-align: center;
		display: inline-block;
		border-radius: 50px;
		padding-left: 50px;
		padding-right: 50px;
		margin-top: 30px;
		transition: .3s;
		cursor: pointer;
	}
	.cuadro_general_banner .btn_banner:hover{
		background-color: rgba(255,255,255,.3);
	}
	#main{
		display: none;
	}


	@media(max-width: 990px){
		.cuadro_general_banner .titulo_banner{
			font-size: 20px;
			text-align:center;
		}
		.cuadro_general_banner .parrafo_banner{
			font-size: 15px;
			width: 90%;
		}
		.cuadro_general_banner .btn_banner{
			padding: 7px;
			font-size: 14px;
			padding-left: 30px;
			padding-right: 30px;
		}
		.cuadro_general_banner{
			padding-top: 20px;
			padding-bottom: 20px;
		}

	}

	@media(min-width: 990px){
		.columna_btn_banner_registro{
			min-height: 150px;
		}
	}


	.cuadro_general_banner .cuadro_overlay{
		position:absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: <?php echo($pd_bnhm_color_overlay); ?>;
	}
</style>






<div class="cuadro_general_banner">
	<div class="cuadro_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-8">
				<div class="titulo_banner">
					<?php 
					$titulo = str_replace('/str/', '<strong style="font-weight: bold">', $pd_bnhm_titulo); 
					$titulo = str_replace('/stre/', '</strong>', $titulo);
					?>
					<span><?php echo($titulo); ?></span>
				</div>
				<div class="parrafo_banner">
					<?php 
					$parrafo = $pd_bnhm_parrafo;
					$parrafo = str_replace('/n/', '<strong>', $parrafo);
					$parrafo = str_replace('/ne/', '</strong>', $parrafo);
					 ?>
					<span><?php echo($parrafo); ?></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 columna_btn_banner_registro centro-abs">
				<a href="<?php echo($pd_bnhm_url); ?>" style="color: white">
					<div class="btn_banner">
						<span><?php echo($pd_bnhm_txtbtn); ?></span>
					</div>					
				</a>
			</div>
		</div>
	</div>
</div>