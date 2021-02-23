<?php 

defined('_JEXEC') or die;

?>



<style type="text/css">
	.cuadro_regpage_general{
		position: relative;
		margin-top: 150px;
	}
	.c_contenido{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
	}
	.cuadro_regpage_general img{
		width: 100%;
	}
	#main{
		display: none;
	}
	.titulo_reg_page{
		color: #0481c6;
		font-size: 24px;
		font-weight: bold;
		margin-bottom: 7px;
	}
	.parrafo_reg_page{
		font-size: 17px;
		line-height: 120%;
		margin-bottom: 15px;
		text-align: justify;
	}

	#form_reg_page .input_pd{
		width: 100%;
		margin-bottom: 7px;
		background-color: transparent;
		border: 2px solid #888888;
		font-size: 17px;
		padding: 10px;
	}

	.btn_reg_page{
		background-color: #94bb1e;
		color: white;
		text-align: center;
		padding: 15px;
		padding-left: 50px;
		padding-right: 50px;
		transition: .3s;
		cursor: pointer;
		display: inline-block;
		border: none;
		text-transform: uppercase;
		font-size: 18px;
		float: right;

	}

</style>



<div class="cuadro_regpage_general">
	<img src="<?php echo($pd_regpage_img_fondo); ?>">
	<div class="c_contenido">
		<div style="height: 40px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-5">
					
				</div>
				<div class="col-sm-12 col-md-6 col-lg-5">
					<div>
						<div class="titulo_reg_page">
							<span>Registro Portal Doc</span>
						</div>
						<div class="parrafo_reg_page">
							<span>Si eres médico especialista o profesional de la salud, Registrate
								y enviaremos información de nuestros planes y servicios.
							Te esperamos!</span>
						</div>

						<form id="form_reg_page">
							<input type="text" name="nombre" class="input_pd" placeholder="Nombre y Apellidos">
							<input type="text" name="rut" class="input_pd" placeholder="RUT sin puntos ni guión">
							<input type="text" name="email" class="input_pd" placeholder="Email">
							<input type="text" name="telefono" class="input_pd" placeholder="Teléfono Móvil">
							<div style="height: 15px;"></div>
							<button type="submit" class="btn_reg_page">
								<span>enviar</span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>