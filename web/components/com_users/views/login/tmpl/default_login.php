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
	section{
		background-image: url(images/sistema/fondo_login.jpg);
		background-size: cover;
	}
	#main #container{
		background-color: transparent;
	}
	.columna_right{
		background-color: rgba(255,255,255,1);
	}
	.alert-message{
		background-color: rgba(255,255,255,.5);
	}
	.well{
		background-color: transparent;
		border: none;
		margin-bottom: 0px;
	}
</style>

<div style="height: 30px"></div>


<div class="row">
	<div class="col-sm-12 col-md-6 col-lg-6"></div>
	<div class="col-sm-12 col-md-6 col-lg-5 columna_right">
		<div class="login<?php echo $this->pageclass_sfx; ?>">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<div class="page-header">
					<h1>
						<?php echo $this->escape($this->params->get('page_heading')); ?>
					</h1>
				</div>
			<?php endif; ?>
			<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
			<div class="login-description">
			<?php endif; ?>
			<?php if ($this->params->get('logindescription_show') == 1) : ?>
				<?php echo $this->params->get('login_description'); ?>
			<?php endif; ?>
			<?php if ($this->params->get('login_image') != '') : ?>
				<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JText::_('COM_USERS_LOGIN_IMAGE_ALT'); ?>" />
			<?php endif; ?>
			<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
		</div>
	<?php endif; ?>
	<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate form-horizontal well">
		<fieldset>
			<?php echo $this->form->renderFieldset('credentials'); ?>
			<?php if ($this->tfa) : ?>
				<?php echo $this->form->renderField('secretkey'); ?>
			<?php endif; ?>
			<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<div class="control-group">
					<div class="control-label">
						<label for="remember">
							<?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME'); ?>
						</label>
					</div>
					<div class="controls">
						<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes" />
					</div>
				</div>
			<?php endif; ?>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">
						<?php echo JText::_('JLOGIN'); ?>
					</button>
				</div>
			</div>
			<?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
			<input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
	</form>
</div>

<div>
	<ul class="nav nav-tabs nav-stacked">
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
				<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
				<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>
			</a>
		</li>
		<?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
		<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>		
</div>
</div>






