<div class="resultado_ciudades">
	<div class="head_ubi">
		<span>Regiones</span>
	</div>
	<?php foreach ($lista_regiones as $key => $region) { ?>
		<div class="linea_ubi">	
			<img src="images/sistema/ubica_icon.png">
			<span><?php echo($region->region); ?></span>
		</div>
	<?php } ?>
</div>

<div class="resultado_comunas">
	<div class="head_ubi">
		<span>Comunas</span>
	</div>
	<?php foreach ($lista_comunas as $key => $comuna) { ?>
		<div class="linea_ubi">
			<img src="images/sistema/ubica_icon.png">
			<span><?php echo($comuna->comuna); ?></span>
		</div>						
	<?php } ?>
</div>	