<?php 

defined('_JEXEC') or die;

?>


<style type="text/css">
	@media(max-width: 990px){
		#formulario_perfil_publico {
			padding: 10px;
		}
		.editp_contsup{
			padding: 10px;
			text-align: justify;
		}

	}

	.titulo_editor{
		margin-top: 40px;
		margin-bottom: 10px;
	}
</style>




<?php 

if($usuario_general->conf_perfil){
	// El perfil ya ha sido configurado.
	include("perfil_limitado.php");
}else{
	// Primera vez de configuración.
	include("perfil_completo.php");
}

 ?>
