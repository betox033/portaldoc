<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.homediag_btn{
		background-color: <?php echo($pd_home_diag_btn_color); ?>;
		color: white;
		font-size: 18px;
		float: right;
		font-weight: 300;
		padding: 5px;
		padding-left: 40px;
		padding-right: 40px;
		margin-top: 0px;
		text-transform: none;
	}
	.homediag_btn:hover{
		background-color: <?php echo($pd_home_diag_btn_color_hover); ?>;
	}
	.homediag_img{
		width: 60%;
		height: auto;
		margin-left: 20%;
		margin-bottom: 20px;
	}
	.homediag_col_img{
		width: 33.3%;
	}
	.homediag_main{
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.homediag_parrafo{
		font-size: 16px;
		font-weight: 300;
		margin-bottom: 15px;
	}
	.homediag_titulo{
		font-size: 24px;
		font-weight: 700;
		text-align: center;
		color: #0481c6;
	}
	.cuadro_iconos{
		overflow: hidden;
		text-align: center;
		margin-top: 30px;
	}
	.icono_diag{ 
		margin-bottom: 20px;
	}
	.icono_diag img{
		width: 60%;
		margin-bottom: 10px;
	}
	.icono_diag .texto{
		font-size: 12px;
		font-weight: 400;
		color: #00335b;
		text-align: center;
		line-height: 120%;
	}

	.cuadro_diagrama_home{
		/*background-color: #f1f1f1;*/
		background-color: white;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	#imagen_prev_video{
		cursor: pointer;
		transition: .3s;
	}
	#imagen_prev_video:hover{
		box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.3);
	}




	@media(max-width: 990px){
		.homediag_main{
			padding-left: 30px;
			padding-right: 30px;
		}
		.homediag_titulo{
			font-size: 20px;
		}
		.homediag_parrafo{
			font-size: 15px;
		}
		.homediag_btn{
			margin-bottom: 15px;
		}

	}
</style>



<div class="cuadro_diagrama_home">
	<div class="container homediag_main">
						<div class="homediag_titulo">
					<?php 
					$homediag_titulo = $pd_home_diag_titulo; 
					$homediag_titulo = str_replace('/n/', '<strong>', $homediag_titulo);
					$homediag_titulo = str_replace('/ne/', '</strong>', $homediag_titulo);
					?>
					<span><?php echo($homediag_titulo); ?></span>
				</div>
				<hr>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="homediag_parrafo"><span><?php echo($pd_home_diag_parrafo); ?></span></div>	

				<div class="row">
					<?php for($k=0; $k < count($pd_home_diag_lista_iconos['icono']); $k++){ ?>
						<div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3">
							<div class="centro-abs icono_diag" style="flex-direction: column;">
								<img src="<?php echo($pd_home_diag_lista_iconos['icono'][$k]); ?>">
								<div class="texto">
									<span><?php echo($pd_home_diag_lista_iconos['texto'][$k]); ?></span>
								</div>
							</div>
						</div>
					<?php } ?>							
				</div>

				<div style="overflow: hidden">
					<a href="<?php echo($pd_home_diag_btn_url); ?>">
						<div class="homediag_btn btn_pd">
							<span><?php echo($pd_home_diag_btn_text); ?></span>
						</div>
					</a>				
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="cuadro_video">
					<img src="<?php echo($pd_home_diag_img_prev); ?>" style="width: 100%" id="imagen_prev_video">
				</div>
			</div>
		</div>
	</div>	
</div>


<script type="text/javascript">
	jQuery("#imagen_prev_video").unbind('click').click(function(){
		jQuery("#popup_video_home").modal("show");
	});
</script>

<style type="text/css">
	@media(min-width: 990px){
		#popup_video_home .modal-dialog{
			width: 800px;
		}
	}
</style>



<div class="modal fade" id="popup_video_home" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<iframe width="100%" height="430" src="<?php echo($pd_home_diag_url_iframe); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
				style="margin-bottom: -5px;"></iframe>
		</div>
	</div>
</div>
