<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->archivos_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->archivos_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="archivos_asociados" >Asociados</label>
					<input type="file" name="archivos_asociados" id="archivos_asociados" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('archivos_asociados');" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" if(!$this->content->archivos_id){ echo 'required'; }>
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