<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->pregunta_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->pregunta_id; ?>" />
			<?php }?>
			<div class="row">
				<input type="hidden" name="pregunta_encuesta"  value="<?php if($this->content->pregunta_encuesta){ echo $this->content->pregunta_encuesta; } else { echo $this->encuesta; } ?>">
				<div class="col-12 form-group">
					<label for="pregunta_pregunta" class="form-label" >pregunta</label>
					<textarea name="pregunta_pregunta" id="pregunta_pregunta"   class="form-control tinyeditor" rows="10"  required ><?= $this->content->pregunta_pregunta; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="pregunta_texto" class="form-label" >texto</label>
					<textarea name="pregunta_texto" id="pregunta_texto"   class="form-control tinyeditor" rows="10"   ><?= $this->content->pregunta_texto; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label class="control-label">tipo pregunta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="pregunta_tipo"  required >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_pregunta_tipo AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"pregunta_tipo") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
		<div class="col-6 form-group">
			<label   class="control-label">obligatoria?</label>
				<input type="checkbox" name="pregunta_obligatoria" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'pregunta_obligatoria') == 1) { echo "checked";} ?>   ></input>
				<div class="help-block with-errors"></div>
		</div>
				<div class="col-6 form-group">
					<label class="control-label">ancho</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="pregunta_ancho"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_pregunta_ancho AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"pregunta_ancho") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="pregunta_seccion" class="form-label" >sección</label>
					<input name="pregunta_seccion" id="pregunta_seccion" class="form-control"  value="<?= $this->content->pregunta_seccion; ?>"  />
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>?encuesta=<?php if($this->content->pregunta_encuesta){ echo $this->content->pregunta_encuesta; } else { echo $this->encuesta; } ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>