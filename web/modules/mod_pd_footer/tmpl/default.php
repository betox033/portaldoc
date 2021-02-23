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
		padding-bottom: 20px;
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
		font-size: 14px;
		margin-bottom: 15px;
		font-weight: 600;
	}
	.linea_footer{
		margin-bottom: 5px;
		overflow: hidden;
	}
	.linea_footer a{
		color: white;
	}
	.linea_footer img{
		width: 25px;
		float: left;
	}
	.lf_icono{
		float: left;
		margin-right: 7px;
	}
	.logo_gobierno{
		width: 60%;
		margin-bottom: 15px;
	}
	.linea_blanca_footer{
		width: 100%;
		height: 2px; background-color: white;
		margin-top: 10px;
		margin-bottom: 5px;
	}
	.columna_footer{
		padding-left: 10px;
		padding-right: 10px;
	}
	.titulo_pr_columna{
		text-align: center;
		width: 62%;
	}

</style>



<div class="cuadro_gen_footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-2 columna_footer">
				<div class="titulo_footer titulo_pr_columna">
					<span><?php echo($pdfooter_titulo_1); ?></span>
				</div>
				<div>
					<a href="<?php echo($pdfooter_img_aux_url); ?>" target="_blank">
						<img src="<?php echo($pdfooter_img_aux) ?>" class="logo_gobierno">
					</a>
					
					<img src="<?php echo($pdfooter_logo); ?>" class="logo_footer" style="width: 70%">
				</div>
			</div>

			<?php foreach ($pdfooter_columnas as $key => $columna) { ?>
				<div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-<?php echo($columna->ancho_col); ?> columna_footer">
					<div class="titulo_footer">
						<span><?php echo($columna->titulo); ?></span>
					</div>
					<div style="overflow: hidden;margin-bottom: 15px;">
						<?php $arreglo_links = json_decode($columna->links, true); ?>
						<?php for($k=0; $k< count($arreglo_links['texto']); $k++){ ?>
							<div class="linea_footer <?php echo($arreglo_links['clase'][$k]); ?>
							<?php if($arreglo_links['tipo'][$k] == 'icono'){echo(' lf_icono');} ?>">
								<a href="<?php echo($arreglo_links['url'][$k]); ?>"
									<?php if($arreglo_links['new_tab'][$k]){echo(" target='_blank'");} ?>
									>
									<?php if($arreglo_links['tipo'][$k] == "icono"){ ?>
										<img src="<?php echo($arreglo_links['icono'][$k]); ?>" 
										title="<?php echo($arreglo_links['texto'][$k]); ?>">
									<?php }else{ ?>
										<span><?php echo($arreglo_links['texto'][$k]); ?></span>
									<?php } ?>	
								</a>
							</div>
						<?php } ?>
					</div>
					<div style="width: 100%">
						<span><?php echo($columna->contenido_inferior); ?></span>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="linea_blanca_footer"></div>
		<div>
			<?php for($k=0; $k<count($pdfooter_textos_finales['texto']); $k++){ ?>
				<?php if($pdfooter_textos_finales['url'][$k]){ ?>
					<a href="<?php echo($pdfooter_textos_finales['url'][$k]); ?>" style="color: white">
					<?php } ?>
					<span><?php echo($pdfooter_textos_finales['texto'][$k]); ?></span>
					<?php if($pdfooter_textos_finales['url'][$k]){ ?>
					</a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>




<script type="text/javascript">
		function getWordCount(wordString) {
		var words = wordString.split(" ");
		words = words.filter(function(words) { 
			return words.length > 0
		}).length;
		return words;
	}
	jQuery.validator.addMethod("wordCount",function(value, element, params) {
		var count = getWordCount(value);
		if(count >= params[0]) {
			return true;
		}
	},
	jQuery.validator.format("A minimum of {0} words is required here.")
	);
</script>