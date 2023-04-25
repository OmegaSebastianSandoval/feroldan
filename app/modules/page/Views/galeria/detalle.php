<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Fotos</h2></div>
</div>
<div class="fotos">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div align="center"><h2><?php echo $this->album->album_nombre ?></h2></div> 
                <div align="center"><?php echo $this->album->album_descripcion?></div> </br>
                <div id='carousel_container'>
                    <div class='left_scroll'><i class="fas fa-chevron-left"></i></div>
                    <div class="carousel_inner">
                        <ul>
                            <?php foreach ($this->fotos as $key => $foto) { ?>
                            <li> 
                                <div class="carrusel-detalle">
                                    <div class="imagen-foto" align="center"><img src="/images/<?php echo $foto->fotos_imagen ?>" alt=""></div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class='right_scroll'><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <tr><h3>Album</h3></tr>
                        </tr>	
                    </thead>
                    <?php foreach ($this->albumdetalle as $key => $album) {?>
                        <tbody>
                            <tr  <?php if($this->activo == $album->album_id){ ?>class="activo"<?php } ?>>
                                <th><a href="/page/galeria/detalle?id=<?php echo $album->album_id; ?>"><?php echo $album->album_nombre ?></a></th>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	 $(document).ready(function() {
	 	
	 	$("#carousel_container").carousel({
	 		pause : 5000,
	 		quantity : 1,
            auto: 'false',
             sizes : {
	 			'960' : 1,
                '768' : 1,
                '576' : 1, 
	 		}
	 	});
	 });
</script>