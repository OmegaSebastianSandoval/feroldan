 <h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->opcion_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->opcion_id; ?>" />
			<?php }?>
			<div class="row">
				<input type="hidden" name="opcion_pregunta"  value="<?php if($this->content->opcion_pregunta){ echo $this->content->opcion_pregunta; } else { echo $this->pregunta; } ?>">
				<div class="col-12 form-group">
					<label for="opcion_pregunta"  class="control-label">Pregunta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->opcion_opcion; ?>" name="opcion_opcion" id="opcion_opcion" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>?pregunta=<?php if($this->content->opcion_opcion){ echo $this->content->opcion_opcion; } else { echo $this->pregunta; } ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>