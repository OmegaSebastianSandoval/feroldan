<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->convenios_categoria_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->convenios_categoria_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="convenios_categoria_nombre"  class="control-label">Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->convenios_categoria_nombre; ?>" name="convenios_categoria_nombre" id="convenios_categoria_nombre" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="convenios_categoria_imagen" >Imagen</label>
					<input type="file" name="convenios_categoria_imagen" id="convenios_categoria_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
					<div class="help-block with-errors"></div>
					<?php if($this->content->convenios_categoria_imagen) { ?>
						<div id="imagen_convenios_categoria_imagen">
							<img src="/images/<?= $this->content->convenios_categoria_imagen; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('convenios_categoria_imagen','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-12 form-group">
					<label for="convenios_categoria_descripcion" class="form-label" >Descripcion</label>
					<textarea name="convenios_categoria_descripcion" id="convenios_categoria_descripcion"   class="form-control tinyeditor" rows="10"   ><?= $this->content->convenios_categoria_descripcion; ?></textarea>
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