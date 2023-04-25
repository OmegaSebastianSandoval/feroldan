<?php echo $this->bannerprincipal; ?>
<!-- <div class="container" style="">
    <img src="/images/banner-principal.png" alt="">
</div> -->
<?php echo $this->contenidohome; ?>
<div class="logros">
    <div class="container">
        <h2 align="center">Somos la solución porque…</h2>
        <div class="row justify-content-center">
            <?php foreach ($this->logros as $key => $logro) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 contenedor-logro">
                    <div align="center"><img class="mt-1" src="/images/<?php echo $logro->logros_imagen ?>" alt=""></div>
                    <div id="uno<?php echo $logro->logros_id ?>" class="counter">0</div>
                    <!-- <div align="center" style="font-size: 11px;margin-top:-10px; color:#ffffff">Fecha de corte:</div> -->
                    <!-- <div style="font-size: 11px;">
                        <h3 style="font-size: 11px; margin-bottom:-10px;"><?php echo $logro->logros_fecha ?></h3>
                    </div> -->
                    <div style="height: 70px;">
                        <h3><?php echo $logro->logros_nombre ?></h3>

                    </div>


                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    (function($) {
        $.fn.animateNumbers = function(stop, commas, duration, ease) {
            return this.each(function() {
                var $this = $(this);
                var start = parseInt($this.text().replace(/,/g, ""));
                commas = (commas === undefined) ? true : commas;
                $({
                    value: start
                }).animate({
                    value: stop
                }, {
                    duration: duration == undefined ? 5000 : duration,
                    easing: ease == undefined ? "swing" : ease,
                    step: function() {
                        $this.text(Math.floor(this.value));
                        if (commas) {
                            $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        }
                    },
                    complete: function() {
                        if (parseInt($this.text()) !== stop) {
                            $this.text(stop);
                            if (commas) {
                                $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                            }
                        }
                    }
                });
            });
        };
    })(jQuery);

    $(document).ready(function() {
        $(window).scroll(function() {
            var scrol = $(window).scrollTop();
            if (scrol > 900) {
                <?php foreach ($this->logros as $key => $logro) { ?>
                    $('#uno<?php echo $logro->logros_id ?>').animateNumbers('<?php echo $logro->logros_final; ?>');
                <?php } ?>
            }
        });
    });
</script>
<?php echo $this->conveniostitulo; ?>
<div class="convenios">
    <div class="container">
        <div id='carousel_container'>
            <div class="carousel_inner">
                <ul>
                    <?php foreach ($this->convenios as $key => $contenido) { ?>
                        <li>
                            <div><img src="/images/<?php echo  $contenido->convenios_imagen;  ?>" alt=""></div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#carousel_container").carousel({
            pause: 5000,
            quantity: 4,
            auto: 'true',
            sizes: {
                '960': 2,
                '768': 1,
                '576': 1,
            }
        });
    });
</script>


<div class="noticias">
    <div class="container">
        <div align="center">
            <h2>Noticias</h2>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row  justify-content-center">
                    <?php foreach ($this->noticias as $key => $noticia) { ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="padding-noticias">
                                <a href="/page/noticias/detalle?id=<?php echo $noticia->contenido_id; ?>">
                                    <div class="tamaño1" align="center">
                                        <img class="img-noticias" src="/images/<?php echo $noticia->contenido_imagen ?>" alt="">
                                    </div>
                                </a>
                                <div class="noticia">
                                    <a href="/page/noticias/detalle?id=<?php echo $noticia->contenido_id; ?>">
                                        <div class="titulo">
                                            <h4><?php echo $noticia->contenido_titulo ?></h4>
                                        </div>
                                    </a>
                                    <div class="introduccion"><?php echo $noticia->contenido_introduccion ?></div>
                                    <div class="mt-2 text-center"><a href="/page/noticias/detalle?id=<?php echo $noticia->contenido_id; ?>" class="btn-noticias-vermas">Ver más</a></div>
                                    <!--                                     <div class="fondo-gris">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="fecha"><?php echo $noticia->contenido_fecha ?></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="compartir" align="right">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>" target="blank"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>" target="blank"><i class="fab fa-whatsapp"></i></a>
                                                    <a href="https://twitter.com/home?status=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php echo $noticia->contenido_id ?>" target="blank"><i class="fab fa-twitter"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="boton-noticias">
                    <div align="center"><a href="/page/noticias" class="btn btn-primary"><i class="fas fa-plus"></i> VER MÁS NOTICIAS</a></div>
                </div>
            </div>


        </div>
    </div>
</div>



<div class="empresas">
    <div class="container">
        <div>
            <h2>Entidades Relacionadas</h2>
        </div>
        <div id='carousel_container1'>
            <div class="carousel_inner">
                <ul>
                    <?php foreach ($this->empresas as $key => $contenido) { ?>
                        <li>
                            <div><img src="/images/<?php echo  $contenido->contenido_imagen;  ?>" alt=""></div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">



    $(document).ready(function() {
        $("#carousel_container1").carousel({
            pause: 5000,
            quantity: 4,
            auto: 'true',
            sizes: {
                '960': 2,
                '768': 1,
                '576': 1,
            }
        });
    });
</script>
<div class="container  justify-content-center pt-4 ">
    <?php echo $this->solucion; ?>

</div>


<?php if ($this->modal->publicidad_imagen != "") { ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-0 modal-lg" role="document">
            <div class="modal-contenido modal-content">
                <div class="modal-cabecera modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <?php foreach ($this->pop_up as $key => $pop_up) { ?>
                        <?php if ($pop_up->publicidad_estado == 1) { ?>
                            <a href="<?php echo $pop_up->publicidad_enlace ?>" <?php if ($pop_up->publicidad_tipo_enlace == 1) { ?> target="_blank" <?php } ?> data-toggle="tooltip" data-placement="left" title="<?php echo $pop_up->publicidad_nombre ?>"><img src="/images/<?php echo $pop_up->publicidad_imagen ?>" alt="" style="width: 100%"></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- <script>
    $(document).ready(function() {
        $('#myModal').modal('show')
    });
</script> -->