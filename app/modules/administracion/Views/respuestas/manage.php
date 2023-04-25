<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->respuesta_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->respuesta_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="respuesta_valor"  class="control-label">Valor</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->respuesta_valor; ?>" name="respuesta_valor" id="respuesta_valor" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">Pregunta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="respuesta_pregunta"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_respuesta_pregunta AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"respuesta_pregunta") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">respuesta_usuario</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="respuesta_usuario"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_respuesta_usuario AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"respuesta_usuario") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="respuesta_fecha"  class="control-label">respuesta_fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->respuesta_fecha; ?>" name="respuesta_fecha" id="respuesta_fecha" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">respuesta_encuesta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="respuesta_encuesta"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_respuesta_encuesta AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"respuesta_encuesta") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
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