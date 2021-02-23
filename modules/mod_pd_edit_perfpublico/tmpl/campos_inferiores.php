





		<div class="row">

			<div class="col-lg-3"></div>

			<div class="col-sm-12 col-md-12 col-lg-9">







				<div class="titulo_editor"><span>Formación Académica</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("formacion", "$usuario_general->formacion", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



				<div class="titulo_editor"><span>Experiencia</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("experiencia", "$usuario_general->experiencia", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



				<div class="titulo_editor"><span>Cursos de Actualización</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("cursos", "$usuario_general->cursos", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



				<div class="titulo_editor"><span>Docencia</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("docencia", "$usuario_general->docencia", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



				<div class="titulo_editor"><span>Publicaciones</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("publicaciones", "$usuario_general->publicaciones", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



				<div class="titulo_editor"><span>Actualidad</span></div>

				<?php $editor = JFactory::getEditor();

					echo $editor->display("actualidad", "$usuario_general->actualidad", "400", "100", "150", "10", 1, null, null, null, array('mode' => 'advanced'));   ?>



			</div>			

		</div>