<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	#main-box{
		display: none;
	}
	.titulo_contenido{
		margin-top: 15px;
		margin-bottom: -10px;
		color: #0481c6;
		font-size: 24px;
		font-weight: 700;
	}
	.bajada_contenido{
		padding: 10px;
		margin-bottom: 20px;
		font-size: 16px;
	}
	.cuadro_imagen{
		position: relative;
		margin-bottom: 25px;
	}
	.cuadro_imagen img{
		width: 100%;
	}
	.overlay_contenido{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: rgba(0,177,238,.4);
		opacity: 0;
		transition: .7s;
	}
	.overlay_contenido:hover{
		opacity: 1;
	}
	.contenido_flotante{
		position: absolute;
		bottom: 0px;
		left: 0px;
		width: 100%;
		color: white;
		padding: 20px;
		opacity: 0;
		font-size: 16px;
	}
	.overlay_contenido:hover .contenido_flotante{
		opacity: 1;
	}

	.btn_flotante{
		display: flex;
    	align-items: center;
    	justify-content: center;
    	width: 200px;
		font-size: 14px;
		padding: 5px;
		padding-left: 30px;
		padding-right: 30px;
	}
	.parrafo_contenido, .parrafo_derecho{
		font-size: 16px;
		font-weight: 300;
		color: #444444;
	}

	@media(max-width: 990px){
		.contenido_cm{
			padding-left: 24px;
			padding-right: 24px;
		}
		.parrafo_contenido, .parrafo_derecho{
			font-size: 14px;
		}
		.titulo_contenido{
			text-align: center;
			margin-top: 30px;
		}


	}
</style>


<div class="container contenido_cm">
	<div class="titulo_contenido">
		<span><?php echo($page_contenido_titulo); ?></span>
	</div>
	<hr>	
</div>

<?php if($page_contenido_imgsup){ ?>
	<div class="container">
		<img src="<?php echo($page_contenido_imgsup); ?>" style="width: 100%">
		<div style="height: 35px"></div>
	</div>
<?php } ?>



<div class="container contenido_cm">
	<?php if($page_contenido_bajada){ ?>
		<div class="bajada_contenido">
			<span><?php echo($page_contenido_bajada); ?></span>
		</div>
	<?php }else{ ?>
		
	<?php } ?>
	<div class="row">
		<?php if($page_contenido_pos_img == "eskerra"){ ?>
			<?php include("cuadro_imagen.php"); ?>
			<div class="col-sm-12 col-md-6 col-lg-6 parrafo_contenido">
				<span><?php echo($page_contenido_parrafo); ?></span>
			</div>
		<?php }else{ ?>
			<div class="col-sm-12 col-md-6 col-lg-6 parrafo_contenido">
				<span><?php echo($page_contenido_parrafo); ?></span>
			</div>
			<?php include("cuadro_imagen.php"); ?>			
		<?php } ?>
	</div>
</div>



