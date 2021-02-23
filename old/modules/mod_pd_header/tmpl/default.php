<?php 

defined('_JEXEC') or die;

 ?>



<style type="text/css">
	.navbar-default .navbar-nav>li>a{
		color: white !important;
		padding: 0px;
		padding-left: 30px;
		padding-right: 30px;
		line-height: 47px !important;
	}
	.navbar-default{
		border: none;
	}
	.navbar .navbar-nav{
		position: absolute;
		right: 0px;
		background-color: rgba(0,177,238, .7);
		transition: .3s;
		top: 28%;
	}
	.navbar.miniatura .navbar-nav{
		background-color: rgba(0,177,238, 1);
	}
	.navbar.miniatura .nav-item .nav-link{
		padding: 7px;
	}

	.navbar{
		background-color: rgba(255,255,255,.4);
		position: fixed;
		top: 45px;
		width: 100%;
		z-index: 20;
		height: 100px;
		transition: .3s;
	}
	.navbar.miniatura{
		background-color: white;
		height: 50px;
		top: 35px;
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
		width: 270px;
		position: fixed;
		z-index: 500;
		top: 70px;
		left: 75px;
		transition: .3s;
	}
	.cuadro_header .logo_principal.miniatura{
		top: 16px;

	}

	
</style>




<div class="container cuadro_header">
	<img src="<?php echo($pdheader_logo_principal); ?>" class="logo_principal">

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
		if (jQuery(document).scrollTop() > 100) {
			jQuery(".navbar").addClass("miniatura");
			jQuery(".logo_principal").addClass("miniatura");
			jQuery(".cuadro_top_header").addClass("miniatura");
		}
		else {
			jQuery(".navbar").removeClass("miniatura");
			jQuery(".logo_principal").removeClass("miniatura");
			jQuery(".cuadro_top_header").removeClass("miniatura");
		}
	});

</script>