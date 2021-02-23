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
<form action="index.php?option=com_intagendar&view=intagendar" method="post" id="adminForm" name="adminForm">
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
				<th width="15%">Nombre</th>
				<th width="5%">ID Usuario</th>
				<th width="15%">Nombre</th>
				<th width="10%">ROL SACMED</th>
				<th width="10%">Cod. Servicio SACMED</th>
				<th width="10%">Cod. especialidad SACMED</th>
				<th width="10%">Hora/Fecha</th>
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
					$link = JRoute::_('index.php?option=com_intagendar&task=intagendar.edit&id=' . $row->id);

					?>
					<tr>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td><?php echo($row->id) ?></td>
						<td><?php echo($row->id_medico); ?></td>
						<td><?php echo($row->nombre_medico . " " . $row->apellido_medico); ?></td>
						<td>
							<?php if($row->id_paciente){ ?>
								<?php echo($row->id_paciente); ?>
							<?php }else{ ?>
								-
							<?php } ?>
						</td>
						<td>
							<?php if($row->id_paciente){ ?>
								<?php echo($row->nombre_usuario . " " . $row->apellido_usuario); ?>
							<?php }else{ ?>
								<i>Usuario no registrado</i>
							<?php } ?>	
						</td>
						<td><?php echo($row->cod_sm_rol) ?></td>
						<td><?php echo($row->cod_sm_servicio); ?></td>
						<td><?php echo($row->cod_sm_esp); ?></td>
						<td><?php echo($row->fecha); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>

</form>