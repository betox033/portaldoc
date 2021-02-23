<?php
/*------------------------------------------------------------------------
# author Gonzalo Suez
# copyright Copyright © 2013 gsuez.cl. All rights reserved.
# @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website http://www.gsuez.cl
-------------------------------------------------------------------------*/	// no direct access
defined('_JEXEC') or die;
include 'includes/params.php';
if ($params->get('compile_sass', '0') === '1')
{
	require_once "includes/sass.php";
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<?php
include 'includes/head.php'; ?>
<!-- Modal -->
<div class="modal fade" id="popup_pd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>


<div class="modal fade" id="popup_contacto" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="btn_cerrar" data-dismiss="modal" aria-label="Close">
				<i class="fa fa-close" style="color: lightgrey"></i>
			</div>
			<div class="titulo_form_contacto">
				<strong>Formulario de Contacto</strong>
			</div>
			
			<div style="font-weight: 100; line-height: 120%; font-size: 15px;margin-top: 15px;margin-bottom: 15px;">
				<span>Por favor complete el siguiente formulario y le responderemos a la brevedad</span>
			</div>

			<form id="form_contacto_general">
				<input type="radio" name="tipo" value="Paciente" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">
				<span>Contacto Paciente</span>
				<input type="radio" name="tipo" value="Médico" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">
				<span>Contacto Médico</span>
				<input type="radio" name="tipo" value="Empresa" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">
				<span>Contacto Empresa</span>
				<div style="height: 18px;"></div>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<input type="text" name="nombre" placeholder="Nombre"
						data-toggle="tooltip" title="Debe ingresar un Nombre">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<input type="text" name="apellido" placeholder="Apellidos"
						data-toggle="tooltip" title="Debe ingresar al menos un apellido">
					</div>
				</div>
				<input type="text" name="rut" placeholder="RUT sin puntos ni guión"
				data-toggle="tooltip" title="Debe ingresar un RUT">
				<input type="text" name="email" placeholder="Email" data-toggle="tooltip" title="Debe ingresar un email">
				<input type="text" name="telefono" placeholder="Teléfono" data-toggle="tooltip" title="Debe ingresar un teléfono">
				<select name="asunto" data-toggle="tooltip" title="Asunto"
				data-toggle="tooltip" title="Debe ingresar un asunto">
					<option disabled selected value="">-- Seleccione un asunto --</option>
					<option value="Consulta">Consulta</option>
					<option value="Sugerencia">Sugerencia</option>
					<option value="Cotización">Cotización</option>
				</select>
				<textarea name="mensaje" placeholder="Mensaje"></textarea>

				<div style="position: relative;margin-top: 20px;margin-bottom: 10px">
					<button type="submit" class="btn_enviar_registro">
						<span>ENVIAR</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>



<body>

<style type="text/css">
	body section{
		padding-top: 0px;
	}
	#top{
		padding: 0px;
	}
</style>


	<?php
	if($layout=='boxed'){ ?>
		<div class="layout-boxed">
		<?php  } ?>
		<div id="wrap">
			<!--Navigation-->
			<header id="header" class="header header--fixed hide-from-print" >
				<!--top-->
				<?php  if($this->countModules('top')) : ?>
					<div id="top" class="navbar-inverse">
						<div class="container">
							<div class="row">
								<jdoc:include type="modules" name="top" style="none" />
							</div>
						</div>
					</div>
				<?php  endif; ?>
				<!--top-->
				<div id="navigation">
					<div class="navbar navbar-default">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<!--
								<div id="brand">
									<a href="<?php  echo $this->params->get('logo_link')   ?>">
										<img style="width:<?php  echo $this->params->get('logo_width')   ?>px; height:<?php  echo $this->params->get('logo_height')   ?>px; " src="<?php  echo $this->params->get('logo_file')   ?>" alt="Logo" />
									</a>
								</div>
							-->
							</div>
							<div class="navbar-collapse collapse">
								<?php  if ($this->countModules('navigation')) : ?>
									<nav class="navigation">
										<jdoc:include type="modules" name="navigation" style="none" />
									</nav>
								<?php  endif; ?>
							</div>
						</div>
					</div></div>
				</header>
				<div class="clearfix"></div>
				<!--Navigation-->
				<section>
					<!--fullwidth-->
					<?php  if($this->countModules('fullwidth')) : ?>
						<div id="fullwidth">
							<div class="row">
								<jdoc:include type="modules" name="fullwidth" style="block"/>
							</div>
						</div>
					<?php  endif; ?>
					<!--fullwidth-->
					<!--Showcase-->
					<?php  if($this->countModules('showcase')) : ?>
						<div id="showcase">
							<div class="container">
								<div class="row">
									<jdoc:include type="modules" name="showcase" style="block"/>
								</div>
							</div>
						</div>
					<?php  endif; ?>
					<!--Showcase-->
					<!--Feature-->
					<?php  if($this->countModules('feature')) : ?>
						<div id="feature">
							<div class="container">
								<div class="row">
									<jdoc:include type="modules" name="feature" style="block" />
								</div>
							</div>
						</div>
					<?php  endif; ?>
					<!--Feature-->
					<!--Breadcrumb-->
					<?php  if($this->countModules('breadcrumbs')) : ?>
						<div id="breadcrumbs">
							<div class="container">
								<div class="row">
									<jdoc:include type="modules" name="breadcrumbs" style="block" />
								</div>
							</div>
						</div>
						<!--Breadcrumb-->
					<?php  endif; ?>
					<!-- Content -->
					<div class="container">
						<div id="main" class="row show-grid">
							<!-- Left -->
							<?php  if($this->countModules('left')) : ?>
								<div id="sidebar" class="col-sm-<?php  echo $leftcolgrid; ?>">
									<jdoc:include type="modules" name="left" style="block" />
								</div>
							<?php  endif; ?>
							<!-- Component -->
							<div id="container" class="col-sm-<?php  echo (12-$leftcolgrid-$rightcolgrid); ?>">
								<!-- Content-top Module Position -->
								<?php  if($this->countModules('content-top')) : ?>
									<div id="content-top">
										<div class="row">
											<jdoc:include type="modules" name="content-top" style="block" />
										</div>
									</div>
								<?php  endif; ?>
								<!-- Front page show or hide -->
								<?php
								$app = JFactory::getApplication();
								$menu = $app->getMenu();
								if ($frontpageshow){
		// show on all pages
									?>
									<div id="main-box">
										<jdoc:include type="message" />
										<jdoc:include type="component" />
									</div>
									<?php
								} else {
									if ($menu->getActive() !== $menu->getDefault()) {
			// show on all pages but the default page
										?>
										<div id="main-box">
											<jdoc:include type="component" />
										</div>
										<?php
									}} ?>
									<!-- Front page show or hide -->
									<!-- Below Content Module Position -->
									<?php  if($this->countModules('content-bottom')) : ?>
										<div id="content-bottom">
											<div class="row">
												<jdoc:include type="modules" name="content-bottom" style="block" />
											</div>
										</div>
									<?php  endif; ?>
								</div>
								<!-- Right -->
								<?php  if($this->countModules('right')) : ?>
									<div id="sidebar-2" class="col-sm-<?php  echo $rightcolgrid; ?>">
										<jdoc:include type="modules" name="right" style="block" />
									</div>
								<?php  endif; ?>
							</div>
						</div>
						<!-- Content -->
						<!-- bottom -->
						<?php  if($this->countModules('bottom')) : ?>
							<div id="bottom">
								<div class="container">
									<div class="row">
										<jdoc:include type="modules" name="bottom" style="block" />
									</div>
								</div>
							</div>
						<?php  endif; ?>
						<!-- bottom -->
						<!-- footer -->
						<?php  if($this->countModules('footer')) : ?>
							<jdoc:include type="modules" name="footer" style="block" />
	<!--
<div id="footer">
<div class="container">
<div class="row">

</div>
</div>
</div>-->
<?php  endif; ?>
<!-- footer -->
<!--<div id="push"></div>-->
<!-- copy -->
<?php  if($this->countModules('copy')) : ?>
	<div id="copy"  class="well">
		<div class="container">
			<div class="row">
				<jdoc:include type="modules" name="copy" style="block" />
			</div>
		</div>
	</div>
<?php  endif; ?>
<!-- copy -->
<!-- menu slide -->
<?php  if($this->countModules('panelnav')): ?>
	<div id="panelnav">
		<jdoc:include type="modules" name="panelnav" style="none" />
	</div><!-- end panelnav -->
<?php  endif;// end panelnav  ?>
<!-- menu slide -->
<a href="#" class="back-to-top">Back to Top</a>
<jdoc:include type="modules" name="debug" />
</section></div>
<?php
if($layout=='boxed'){ ?>
</div>
<?php  } ?>
<!-- page -->
<!-- JS -->
<?php $doc->addScript('templates/' . $this->template . '/js/template.min.js'); ?>
<!-- JS -->
</body>
</html>
