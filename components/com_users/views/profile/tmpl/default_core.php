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
<fieldset id="users-profile-core">
	<legend>
		<?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
	</legend>
	<dl class="dl-horizontal">
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $this->escape($this->data->name . " " . $this->data->apellido); ?>
		</dd>
		<dt>
			<?php echo("RUT"); ?>
		</dt>
		<dd>
			<?php echo $this->escape($this->data->rut); ?>
		</dd>
		<dt>
			<?php echo("Telefono"); ?>
		</dt>
		<dd>
			<?php echo $this->escape($this->data->telefono); ?>
		</dd>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $this->escape($this->data->username); ?>
		</dd>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
		</dt>
		<dd>
			<?php echo JHtml::_('date', $this->data->registerDate, JText::_('DATE_FORMAT_LC1')); ?>
		</dd>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
		</dt>
		<?php if ($this->data->lastvisitDate != $this->db->getNullDate()) : ?>
			<dd>
				<?php echo JHtml::_('date', $this->data->lastvisitDate, JText::_('DATE_FORMAT_LC1')); ?>
			</dd>
		<?php else : ?>
			<dd>
				<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
			</dd>
		<?php endif; ?>
	</dl>
</fieldset>
