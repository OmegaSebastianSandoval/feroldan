<section id="<?php echo $contenedor->contenido_id ?>" class="contenedor-seccion contenedor-seccion-<?php echo $contenedor->contenido_id ?>" style="background-image:url(/images/<?php echo $contenedor->contenido_fondo_imagen; ?>); background-color:<?php echo $contenedor->contenido_fondo_color ?>;">

	<div class="<?php if ($contenedor->contenido_columna_espacios == 3 || $contenedor->contenido_columna_espacios == 4) { ?> container<?php } ?>">
		<?php if ($contenedor->contenido_titulo_ver == 1) { ?>
			<h2 class="text-center"><?php echo $contenedor->contenido_titulo; ?></h2>
		<?php } ?>
		<?php if ($contenedor->contenido_descripcion) { ?>
			<div class="descripcion-seccion"><?php echo $contenedor->contenido_descripcion; ?></div>
		<?php } ?>

		<?php if (count($rescontenido['hijos']) > 0) { ?>
			<div class="row  row_<?php echo $contenedor->contenido_id ?> <?php if ($contenedor->contenido_columna_alineacion == 2) { ?>justify-content-center <?php } else if ($contenedor->contenido_columna_alineacion == 3) { ?> justify-content-end  <?php } else { ?> justify-content-start <?php } ?> <?php if ($contenedor->contenido_columna_espacios == 2 || $contenedor->contenido_columna_espacios == 4) { ?> no-gutters <?php } ?>  <?php if ($contenedor->contenido_padre == 1) { ?> justify-content-center <?php } ?>">

				<?php foreach ($rescontenido['hijos'] as $key => $rescolumna) : ?>
					<?php $columna = $rescolumna['detalle']; ?>
					<div class="<?php if ($columna->contenido_padre == 6) { ?> col-12 <?php } else {
																						echo $columna->contenido_columna;
																					} ?> seccion_padre_<?php echo $columna->contenido_padre; ?>">
						<?php if ($columna->contenido_tipo == 5) { ?>
							<?php $contenido = $columna; ?>
							<?php if ($columna->contenido_disenio == 1) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio1.php"); ?>
							<?php } else if ($columna->contenido_disenio == 2) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio2.php"); ?>
							<?php } else if ($columna->contenido_disenio == 3) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio3.php"); ?>
							<?php } else if ($columna->contenido_disenio == 4) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio4.php"); ?>
							<?php } else if ($columna->contenido_disenio == 5) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio5.php"); ?>
							<?php } else if ($columna->contenido_disenio == 6) { ?>
								<?php include(APP_PATH . "modules/page/Views/template/disenio6.php"); ?>
							<?php } ?>
						<?php } else if ($columna->contenido_tipo == 6) { ?>
							<?php $carrousel = $rescolumna['hijos']; ?>
							<?php if ($columna->contenido_disenio == 1) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio1.php"; ?>
							<?php } else if ($columna->contenido_disenio == 2) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio2.php"; ?>
							<?php } else if ($columna->contenido_disenio == 3) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio3.php"; ?>
							<?php } else if ($columna->contenido_disenio == 4) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio4.php"; ?>
							<?php } else if ($columna->contenido_disenio == 5) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio5.php"; ?>
							<?php } else if ($columna->contenido_disenio == 6) { ?>
								<?php $disenio = APP_PATH . "modules/page/Views/template/disenio6.php"; ?>
							<?php } ?>
							<div class="<?php if ($columna->contenido_columna_espacios == 1 || $columna->contenido_columna_espacios == 3) { ?>con-espacios<?php } ?>">
								<?php include(APP_PATH . "modules/page/Views/template/carrousel.php"); ?>
							</div>
						<?php } else if ($columna->contenido_tipo == 7) { ?>
							<?php $acordioncontent = $rescolumna['hijos']; ?>
							<?php include(APP_PATH . "modules/page/Views/template/acordion.php"); ?>
						<?php } ?>

					</div>

				<?php endforeach ?>

			</div>
		<?php } ?>
	</div>

</section>