<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.columna_registro{
		background-color: white;
		padding: 15px;
		border-radius: 7px;
	}
	.registration{
		margin-top: -40px;
	}
	@media(max-width: 990px){
		section{
			margin-top: 0px !important;
			background-size: cover;
			background-image: url(..) !important;
			margin-top: 70px !important;
		}
		.registration{
			margin-top: 0px;
			margin-left: 10px;
			margin-right: 10px;
		}
	}

	@media(max-width: 990px){
		section{
			background-image: none;
			margin-top: 0px;
		}
	}
	.fondo_registro{
		margin-top: -70px;
	}

	#system-message-container{
		width: 40%;
		background-color: lightgrey;
		color: black;
	}
	#main #container{
		background-color: transparent;
	}

	<?php if($tipo != "general"){ ?>
			section{
		background-image: url(<?php echo($pd_estilo_register_img); ?>);
		margin-top: 120px;
		background-size: contain;
		background-repeat: no-repeat;
	}
	<?php }else{ ?>
	section{
		background-image: url(<?php echo($pd_estilo_register_img_2); ?>);
		margin-top: 120px;
		background-size: contain;
		background-repeat: no-repeat;
	}
	.titulo_reg_page{
		color: <?php echo($pd_estilo_register_titulo_2_color); ?> !important;
	}
	<?php } ?>



</style>


<script type="text/javascript">
	<?php if($tipo == "general"){ ?>
		jQuery(document).ready(function(){
			var titulo = "<?php echo($pd_estilo_register_titulo_2); ?>";
			jQuery(".titulo_reg_page span").html(titulo);
			var subtitulo = '<?php echo($pd_estilo_register_subtitulo_2); ?>';
			jQuery(".parrafo_reg_page span").html(subtitulo);

			jQuery("#jform_tipo").prepend("<option value='' disabled><?php echo($pd_estilo_register_texto_selector); ?></option>");
		});	
	<?php }else{ ?>
		jQuery(document).ready(function(){
			jQuery("#jform_tipo").prepend("<option value='' disabled><?php echo($pd_estilo_register_texto_selector); ?></option>");
			jQuery("#jform_tipo option[value=3]").remove();


			var titulo = "<?php echo($pd_estilo_register_titulo); ?>";
			jQuery(".titulo_reg_page span").html(titulo);
			var subtitulo = '<?php echo($pd_estilo_register_subtitulo); ?>';
			jQuery(".parrafo_reg_page span").html(subtitulo);
		});
	<?php } ?>
</script>