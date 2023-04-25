<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->formato_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->formato_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-6 form-group">
					<label for="formato_nombre"  class="control-label">Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->formato_nombre; ?>" name="formato_nombre" id="formato_nombre" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="formato_archivo" >Archivo</label>
					<input type="file" name="formato_archivo" id="formato_archivo" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('formato_archivo');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" >
					<div class="help-block with-errors"></div>
					<?php if($this->content->formato_archivo) { ?>
						<div id="archivo_formato_archivo">
							<div><?php echo $this->content->formato_archivo; ?></div>
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminararchivo('formato_archivo','<?php echo $this->route."/deletearchivo"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Archivo</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">Seccion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="formato_seccion"  required >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_formato_seccion AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"formato_seccion") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
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