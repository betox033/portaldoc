<?php 

defined('_JEXEC') or die;

 ?>



<style type="text/css">
	.cuadro_top_header{
		/*background-color: #dcdcdc;*/
		position: fixed;
		top: 0px;
		left: 0px;
		z-index: 100;
		width: 100%;
		transition: .3s;
		height: 45px;
	}
	.cuadro_top_header.miniatura{
		background-color: white !important;
	}
	.botones_top_header{
		overflow: hidden;
	}
	.btn_top_header{
		float: right;
		transition: .3s;
		padding: 1px;
		font-size: 12px;
		color: white;
		padding-left: 20px;
		padding-right: 20px;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	<?php for($k=0; $k < count($pdtopheader_botones['texto']); $k++){ ?>
		.btn_th__<?php echo($k); ?>{
			background-color: <?php echo($pdtopheader_botones['color'][$k]); ?>;
		}
	<?php } ?>
	.btn_top_header img{
		width: 20px;
	}
</style>

 <div class="cuadro_top_header">
 	<div class="container">
 		<div class="botones_top_header">
 			<?php for($k=0; $k < count($pdtopheader_botones['texto']); $k++){ ?>
 				<div class="btn_top_header btn_th__<?php echo($k); ?>">
 					<img src="<?php echo($pdtopheader_botones['icono'][$k]); ?>">
 					<span><?php echo($pdtopheader_botones['texto'][$k]); ?></span>
 				</div>
 			<?php } ?>
 		</div>
 	</div>
 </div>