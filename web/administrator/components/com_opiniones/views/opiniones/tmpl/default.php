<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_opiniones&view=opiniones" method="post" id="adminForm" name="adminForm">
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th width="1%"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th width="3%">ID</th>
				<th width="5%">ID Médico</th>
				<th width="10%">Nombre</th>
				<th width="5%">ID Paciente</th>
				<th width="10%">Nombre</th>
				<th width="10%">Valoración</th>
				<th width="30%">Opinión</th>
				<th width="10%">Fecha</th>
				<th width="5%">Estado</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : 
					$link = JRoute::_('index.php?option=com_opiniones&task=opiniones.edit&id=' . $row->id);

					?>
					<tr>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td><?php echo($row->id) ?></td>
						<td><?php echo($row->id_medico_prof); ?></td>
						<td><?php echo($row->nombre . " " . $row->apellido); ?></td>
						<td><?php echo($row->id_paciente); ?></td>
						<td><?php echo($row->nombre_paciente . " " . $row->apellido_paciente); ?></td>
						<td>
							<?php for($k=0; $k<$row->valoracion; $k++){ ?>
								<i class="icon-star" style="color: #f5dc28"></i>
							<?php } ?>
						</td>
						<td><p align="justify"><?php echo($row->opinion); ?></p></td>
						<td><?php echo($row->fecha); ?></td>
						<td>
							<?php echo JHtml::_('jgrid.published', $row->estado, $i, 'opiniones.', false, 'cb'); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>

</form>