<script type="text/javascript">
	var codigo_portal = '<?php echo($medico["17"]); ?>';
	var arreglo_servicios = new Array();

	jQuery.get('https://app.portaldoc.com/api/rol/allow/' + codigo_portal, function(data){
		console.log("TOKEN: " + data.Token);
		var token = data.Token;
		jQuery.ajax({
			beforeSend: function (xhr) {
				xhr.setRequestHeader('Accept', 'application/json');
				xhr.setRequestHeader('R', token);
			},
			url: 'https://app.portaldoc.com/api/rol/svc'
		}).done(function(data){ 
			var lista_servicios = data;

			jQuery.each(lista_servicios, function(i, val) {
				var id_servicio = val['ServicioId']; var nm_servicio = val['Nombre'];
				var item_servicio = {'id': id_servicio,'nm': nm_servicio,'arreglo' : new Array()};
				arreglo_servicios.push(item_servicio);

				jQuery.ajax({
					beforeSend: function (xhr) {
						xhr.setRequestHeader('Accept', 'application/json');
						xhr.setRequestHeader('R', token );
					},
					url: 'https://app.portaldoc.com/api/rol/esp/' + id_servicio
				}).done(function(data){
					var lista_esp = data;

					jQuery.each(lista_esp, function(j, val){
						var id_esp = val['EspecialidadId']; var nm_esp = val['Nombre'];
						var item_esp = {'id': id_esp, 'nm': nm_esp};
						arreglo_servicios[i].arreglo.push(item_esp);

						jQuery.ajax({
							beforeSend: function (xhr) {
								xhr.setRequestHeader('Accept', 'application/json');
								xhr.setRequestHeader('R', token );
							},
							url: 'https://app.portaldoc.com/api/rol/usr/' + id_servicio + '/' + id_esp
						}).done(function(data){ 
							//console.log(data);
							//alert(data[0]['Id']);
							if(data[0]['Id']){
								jQuery("input[name=cod_med_sm]").val(data[0]['Id']);
							}	
						});
					});
					

					var texto = armar_select_portal(arreglo_servicios);
					jQuery(".contenido_sm").html(texto);
					jQuery(".btn_agenda_aqui").css("opacity", 1);
					jQuery(".overlay_cargando").remove();
					
				});		
			});
		});
	});	



	function armar_select_portal(arreglo_servicios){
		var texto = "<select name='codigo_portal' class='select_servicio' required>";
		texto = texto + "<option selected value=''>-- Seleccione un servicio --</option>";
		for(var servicio of arreglo_servicios){
			texto = texto + "<optgroup label='" + servicio['nm'] + "'>";
			//alert("SERVICIO: " + servicio['nm'] + "\n" + JSON.stringify(servicio['arreglo']));
			for(var esp of servicio['arreglo']){
				texto = texto + "<option value='" + servicio['id'] + ";" + esp['id'] +"'>" + esp['nm'] + "</option>";
			}
			texto = texto + "</optgroup>";
		}
		texto = texto + "</select>";

		return texto;
	}


	
</script>