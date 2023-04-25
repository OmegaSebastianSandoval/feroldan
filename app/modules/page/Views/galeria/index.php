<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Galería</h2></div>
</div>
<div class="galeria-album">
    <div class="eventos">
        <div class="container">
            <div class="row">
                <?php foreach ($this->album as $key => $album) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="album-index">
                            <a href="/page/galeria/detalle?id=<?php echo $album->album_id; ?>">   
                                <div class="imagen-album" align="center"><img src="/images/<?php echo $album->album_imagen ?>" alt=""></div>
                                <div align="center" class="titulo"><h3><?php echo $album->album_nombre ?></h3></div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>