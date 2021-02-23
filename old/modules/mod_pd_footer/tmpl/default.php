<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.moduletable{
		padding: 0px;
		margin-bottom: 0px !important;
	}
	.cuadro_gen_footer{
		background-color: <?php echo($pdfooter_color_fondo); ?>;
		color: white;
		padding: 20px;
		padding-bottom: 100px;
		margin-top: 2px;
	}
	.cuadro_gen_footer .texto_1{
		line-height: 120%;
		font-size: 10px;
		text-align: center;
		margin-top: 10px;
	}
	.cuadro_gen_footer .texto_2{
		line-height: 120%;
		margin-top: 30px;
	}
	.titulo_footer{
		margin-top: 25px;
		font-size: 17px;
		margin-bottom: 15px;
	}
	.linea_footer{
		margin-bottom: 5px;
	}
	.linea_footer a{
		color: white;
	}
</style>



<div class="cuadro_gen_footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-3">
				<div align="center">
					<img src="<?php echo($pdfooter_logo); ?>" class="logo_footer" style="width: 70%">
				</div>
				
				<div class="texto_1">
					<?php 
					$texto_1 = str_replace('/br/', '<br>', $pdfooter_texto_1);
					?>
					<span><?php echo($texto_1); ?></span>
				</div>
				<div class="texto_2">
					<?php 
					$texto_2 = str_replace('/br/', '<br>', $pdfooter_texto_2);
					?>
					<span><?php echo($texto_2); ?></span>
				</div>
			</div>

			<?php foreach ($pdfooter_columnas as $key => $columna) { ?>
				<div class="col-sm-12 col-md-6 col-lg-<?php echo($columna->ancho_col); ?>">
					<div class="titulo_footer">
						<span><?php echo($columna->titulo); ?></span>
					</div>
					<div>
						<?php $arreglo_links = json_decode($columna->links, true); ?>
						<?php for($k=0; $k< count($arreglo_links['texto']); $k++){ ?>
							<div class="linea_footer">
								<a href="<?php echo($arreglo_links['url'][$k]); ?>">
									<span><?php echo($arreglo_links['texto'][$k]); ?></span>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>