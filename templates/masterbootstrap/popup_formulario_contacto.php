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

				<span>Indique su Perfil</span>

				<div class="row">

					<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<input type="radio" name="tipo" value="Paciente" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">

						<span>Contacto Paciente</span>

					</div>

					<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<input type="radio" name="tipo" value="Médico" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">

						<span>Contacto Médico</span>

					</div>

					<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<input type="radio" name="tipo" value="Empresa" data-toggle="tooltip" title="Debe seleccionar un tipo de usuario">

						<span>Contacto Empresa</span>

					</div>

				</div>

				

				

				

				<div style="height: 18px;"></div>

				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<input type="text" name="nombre" placeholder="Nombre" class="input_letras"
						data-toggle="tooltip" title="Debe ingresar un Nombre, y debe tener al menos 4 carácteres">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<input type="text" name="apellido" placeholder="Apellidos" class="input_letras"
						data-toggle="tooltip" 
						title="Debe ingresar al menos un apellido, y debe tener al menos 4 carácteres">
					</div>
				</div>

				<input type="text" name="rut" placeholder="RUT sin puntos ni guión"
				class="input_rut_formato"
				data-toggle="tooltip" title="Debe ingresar un RUT">

				<input type="text" name="email" placeholder="Email" data-toggle="tooltip" 
				title="Debe ingresar un email" class="input_email">

				<input type="text" name="telefono" placeholder="Teléfono" data-toggle="tooltip" 
				title="Debe ingresar un teléfono. Debe tener 9 números" class="input_telefono">

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