<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->encuesta_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->encuesta_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="encuesta_nombre"  class="control-label">nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->encuesta_nombre; ?>" name="encuesta_nombre" id="encuesta_nombre" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="encuesta_fecha"  value="<?php echo $this->content->encuesta_fecha ?>">
				<div class="col-6 form-group">
					<label for="encuesta_fecha1"  class="control-label">fecha inicio</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="date" value="<?= $this->content->encuesta_fecha1; ?>" name="encuesta_fecha1" id="encuesta_fecha1" class="form-control "   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="encuesta_fecha2"  class="control-label">fecha fin</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="date" value="<?= $this->content->encuesta_fecha2; ?>" name="encuesta_fecha2" id="encuesta_fecha2" class="form-control "   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="encuesta_banner" >Banner</label>
					<input type="file" name="encuesta_banner" id="encuesta_banner" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
					<div class="help-block with-errors"></div>
					<?php if($this->content->encuesta_banner) { ?>
						<div id="imagen_encuesta_banner">
							<img src="/images/<?= $this->content->encuesta_banner; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('encuesta_banner','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>

        <script type="text/javascript">
            $(function () {
                $('#encuesta_fecha1').datetimepicker();
            });
        </script>