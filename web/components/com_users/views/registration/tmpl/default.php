<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

?>


<style type="text/css">

	#main #container{
		background-color: transparent;
	}
	.well{
		background-color: transparent;
		border: none;
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	#jform_spacer-lbl, legend,.control-group.field-spacer, .control-group .control-label{
		display: none;
	}
	.titulo_reg_page{
		color: #0481c6;
		font-size: 24px;
		font-weight: bold;
		margin-bottom: 7px;
		text-align: center;
	}
	.parrafo_reg_page{
		font-size: 17px;
		line-height: 120%;
		margin-bottom: 5px;
		text-align: justify;
	}
	#member-registration input[type=text],
	#member-registration input[type=password],
	#member-registration input[type=email],
	#member-registration select{
		width: 100%;
		padding: 7px;
		font-size: 14px;
		border: 1.5px solid #cecece;
		background-color: transparent;
	}
	#system-message-container{
		position: absolute;
	}
	#system-message-container .alert-danger{
		background-color: rgba(235,204,209,.9);
	}
	.control-group{
		margin-bottom: 10px;
	}
</style>

<div class="fondo_registro">

	<div class="registration<?php echo $this->pageclass_sfx; ?>">
		<?php if ($this->params->get('show_page_heading')) : ?>
			<div class="page-header">
				<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
			</div>
		<?php endif; ?>


		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-5">

			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 columna_registro">
				<div class="titulo_reg_page">
					<span>Registro de Usuarios Portal DOC.</span>
				</div>
				<div class="parrafo_reg_page">
					<span>Si eres médico especialista o profesional de la salud, Registrate
						y enviaremos información de nuestros planes y servicios.
					Te esperamos!</span>
				</div>
				<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal well" enctype="multipart/form-data">
					<?php // Iterate through the form fieldsets and display each one. ?>
					<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
						<?php $fields = $this->form->getFieldset($fieldset->name); ?>
						<?php if (count($fields)) : ?>
							<fieldset>
								<?php // If the fieldset has a label set, display it as the legend. ?>
								<?php if (isset($fieldset->label)) : ?>
									<legend><?php //echo JText::_($fieldset->label); ?></legend>
								<?php endif; ?>
								<?php echo $this->form->renderFieldset($fieldset->name); ?>
							</fieldset>
						<?php endif; ?>
					<?php endforeach; ?>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-primary validate">
								<?php echo JText::_('JREGISTER'); ?>
							</button>
							<a class="btn" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>">
								<?php echo JText::_('JCANCEL'); ?>
							</a>
							<input type="hidden" name="option" value="com_users" />
							<input type="hidden" name="task" value="registration.register" />
						</div>
					</div>
					<?php echo JHtml::_('form.token'); ?>
				</form>			
			</div>
		</div>





	</div>	
</div>


