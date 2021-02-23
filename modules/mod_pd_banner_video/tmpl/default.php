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
		margin-bottom: -10px;
	}
	.cuadro_marco_referencia{
		position: absolute;
		/*background-color: rgba(0,0,0,.3);*/
		width: 40%;
		height: 50%;
		bottom: 0px;
		right: 0px;
		z-index: 5;
	}
	.titulo_banner_video{
		background-color: <?php echo($pd_banner_color_fondo); ?>;
		color: white;
		font-size: 1.5vw;
		font-weight: 400;
		text-align: center;
		width: 100%;
		height: 210px;
		overflow: hidden;
		line-height: 30px;
		padding-top: 15px;
		padding-bottom: 40px;
	}
	.titulo_banner_video .sub{
		font-size: 1.2vw;
	}
	.cuadro_opcion_gen{
		float: left;
		/*border: 1px solid black;*/
		height: 100%;
		position: relative;
	}
	@media(min-width: 990px){
		.cuadro_banner_video video{
			width: 100%;
		}
	}
	@media(max-width: 990px){
		.cuadro_banner_video video{
			height: 100%;
			margin-left: -60%;
		}
		.cuadro_banner_video{
			height: 85vh;
		}
		.titulo_banner_video{
			bottom: 5%;
			right: 9%;
			padding: 10px;
			font-size: 4.5vw;
			line-height: 28px;
		}
		.titulo_banner_video .sub{
			font-size: 3.3vw;
		}
		.btn_txtvd_vermas{
			font-size: 3vw !important;
			float: none !important;
			margin-left: auto;
			margin-right: auto;
			width: 80px !important;
			line-height: 140%;
		}
	}
	.btn_txtvd_vermas{
		padding: 0px;
		background-color: white;
		border-radius: 7px;
		padding-left: 10px;
		padding-right: 10px;
		font-weight: 600;
		display: flex;
    	align-items: center;
    	justify-content: center;
    	font-size: 12px;
    	width: 95px;
    	margin-left: auto;
    	margin-right: auto;
    	line-height: 20px;
    	margin-top: 15px;
    	margin-bottom: -7px;
	}
	#carrusel_textos.owl-carousel button.owl-dot{
		width: 10px;
		height: 10px;
		background-color: #649cb3;
		margin-left: 3px;
		margin-right: 3px;
		border-radius: 100%;
		opacity: .7;
	}
	#carrusel_textos.owl-carousel button.owl-dot:focus{
		outline: .1px solid transparent;
	}
	.vd_line_1{
		font-size: 26px;
	}
	.vd_line_2{
		font-size: 22px;
	}
	.vd_line_3{
		font-size: 18px;
	}
	#carrusel_textos.owl-carousel button.owl-dot:hover,
	#carrusel_textos.owl-carousel button.owl-dot.active{
		background-color: #00c2f0;
	}
	#carrusel_textos .owl-dots{
		position: absolute;
    	/*bottom:-25px;*/
    	bottom: 20px;
    	left: 0px;
    	width: 100%;
    	text-align:center;
	}
	@media(max-width: 990px){
		#carrusel_textos .owl-dots{
			bottom: 10px;
		}
		.cuadro_marco_referencia{
			width: 100%;
		}
		.vd_line_1{
			font-size: 22px;
		}
		.vd_line_2{
			font-size: 18px;
		}
		.vd_line_3{
			font-size: 14px;
		}
	}
	#carrusel_textos{
		position: absolute;
		right: 0px;
		bottom: 0px;
	}

	@media(min-width: 760px) and (max-width: 1000px){
		.btn_txtvd_vermas{
			width: 100px !important;
			font-size: 2vw !important;
		}
	}

</style>





<div class="cuadro_banner_video">

	<video  autoplay loop="loop" muted id="video_home" src="<?php echo('images/video/' . $pd_banner_video); ?>">

	</video>



	<div class="cuadro_marco_referencia">

		<div class="owl-carousel" id="carrusel_textos">

			<?php foreach($pdvideos_textos as $texto){ ?>

				<div class="titulo_banner_video centro-abs">

					<span><?php echo($texto->contenido); ?></span>

				</div>

			<?php } ?>

		</div>

	</div>

</div>



	                	







<script type="text/javascript">

	jQuery(document).ready(function(){

		jQuery('#carrusel_textos').owlCarousel({

			loop:true,

			responsiveClass:true,

			autoplay: true,

			/*animateOut: 'fadeLeft',*/

			slideSpeed: 2000,

			paginationSpeed: 2000,

			smartSpeed:1500,

			dots: true,

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











