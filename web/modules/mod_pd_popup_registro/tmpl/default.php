<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.boton_registro{
		background-color: #94bb1e;
		transition: .3s;
	}
	.boton_registro:hover{
		background-color: #789818 !important;
	}
	#popup_contacto .modal-content{
		/*background-color: rgba(151,183,39,.95);*/
		/*background-color: #2a3c50;*/
		background-color: white;
		border-radius: 10px;
		min-height: 100px;
		position: relative;
		padding: 30px;
		padding-top: 40px;
		padding-bottom: 40px;
	}
	.btn_cerrar{
		font-size: 24px;
		color: white;
		position: absolute;
		top: 5px;
		right: 10px;
		cursor: pointer;
		width: 20px;
		height: 20px;
	}
	.btn_cerrar img{
		width: 100%;
		height: auto;
	}
	#form_contacto_general input[type=radio]{
		width: 20px;
		height: 20px;
		color: grey;
		background-color: grey;
		margin-right: 3px;
		margin-top: 3px;
		margin-left: 10px;
	}
	#form_contacto_general input[type=text]{
		width: 100%;
		padding: 3px;
		padding-left: 7px;
		border: none;
		margin-bottom: 7px;
		border: 1px solid lightgrey;
	}
	#form_contacto_general input[type=text]::placeholder{
		padding: 3px;
		padding-left: 7px;
	}
	#form_contacto_general textarea{
		padding: 3px;
		width: 100%;
		height: 150px;
		max-height: 150px;
		min-height: 150px;
	}
	#form_contacto_general select{
		width: 100%;
		margin-bottom: 10px;
	}
	.btn_enviar_registro{
		color: white;
		background-color: #005db4;
		font-size: 18px;
		font-weight: 100;
		float: right;
		padding: 5px;
		padding-left: 40px;
		padding-right: 40px;
		transition: .3s;
		cursor: pointer;
		border: none;
	}
	.contenido_popup{
		display: none;
	}
	@media (min-width: 768px){
		.modal-dialog {
			width: 530px;
			margin: 30px auto;
		}		
	}

	.titulo_form_contacto{
		color: #0481c6;
		text-align:center;
		font-size: 24px;
	}

</style>




<script type="text/javascript">
	jQuery("#form_contacto_general").validate({
		rules: {
			tipo: 'required',
			nombre: 'required',
			rut: 'required',
			apellido: 'required',
			email: 'required',
			telefono: 'required',
			asunto: 'required',
		},
		errorPlacement: function(){
			jQuery('[data-toggle="tooltip"]').tooltip()
			return false; 
		},
		submitHandler: function(form, e) {
			jQuery.ajax({
				type: 'POST',
				url: 'index.php?option=com_ajax&module=pd_popup_registro&method=enviar_correo_contacto&format=debug',
				data: jQuery("#form_contacto_general").serialize(),
				success: function(response){
					alert(response);
					location.reload();	
				}
			});
		}
	});

// El popup esta en el header del sitio
	jQuery(document).ready(function(){
		jQuery(".boton_popup_home").unbind('click').click(function(){
			jQuery("#popup_contacto").modal("show");
		});
	});






</script>

