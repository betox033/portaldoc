

<style type="text/css">
	.linea_esp{
		padding: 7px;
		border-bottom: 1px solid #0081c6;
		transition: .3s;
		cursor: pointer;
		color: #003652;
	}
	.linea_esp:hover{
		background-color: #b8d9ea;
	}
	.linea_esp img{
		width: 20px;
		margin-right: 7px;
	}
</style>



<div class="lista_esp_meddes">
	<?php foreach($lista_especialidades as $esp){ ?>
		<div class="linea_esp">
			<img src="" class="icono_lnmeddes">
			<span><?php echo($esp->especialidad); ?></span>
		</div>
	<?php } ?>
</div>



<script type="text/javascript">
	var src_icono = jQuery("#img_meddes_icon").attr("src");
	jQuery(".icono_lnmeddes").attr("src",src_icono);
</script>