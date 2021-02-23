<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.cuadro_grey{
		background-color: lightgrey;
		height: 300px;
	}
	#content{
		display: none;
	}
  .carousel-item img{
    width: 100%;
  }

  #slider_main{
    height: 90vh;
    overflow: hidden;
  }

  .cuadro_buscar{
  	position: absolute;
  	background-color: rgba(255,255,255,.77);
  	bottom: 30px;
  	left: 2.5%;
  	width: 95%;
  	height: 77px;
  }
  .cuadro_mensaje{
  	position: absolute;
  	bottom: 150px;
  	left: 10%;
  	color: white;
  	background-color: rgba(0,93,180,.7);
  	font-size: 34px;
  	padding: 35px;
  	transition: .3s;
  }
  .cuadro_mensaje:hover{
  	background-color: rgba(0,93,180,.9);
  }
</style>


<div style="overflow: hidden; height: 90vh;position: relative">
<video  autoplay loop="loop" controls style="width: 100%;" id="video_home">
  <source src="images/video/video_slider_home.mp4" type="video/mp4">
  </video>  



<!--
<div class="cuadro_mensaje">
	<span>Médicos Especialistas y Profesionales de la Salud</span>
</div>
<div class="cuadro_buscar"></div>
-->



</div>




<script type="text/javascript">
jQuery(document).ready(function(){
	
    setTimeout(function() {
        jQuery("#video_home")[0].play();
    }, 3000);
});
	
</script>




  <!--
  <div id="slider_main" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#slider_main" data-slide-to="0" class="active"></li>
      <li data-target="#slider_main" data-slide-to="1"></li>
      <li data-target="#slider_main" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
     <?php for($k=0; $k<count($pd_slidermain['img']); $k++){ ?>
      <div class="carousel-item <?php if($k==0){echo('active');} ?>">
        <img class="d-block" src="<?php echo($pd_slidermain['img'][$k]); ?>" alt="">
      </div>  		
    <?php } ?>
    <div class="carousel-item">


    </div>
  </div>
  <a class="carousel-control-prev" href="#slider_main" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slider_main" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
-->