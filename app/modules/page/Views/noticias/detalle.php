<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div class="container">
        <div align="left">
            <h2 class=" ml-4">Noticias</h2>
        </div>

    </div>
</div>
<div class="detalle-noticias">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="descripcion-detalle">
                    <div class="imagen"> <img src="/images/<?php echo $this->detalle->contenido_imagen; ?>" alt=""> </div>

                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="titulo">
                    <h2><?php echo $this->detalle->contenido_titulo ?></h2>
                </div>
                <div class="fecha"><?php echo $this->detalle->contenido_fecha ?></div>

                <div><?php echo $this->detalle->contenido_descripcion ?></div>
                <div class="redes">
                    Compartir:
                    <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $detalle->contenido_id ?>"><i class="fab fa-whatsapp"></i></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $detalle->contenido_id ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/home?status=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $detalle->contenido_id ?>"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

        </div>



        <!--  <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="facebook-interna">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    console.log(fjs);
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="https://www.facebook.com/feroldan/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/OmegaSolucionesWeb/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OmegaSolucionesWeb/">Omega Web Systems</a></blockquote></div>
                </div>
            </div> -->
    </div>
</div>