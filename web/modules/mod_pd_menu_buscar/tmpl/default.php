<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	.item_menu_buscar{
		position: fixed;
		z-index: 30;
		width: 300px;
		background-color: white;
		top: 104px;
		right: 101px;
		overflow: hidden;
		opacity: 0;
		max-height: 0px;
		transition: .3s;
		border: 1px solid #1475ba;
	}
	.item_menu_buscar.miniatura{
		top: 83px;
	}
	.item_menu_buscar.mostrar{
		opacity: 1;
		max-height: none;
	}
	.linea_item_b12{
		overflow: hidden;
		padding: 5px;
		margin-bottom: 10px;
		transition: .3s;
		cursor: pointer;
	}
	.linea_item_b12:hover{
		background-color: lightgrey;
	}
	.linea_item_b12 img{
		float: left;
		width: 30px;
		height: 30px;
	}
	.linea_item_b12 .texto{
		margin-left: 40px;
		line-height: 140%;
	}
	.linea_item_b12 .texto .titulo{
		color: #004f6f;
		font-weight: 500;
		font-size: 15px;
	}
	.linea_item_b12 .texto .bajada{
		color: rgba(0,129,198,.7);
		font-weight: 500;
	}
	.btn_buscar_b12{
		width: 100%;
		padding: 3px;
		color: white;
		background-color: #1475ba;
		text-align: center;
		font-size: 16px;
		transition: .3s;
		cursor: pointer;
	}
	.btn_buscar_b12:hover{
		background-color: #11619a;
	}
</style>


<div class="item_menu_buscar">
	<div class="linea_item_b12">
		<a href="index.php?option=com_content&view=article&id=5&Itemid=151&crit=nombre;especialidad;sub_especialidad&valor=">
			<img src="/portal_doc/images/sistema/especial_icon.png">
			<div class="texto">
				<span class="titulo">Especialidad</span><br>
				<span class="bajada">Especialidad, tratamiento o nombre del doctor</span>
			</div>			
		</a>
	</div>
	<div class="linea_item_b12">
		<a href="index.php?option=com_content&view=article&id=5&Itemid=151&crit=ciudad;comuna&valor=">
			<img src="/portal_doc/images/sistema/ubica_icon.png">
			<div class="texto">
				<span class="titulo">Ubicación</span><br>
				<span class="bajada">Selecciona una provincia o localidad</span>			
			</div>			
		</a>
	</div>
	<div class="linea_item_b12">
		<a href="index.php?option=com_content&view=article&id=5&Itemid=151&crit=prevision&valor=">
		<img src="/portal_doc/images/sistema/salud_icon.png">
		<div class="texto">
			<span class="titulo">ISAPRE</span><br>
			<span class="bajada">Selecciona un seguro médico</span>			
		</div>			
		</a>
	</div>
	<div class="linea_item_b12">
		<img src="/portal_doc/images/sistema/salud_icon.png">
		<div class="texto">
			<span class="titulo">Servicio</span><br>
			<span class="bajada">Selecciona un Tipo de Atención</span>			
		</div>
	</div>
	<div class="btn_buscar_b12">
		<span>Buscar</span>
	</div>
</div>


