<?php 

defined('_JEXEC') or die;

 ?>


<style type="text/css">
	.btn_subir{
		position: fixed;
		bottom: 20px;
		right: 10px;
		width: 50px;
		cursor: pointer;
		transition: .3s;
		z-index: 20;
	}
	.back-to-top{
		display: none !important;
	}
	html {
  		scroll-behavior: smooth;
	}
</style>



<img src="<?php echo($pdbtnup_imagen); ?>" class="btn_subir">

<script type="text/javascript">
	jQuery(".btn_subir").unbind('click').click(function(){
		window.scrollTo(0, 0);
	});
	jQuery(window).scroll(function() {
		if (jQuery(document).scrollTop() > 150) {
			jQuery('.btn_subir').css("opacity", 1);
		}
		else {
			jQuery('.btn_subir').css("opacity", 0);
		}
	});
</script>


