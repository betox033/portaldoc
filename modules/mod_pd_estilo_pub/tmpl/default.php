<?php 

defined('_JEXEC') or die;

 ?>


<?php if($option == "com_users" && $view == "login" && $Itemid == 169){ ?>
	<style type="text/css">
		section{
			background-image: url(<?php echo($editpub_form_is); ?>);
		}
	</style>
<?php } ?>


<script type="text/javascript">
	jQuery(document).ready(function(){
		var ruta_img = "<?php echo($editpub_img_derecha); ?>";
		var imagen = "<img src='" + ruta_img + "' style='width: 100%'>";
		jQuery(".cuadro_paciente").append(imagen);
	});
</script>