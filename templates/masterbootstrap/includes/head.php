<?php
 /*------------------------------------------------------------------------
# author    Gonzalo Suez
# Copyright © 2013 gsuez.cl. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.gsuez.cl
-------------------------------------------------------------------------*/// no direct access
defined('_JEXEC') or die;
JHtml::_('bootstrap.framework');
// Set HTML5 Document Output - thank you FabrizioG
$doc = JFactory::getDocument();
$doc->setHtml5(true);
?>
<?php
if(is_readable(JPATH_THEMES.'/'.$this->template.'/css/custom.css'))
{
	JFactory::getDocument()->addStylesheet(JURI::base().'templates/'.$this->template.'/css/custom.css');
}
?>
<head>
	<jdoc:include type="head" />

	
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<?php  if ($pie == 1) : ?>
			<style>
				{behavior:url(<?php  echo $tpath; ?>/js/PIE.htc);}
			</style>
		<?php  endif; ?>
	<![endif]-->


<?php
 if($layout=='boxed'){ ?>
<?php  $path= JURI::base().'templates/'.$this->template."/images/elements/pattern".$pattern.".png"; ?>
<style type="text/css">
 body {
    background: url("<?php  echo $path ; ?>") repeat fixed center top rgba(0, 0, 0, 0);
 }
</style>
  <?php  } ?>

  
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />



<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
<script src="owlcarousel/owl.carousel.min.js"></script>
</head>

<style type="text/css">
	/*
	body, input::placeholder, button, span, select, option{
		font-family: 'Fira Sans Condensed', sans-serif;
	}
	*/
</style>
