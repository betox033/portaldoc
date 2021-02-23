<?php 



defined('_JEXEC') or die;



?>







<style type="text/css">
	input[type=text]:focus{
		outline: 1.5px solid #0081c6;     /* oranges! yey */
	}
	.module-content ul li::before{
		content: "•";
		font-size: 20px;
		margin-right: 7px;
	}
	.module-content ul li{
		line-height: 130%;
	}
	.titulo_contenido{
		margin-top: 30px;
		margin-bottom: -10px;
		color: #0481c6;
		font-size: 24px;
		font-weight: 700;
	}
	@media (min-width: 768px){
		.navbar-right {
			float: right!important;
			margin-right: 0px; 
		}		
	}
	.page-header h2{
		font-size: 24px;
	}
	.item-106{
		width: 18vw;
	}
	.item-101, .item-174, .item-102, .item-103, .item-104{
		width: 9vw;
	}
	.nav>li>a>img{
		width: 20px !important;
		margin-right: 12px !important;
	}
	.item-page{
		font-size: 16px;
		font-weight: 300;
	}
	body section {
		padding-top: 120px !important;
	}
	.article-info, .item-page .icons,.pager.pagenav{
		display: none;
	}
	.btn_contenido{
		display: inline-block;
		font-size: 17px;
		padding: 7px !important;
		padding-left: 15px !important;
		padding-right: 15px !important;
	}
	.btn_pd{
		font-size: 16px;
		font-weight: 500;
		text-transform: uppercase;
		text-align: center;
		padding:10px;
		padding-left: 20px;
		padding-right: 20px;
		transition: .3s;
		cursor: pointer;
		display: inline-block;
	}
	.btn_pd_verde{
		background-color: #94bb1e;
		font-size: 16px;
		font-weight: 500px;
		text-transform: uppercase;
		color: white;
		text-align: center;
		padding: 10px;
		border-radius: 4px;
		transition: .3s;
		cursor: pointer;
	}
	.btn_pd_verde:hover{
		background-color: #79981a;
	}
	.boton_registro{
		background-color: #94bb1e !important;
		/*padding-left: 30px !important;
		padding-right: 30px !important;*/
		transition: .3s;
	}
	.boton_registro:hover{
		background-color: #789818 !important;
	}
	.navbar-default .navbar-nav>li>a{
		color: white !important;
		padding: 0px;
		padding-left: 10px;
		padding-right: 10px;
		line-height: 40px !important;
		text-align: center;
		font-size: 1.13vw;
	}
	.navbar-default{
		border: none;
	}
	.navbar .navbar-nav{
		position: absolute;
		right: 0px;
		/*background-color: rgba(0,177,238, .7);*/
		background-color: #0081c6;
		transition: .3s;
		top: 28%;
		padding-right: 8vw;
	}
	@media(min-width: 990px){
		.menunav li:hover, 	.navbar .navbar-nav{
			border-top-left-radius: 7px;
			border-bottom-left-radius: 7px;
		}
	}
	.navbar.miniatura .navbar-nav{
		/*background-color: rgba(0,177,238, 1);*/
		background-color: #0081c6;
	}
	.navbar.miniatura .nav-item .nav-link{
		padding: 7px;
	}
	.navbar{
		background-color: rgba(255,255,255,.93);
		position: fixed;
		top: 32px;
		width: 100%;
		z-index: 20;
		height: 85px;
		transition: .3s;
	}
	.navbar.miniatura{
		background-color: white;
		height: 50px;
		top: 32px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.3);
	}
	.navbar.miniatura .navbar-nav{
		top: 15%;
	}
	.navbar.miniatura .navbar-nav>li>a{
		line-height: 39px !important;
	}
	.nav-item .nav-link, .dropdown-item{
		color: white !important;
	}
	.menunav li{
		transition:.3s;
	}
	.menunav li:hover,.navbar-default .navbar-nav>.open>a{
		background-color: rgba(0,79,111,.7) !important;
	}
	.nav-item{
		margin-left: 5px;
		margin-right: 5px;
	}
	.navbar-nav .dropdown-menu{
		background-color: rgba(0,79,111,.7);
		transition: .3s;
		border-radius: 0px;
		margin-top: -1px;
	}
	.dropdown-item:hover{
		background-color: rgba(0,79,111,9);
	}
	.dropdown-menu>li>a{
		color: white;
	}
	.cuadro_header{
		overflow: hidden;
	}
	.cuadro_botones{
		overflow: hidden;
		float: right;
	}
	.btn_header{
		transition: .3s;
		color: white;
		padding: 10px;
		font-size: 11px;
		float: right;
		margin-right: 1px;
	}
	.btn_header img{
		width: 20px;
		height: 20px;
		margin-right: 5px;
	}
	<?php for($k=0; $k<count($pdheader_lista_botones['texto']); $k++){ ?>
		.btn_header_<?php echo($k); ?>{
			background-color: <?php echo($pdheader_lista_botones['color'][$k]); ?>;
		}
		.btn_header_<?php echo($k); ?>:hover{
			background-color: <?php echo($pdheader_lista_botones['color_hover'][$k]); ?>;
		}
	<?php } ?>
	.cuadro_header .logo_principal{
		width: 20vw;
		position: fixed;
		z-index: 48;
		top: 44px;
		left: 75px;
		transition: .3s;
	}
	.cuadro_header .logo_principal.miniatura{
		top: 13px;
	}
	.dropdown.open .dropdown-menu{
		max-height: 2000px;
	}
	@media(max-width: 990px){
		.navbar-default .navbar-nav .open .dropdown-menu>li>a{
			color: white;
		}
		.cuadro_header .logo_principal{
			left: 11%;
			width: 290px;
			top: 50px;
		}
		.cuadro_header .logo_principal.miniatura{
			top: 44px;
			width: 185px;
			left: 25%;
		}
		.navbar .navbar-nav{
			width: 100vw;
			top: 70px;
			left: 0px;
			padding-right: 0px;
			position: inherit;
		}
		.item-101, .item-174, .item-102, .item-103, .item-104{
			width: 100%;
		}
		.navbar-default .navbar-nav>li>a{
			text-align: left;
			padding-left: 15px !important;
			font-size: 15px;
		}
		.item-106{
			width: 100%;
			display: none !important;
		}
		.navbar-toggle{
			margin-top: 47px !important;
			padding: 11px !important;
			transition: .3s;
			float: left;
			margin-left: 0px;
		}
		.navbar-toggle.miniatura{
			margin-top: 6px !important;
		}
		.titulo_contenido{
			margin-left: 10px;
		}
		.navbar-default .navbar-collapse{
			margin-top: 14px;
			width: 48vw;
			overflow-x: hidden;
		}
		.navbar-default.miniatura .navbar-collapse{
			margin-top: 21px;
		}
		.menunav li{
			border-bottom: 1px solid rgba(255,255,255,.5);
		} 
		.navbar-nav .open .dropdown-menu>li>a{
			padding: 10px 15px 10px 15px;
		}
	}
	@media(min-width: 760px) and (max-width: 1000px){
		.navbar .navbar-nav{
			position: fixed;
			top: 145px;
			max-height: 0px;
    		opacity: 0;
    		/*overflow: hidden;*/
    		width: 30%;
		}
		.navbar .navbar-nav.mostrar{
			max-height: none;
			opacity: 1;
		}
		.navbar.miniatura .navbar-nav{
			top: 110px;
		}
		.navbar-default .navbar-toggle{
			position: fixed;
    		top: 20px;
    		left: 20px;
    		z-index: 5;
    		display: inherit;
		}
		.navbar-toggle.miniatura{
			margin-top: 23px !important;
		}
		.cuadro_banner_video video{
			margin-left: 0px !important;
			width: 100%;
		}
	}
</style>




<div class="container cuadro_header">
	<a href="<?php echo JURI::base(); ?>">
		<img src="<?php echo($pdheader_logo_principal); ?>" class="logo_principal">
	</a>

<!--
	<div class="cuadro_botones">
		<?php for($k=0; $k<count($pdheader_lista_botones['texto']); $k++){ ?>
			<div class="btn_header btn_header_<?php echo($k); ?>">
				<img src="<?php echo($pdheader_lista_botones['icono'][$k]); ?>">
				<span><?php echo($pdheader_lista_botones['texto'][$k]); ?></span>
			</div>
		<?php } ?>
	</div>
-->
</div>


<script type="text/javascript">
	jQuery(window).scroll(function() {
		if (jQuery(document).scrollTop() > 50) {
			jQuery(".navbar").addClass("miniatura");
			jQuery(".logo_principal").addClass("miniatura");
			jQuery(".navbar-toggle").addClass("miniatura");
		}else {
			jQuery(".navbar").removeClass("miniatura");
			jQuery(".logo_principal").removeClass("miniatura");
			jQuery(".navbar-toggle").removeClass("miniatura");
		}
	});

	jQuery(document).ready(function(){
		jQuery(".dropdown-toggle").click(function(){
			jQuery(".cuadro_pasos").removeClass("mostrar");
		});
	});

/*

	function setOcultarCarroMin(){

		$(document).unbind('click').click(function(e){

			var ocultar_flt = true;

			if($(e.target).hasClass("btn-delete-product-min-view") || 

				$(e.target).hasClass("btn-delete-product-min-view-icono") ||

				$(e.target).is('#icono-carro') ||

				$(e.target).is('#ver-costo-transporte')){

				ocultar_flt = false;

		}



		if(ocultar_flt == true){

			$(".carro-flt").removeClass("active");

			$(".triangulo-carro-min-view").removeClass("active");

		}





		if($(e.target).is('#login-37') || $(e.target).is('#login-38') ||$(e.target).is('#login-39')){

			$(".cuadro-negro").css("max-height", 200);

		}else{

			$(".cuadro-negro").css("max-height", 0);

		}

	});

	}

	*/



</script>