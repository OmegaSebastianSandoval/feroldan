<div class="container-fluid">
<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
	<input type="hidden" name="csrf" value="<?php echo $this->csrf ?>">
	<?php if ($this->content->categoria_id) { ?>
		<input type="hidden" name="categoria_id" value="<?= $this->content->categoria_id; ?>" />
	<?php }?>
	<div class="row">
		<div class="col-xs-12 form-group">
			<label for="title"  class="control-label">Título</label>
			<input type="text" value="<?= $this->content->nombre; ?>" name="title" id="title" class="form-control" placeholder="Título" required>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-6">
			<button class="btn btn-success btn-block" type="submit">Guardar</button>
		</div>
		<div class="col-xs-6">
			<a class="btn btn-primary btn-block" href="/administracion/preguntascategoria">Cancelar</a>
		</div>
	</div>
</form>
</div>
<!-- tiny -->
<script language="javascript" type="text/javascript">
tinyMCE.init({
  mode : "textareas",
  theme: "modern",
  language_url: "/omegaadministracion/tinymce/langs/es.js",
  language: "es",
  plugins:"link , responsivefilemanager, table ,  visualblocks, code,paste" ,
  external_filemanager_path:"/omegaadministracion/tinymce/plugins/filemanager/",
  filemanager_title:"Responsive Filemanager" ,
  external_plugins: {
        "filemanager": "/omegaadministracion/tinymce/plugins/filemanager/plugin.min.js",
        "responsivefilemanager": "/omegaadministracion/tinymce/plugins/responsivefilemanager/plugin.min.js"
  },
  theme_modern_toolbar_location : "bottom",
  paste_auto_cleanup_on_paste : true,
  toolbar: "bold,italic,underline,|,alignleft, aligncenter, alignright, alignjustify, |,bullist,numlist,|,link,unlink,|,table,|,responsivefilemanager,visualblocks,|,removeformat,code",
  menubar: false,
  resize: true,
  browser_spellcheck : true ,
  statusbar: true,
  relative_urls: false
});
$(":file").filestyle({buttonName: "btn-primary",buttonText:' Cargar Archivo'});
</script>
<!-- Fin tiny -->