<div class="col-sm-12 col-md-6 col-lg-6">
	<?php if($page_contenido_imagen){ ?>
		<div class="cuadro_imagen">
			<img src="<?php echo($page_contenido_imagen); ?>">
			<?php if($page_contenido_option_cf){ ?>
				<div class="overlay_contenido">
					<div class="contenido_flotante">
						<span><?php echo($page_contenido_conte); ?></span>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<div class="parrafo_derecho">
		<?php echo($page_contenido_parrafo_der); ?>
	</div>
</div>