
<style type="text/css">
	.cuadro_video{
		position: relative;
	}
	.overlay_video{
		position: absolute;
		z-index: 5;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,.5);
		opacity: 0;
		transition: .5s;
		cursor: pointer
	}
	.cuadro_video:hover .overlay_video,
	.cuadro_video:hover .cuadro_youtube{
		opacity: 1;
	}
	.cuadro_youtube{
		position: absolute;
		z-index: 10;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		opacity: 0;
		transition: .5s;
		cursor: pointer
	}
	.cuadro_youtube img{
		width: 130px;
	}

	@media(max-width: 990px){
		.cuadro_video{
			margin-bottom: 20px;
		}

	}
</style>





<div class="col-sm-12 col-md-6 col-lg-6">
	<div class="cuadro_video" id="cuadro_video_home">
		<div class="overlay_video"></div>
		<div class="cuadro_youtube centro-abs">
			<img src="<?php echo($pd_home_diag_icono_youtube); ?>">
		</div>
		<img src="<?php echo($pd_home_diag_img_prev); ?>" style="width: 100%" id="imagen_prev_video">
	</div>
</div>