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

		margin-left: 0px;

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
	var Fn = {
		validaRut : function (rutCompleto) {
			rutCompleto = rutCompleto.replace("‐","-");
			if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
				return false;
			var tmp 	= rutCompleto.split('-');
			var digv	= tmp[1]; 
			var rut 	= tmp[0];
			if ( digv == 'K' ) digv = 'k' ;

			return (Fn.dv(rut) == digv );
		},
		dv : function(T){
			var M=0,S=1;
			for(;T;T=Math.floor(T/10))
				S=(S+T%10*(9-M++%6))%11;
			return S?S-1:'k';
		}
	}
	function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

	jQuery("#form_contacto_general").validate({
		rules: {
			tipo: 'required',
			nombre: {
				required: true,
				minlength: 4,
			},
			rut: 'required',
			apellido: {
				required: true,
				minlength: 4,
			},
			email: 'required',
			telefono: {
				required: true,
				minlength: 9,
				maxlength: 9,
			},
			asunto: 'required',
		},
		errorPlacement: function(){
			jQuery('[data-toggle="tooltip"]').tooltip()
			return false; 
		},
		submitHandler: function(form, e) {
			var error_validacion = false;
			var input_rut = jQuery("#form_contacto_general .input_rut_formato"); 
			var validaRut = Fn.validaRut(input_rut.val());

        	if(validaRut == false){
        		input_rut.attr('title', "El RUT ingresado no es válido");
        		input_rut.attr('data-original-title', "El RUT ingresado no es válido");
        		jQuery('[data-toggle="tooltip"]').tooltip(); input_rut.focus(); error_validacion = true;
        	}

        	var input_email = jQuery("#form_contacto_general .input_email"); 
        	var validar_email = isEmail(input_email.val());

        	if(validar_email == false){
        		input_email.attr('title', "El email ingresado no es válido");
        		input_email.attr('data-original-title', "El email ingresado no es válido");
        		jQuery('[data-toggle="tooltip"]').tooltip(); input_email.focus(); error_validacion = true;       		
        	}

        	var input_telefono =  jQuery("#form_contacto_general .input_telefono").val();
        	if(input_telefono[0] != "9"){
        		alert("El primer dígito del teléfono debe ser un 9.");
        		error_validacion = true; 
        	}

        	if(error_validacion == false){
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

		}
	});


	jQuery(document).ready(function(){
		formatoFormularioRut();
		jQuery(".boton_popup_home").unbind('click').click(function(){
			jQuery("#popup_contacto").modal("show");
		});
		jQuery('.input_telefono').keypress(function(tecla) {
			if((tecla.charCode < 48 || tecla.charCode > 57)){
				return false;
			}
		});
		jQuery('.input_letras').keyup(function() {
			var $th = jQuery(this);
			$th.val( $th.val().replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ]/g, function(str) { 
				return ''; 
			} ) );
		});
	});

	function formatoFormularioRut(){
		jQuery('.input_rut_formato').keypress(function(tecla) {
			if((tecla.charCode < 48 || tecla.charCode > 57) && tecla.charCode != 107 && tecla.charCode != 75){
				return false;
			}
		});	
		jQuery(".input_rut_formato").focusout(function(){
			var texto_base = jQuery(this).val();
			if(texto_base != "" && texto_base != "-"){
				var texto_final = limpiarRut(texto_base);
				jQuery(this).val(texto_final);
			}
		});
		jQuery(".input_rut_formato").keyup(function(){
			var texto_base = jQuery(this).val();
			if(texto_base != "" && texto_base != "-"){
				var texto_final = limpiarRut(texto_base);
				jQuery(this).val(texto_final);
			}
		});	
	}

	function limpiarRut(texto_base){
		texto_base = texto_base.replace("-", "");
		texto_base = texto_base.replace(".", "");
		var rut_base = texto_base.substring(0,texto_base.length-1);
		var dv = texto_base[texto_base.length-1];
		var texto_final = rut_base + "-" + dv;
		return texto_final;
	}


</script>



