<!-- <div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Noticias</h2></div>
</div> -->
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div class="container">
        <div align="left">
            <h2 class=" ml-4">Noticias</h2>
        </div>

    </div>
</div>
<div class="noticias">
    <div class="container">
        <div class="row">
            <?php foreach ($this->noticias as $key => $noticia) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="padding-noticias">
                        <a href="/page/noticias/detalle?id=<?php echo $noticia->contenido_id; ?>">
                            <div class="tamaño" align="center">
                                <img src="/images/<?php echo $noticia->contenido_imagen ?>" alt="">
                            </div>
                        </a>
                        <div class="noticia">
                            <div class="titulo"><h4><?php echo $noticia->contenido_titulo ?></h4></div>
                            <div class="introduccion"><?php echo $noticia->contenido_introduccion ?></div>
                            <div class="fondo-gris">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="fecha"><?php echo $noticia->contenido_fecha ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="compartir" align="right">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>"  target="blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>"  target="blank"><i class="fab fa-whatsapp"></i></a>
                                            <a href="https://twitter.com/home?status=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>"  target="blank"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>