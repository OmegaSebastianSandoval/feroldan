<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->usuario_encuesta_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->usuario_encuesta_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-6 form-group">
					<label for="usuario_encuesta_documento"  class="control-label">documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->usuario_encuesta_documento; ?>" name="usuario_encuesta_documento" id="usuario_encuesta_documento" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="usuario_encuesta_nombre"  class="control-label">nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->usuario_encuesta_nombre; ?>" name="usuario_encuesta_nombre" id="usuario_encuesta_nombre" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="usuario_encuesta_encuesta"  value="<?php if($this->content->usuario_encuesta_encuesta){ echo $this->content->usuario_encuesta_encuesta; } else { echo $this->encuesta; } ?>">
				<input type="hidden" name="usuario_encuesta_fecha"  value="<?php echo $this->content->usuario_encuesta_fecha ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>?encuesta=<?php if($this->content->usuario_encuesta_encuesta){ echo $this->content->usuario_encuesta_encuesta; } else { echo $this->encuesta; } ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>