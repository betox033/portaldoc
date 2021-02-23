<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.item_lista{
		font-size: 12px;
		color: #00335b;
		text-align: center;
		display: inline-grid;
		width: 24%;
	}
	.item_lista img{
		width: 70%;
		margin-left: 15%;
		margin-bottom: 15px;
	}
	.img_contenido_tp2{
		width: 100%;
		margin-bottom: 20px;
	}
	.cuadro_contenido_tipo_2{
		font-size: 16px;
	}
	#main-box{
		display: none;
	}
	.parrafo_contenido, .parrafo_derecho{
		font-size: 16px;
		font-weight: 300;
		color: #444444;
	}
	.cuadro_items{
		text-align: center;
	}

	@media(max-width: 990px){
		.cuadro_contenido_tipo_2{
			font-size: 14px;
			padding: 24px;
		}
		.titulo_contenido{
			text-align: center;
		}
		.item_lista{
			width: 49%;
			margin-bottom: 15px;
		}

	}
</style>


<div class="container cuadro_contenido_tipo_2">
	<div class="titulo_contenido">
		<span><?php echo($pd_pct2_titulo); ?></span>
	</div>
	<hr>

	<?php if($pd_pct2_imgsup){ ?>
		<img src="<?php echo($pd_pct2_imgsup); ?>" style="width: 100%;">
		<div style="height: 40px"></div>
	<?php } ?>

	<div class="row">
		<?php if($pd_pct2_imagen_pos == "eskerra"){ ?>
			<div class="col-sm-12 col-md-6 col-lg-6">
				<img src="<?php echo($pd_pct2_imagen); ?>" class="img_contenido_tp2">
				<div class="cuadro_items">
					<?php for($k=0;$k<count($pd_pct2_lista_items['icono']); $k++){ ?>
						<div class="item_lista">
							<img src="<?php echo($pd_pct2_lista_items['icono'][$k]); ?>">
							<div class="texto">
								<span><?php echo($pd_pct2_lista_items['texto'][$k]); ?></span>
							</div>
						</div>						
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<div class="col-sm-12 col-md-6 col-lg-6 parrafo_contenido">
			<span><?php echo($pd_pct2_parrafo_left); ?></span>
		</div>
		<?php if($pd_pct2_imagen_pos == "dereixa"){ ?>
			<div class="col-sm-12 col-md-6 col-lg-6">
				<img src="<?php echo($pd_pct2_imagen); ?>" class="img_contenido_tp2">
				<div class="row">
					<?php for($k=0;$k<count($pd_pct2_lista_items['icono']); $k++){ ?>
						<div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3">
							<div class="item_lista">
								<img src="<?php echo($pd_pct2_lista_items['icono'][$k]); ?>">
								<div class="texto">
									<span><?php echo($pd_pct2_lista_items['texto'][$k]); ?></span>
								</div>
							</div>						
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

	</div>
</div>