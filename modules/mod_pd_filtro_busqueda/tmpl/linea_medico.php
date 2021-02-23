
<style type="text/css">
	.resultado_especialidades{
		float: left; 
		width: 40%;
		min-height: 10px;
	}
	.cuadros_afk_1{
		float: left;
		width: 60%;
	}
	.linea_especialidad{
		font-size: 15px;
		color: #2a3c50;
		padding: 7px;
		transition: .3s;
		cursor: pointer;
		border-bottom: 1px solid lightgrey;
	}
	.linea_especialidad:hover{
		background-color: #e8e8e8;
	}
	.linea_resultado_1{
		border-bottom: 1px solid lightgrey;
	}
</style>





<div class="resultado_especialidades">
	<?php foreach($lista_especialidades as $item){ ?>
		<div class="linea_especialidad">
			<img src="images/sistema/icon_person4.png" style="width: 20px">
			<span><?php echo($item->especialidad) ?></span>
		</div>
	<?php } ?>
</div>
<div class="cuadros_afk_1">
	<?php foreach ($lista_medicos as $key => $medico) { ?>
		<div class="linea_resultado_1">

			<!--<a href="index.php?option=com_content&view=article&id=4&id_medico=<?php echo($medico->id); ?>&Itemid=138">-->
			<a href="index.php?option=com_content&view=article&id=2&Itemid=133&id_medico=<?php echo($medico->id); ?>">
				<div class="cuadro_foto">
					<?php if($medico->foto){ ?>
						<img src="<?php echo($medico->foto); ?>" class="foto">
					<?php }else{ ?>
						<?php if($medico->sexo == "F"){ ?>
							<img src="images/sistema/foto_usuario_mujer.png" class="foto" style="opacity: .5">
						<?php }else{ ?>
							<img src="images/sistema/foto_usuario.png" class="foto" style="opacity: .5">
						<?php } ?>
					<?php } ?>
				</div>
				<div class="cuadro_datos">
					<span class="nombre"><?php echo($medico->name . " " . $medico->apellido); ?></span><br>
					<span class="esp"><?php echo($medico->especialidad); ?></span>
				</div>				
			</a>
		</div>
	<?php } ?>
</div>