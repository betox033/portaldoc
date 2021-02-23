<?php 

defined('_JEXEC') or die;

 ?>


<style type="text/css">
	.cuadro_general_banner{
		background-color: <?php echo($pd_bnhm_color_fondo); ?>;
		padding: 30px;
		padding-top: 45px;
		padding-bottom: 45px;
		color: white;
	}
	.cuadro_general_banner .titulo_banner{
		font-size: 30px;
		margin-bottom: 25px;
		font-weight: 100;
	}
	.cuadro_general_banner .parrafo_banner{
		font-size: 24px;
		line-height: 120%;
		width: 77%;
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
</style>






<div class="cuadro_general_banner">
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
					<span><?php echo($pd_bnhm_parrafo); ?></span>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="btn_banner">
					<span><?php echo($pd_bnhm_txtbtn); ?></span>
				</div>
			</div>
		</div>
	</div>
</div>