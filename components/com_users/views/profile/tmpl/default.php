<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<?php $usuario_general   = JFactory::getUser(); ?>

<div class="row">
	<div class="col-sm-12 col-md-6 col-lg-6">
		<div class="profile<?php echo $this->pageclass_sfx; ?>">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<div class="page-header">
					<h1>
						<?php echo $this->escape($this->params->get('page_heading')); ?>
					</h1>
				</div>
			<?php endif; ?>
			<?php if (JFactory::getUser()->id == $this->data->id) : ?>
				<ul class="btn-toolbar pull-right">
					<li class="btn-group">
						<a class="btn" href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
							<span class="icon-user"></span>
							<?php //echo JText::_('COM_USERS_EDIT_PROFILE'); ?>
							<span>Editar Usuario</span>
						</a>
					</li>
				</ul>
			<?php endif; ?>
			<?php echo $this->loadTemplate('core'); ?>
			<?php echo $this->loadTemplate('params'); ?>
			<?php echo $this->loadTemplate('custom'); ?>
		</div>		
	</div>

	<div class="col-sm-12 col-md-6 col-lg-6">
		<?php if ($usuario_general->tipo == "1" || $usuario_general->tipo == "2"){ ?>
			<a href="index.php?option=com_content&view=article&id=7">
				<div class="btn_pd_verde" style="width: 250px">
					<span>Editar perfil público</span>
				</div>			
			</a>
		<?php }else{?>
			<div class="cuadro_paciente">
				
			</div>
		<?php } ?>
	</div>
	
</div>






