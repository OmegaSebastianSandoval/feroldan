<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->contacto_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->contacto_id; ?>" />
			<?php }?>
			<div class="row">
		<div class="col-12 form-group">
			<label   class="control-label">Activar</label>
				<input type="checkbox" name="contacto_estado" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'contacto_estado') == 1) { echo "checked";} ?>  required ></input>
				<div class="help-block with-errors"></div>
		</div>
				<div class="col-4 form-group">
					<label for="contacto_cargo"  class="control-label">Cargo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contacto_cargo; ?>" name="contacto_cargo" id="contacto_cargo" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="contacto_correo"  class="control-label">Correo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contacto_correo; ?>" name="contacto_correo" id="contacto_correo" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="contacto_telefono"  class="control-label">Telefono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->contacto_telefono; ?>" name="contacto_telefono" id="contacto_telefono" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>