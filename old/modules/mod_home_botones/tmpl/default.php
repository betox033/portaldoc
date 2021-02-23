<?php 

defined('_JEXEC') or die;

 ?>


<style type="text/css">

	@media(min-width: 990px){
		.cuadro_botones_home{
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.cuadro_botones_home .item_btn{
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}
		.item_btn{
			min-width: 200px
		}
	}
	.cuadro_botones_home{
		position: relative;
	}
	.cuadro_botones_home .cuadro_left{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 50%;
		height: 100%;
		background-color: <?php echo($pd_btnhome_clrleft); ?>;
		z-index: -1;
	}
	.cuadro_botones_home .cuadro_right{
		position: absolute;
		top: 0px;
		right: 0px;
		width: 50%;
		height: 100%;
		background-color: <?php echo($pd_btnhome_clrright); ?>;
		z-index: -1;
	}
	.item_btn{
		cursor: pointer;
		transition: .3s;
		padding: 30px;
		color: white;
	}
	.item_btn img{
		width: 70px;
		height: auto;
		margin-bottom: 12px;
	}
	<?php for($k=0; $k<count($pd_lista_btnhome['texto']); $k++){ ?>
		.item__btn__<?php echo($k); ?>{
			background-color: <?php echo($pd_lista_btnhome['color'][$k]); ?>;
		}
		.item__btn__<?php echo($k); ?>:hover{
			background-color: <?php echo($pd_lista_btnhome['color_hover'][$k]); ?>;
		}

	<?php } ?>
</style>

<div class="cuadro_botones_home">
	<div class="cuadro_left"></div>
	<div class="cuadro_right"></div>
	<?php for($k=0; $k<count($pd_lista_btnhome['texto']); $k++){ ?>
		<div class="item_btn item__btn__<?php echo($k); ?>">
			<img src="<?php echo($pd_lista_btnhome['icono'][$k]); ?>">
			<span><?php echo($pd_lista_btnhome['texto'][$k]); ?></span>
		</div>
	<?php } ?>
</div>