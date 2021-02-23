<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	body section {
		padding-top: 0px !important;
	}
	.cuadro_banner_video{
		position: relative;
		height: 93vh;
		overflow: hidden;
		margin-bottom: -7px;
	}

	.cuadro_marco_referencia{
		position: absolute;
		/*background-color: rgba(0,0,0,.3);*/
		width: 50%;
		height: 50%;
		bottom: 0px;
		right: 0px;
		z-index: 5;

	}
	.titulo_banner_video{
		padding: 30px;
		background-color: rgba(0,79,111,.9);

		/*background-color: #0081c6;*/
		color: white;
		font-size: 2vw;
		font-weight: 400;
		text-align: center;
		width: 80%;
		overflow: hidden;
		height: 120px;
		border-radius: 10px;
	}
	.cuadro_opcion_gen{
		float: left;
		/*border: 1px solid black;*/
		height: 100%;
		position: relative;
	}

	#carrusel_textos{
		height: 100%;
	}


	@media(min-width: 990px){
		.cuadro_banner_video video{
			width: 100%;
		}
	}



	@media(max-width: 990px){
		.cuadro_banner_video video{
			height: 100%;
			margin-left: -30%;
		}
		.cuadro_banner_video{
			height: 60vh;
		}
		.titulo_banner_video{
			bottom: 5%;
			right: 9%;
			padding: 10px;
			font-size: 4vw;
			width: 80%;
		}

	}

</style>


<div class="cuadro_banner_video">
	<video  autoplay loop="loop" muted id="video_home" src="<?php echo('images/video/' . $pd_banner_video); ?>">
	</video>

	<div class="cuadro_marco_referencia centro-abs">
		<div class="titulo_banner_video centro-abs">
			<div class="owl-carousel" id="carrusel_textos">
				<?php for($k=0; $k<count($pd_banner_video_textos['texto']); $k++){ ?>
					<div>
						<span><?php echo($pd_banner_video_textos['texto'][$k]); ?></span>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#carrusel_textos').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			autoplay: true,
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:1,
				},
				1000:{
					items:1,
				}
			}
		})
	});
</script> 





