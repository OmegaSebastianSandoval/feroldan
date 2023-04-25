<?php $this->res; ?>
<!-- <div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Contáctenos</h2></div>
</div> -->
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div class="container">
        <div align="left">
            <h2 class="">Contáctenos</h2>
        </div>

    </div>
</div>
<div class="contacto">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="pqrs">
                    <?php foreach ($this->pqrs as $key => $pqrs) { ?>
                        <div align="center" class="titulo-pqrsf">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2><?php echo $pqrs->contenido_titulo ?></h2>

                                <?php echo $pqrs->contenido_descripcion ?>
                            </div>
                            <div class="col-12">
                                <h3><span>Junta Directiva</span></h3>
                                <img src="/images/<?php echo $pqrs->contenido_imagen ?>" alt="">
                            </div>


                        </div>

                    <?php } ?>
                </div>
            </div>
            <?php  ?>
            <div class="col-sm-12  col-lg-6">
                <?php if ($this->res == 1) { ?>
                    <div align="center" class="alert alert-success"> El mensaje se envió satisfactoriamente, muy pronto nos pondremos en contacto contigo.</div>
                <?php } else if ($this->res == 2) { ?>
                    <div align="center" class="alert alert-danger">EL mensaje no se pudo enviar, intente de nuevo</div>
                <?php } ?>
                <div class="row">
                    <div class="col-12">
                        <div class="informacion-contacto-responsive">
                            <div class="informacion-contacto">
                                <h3>INFORMACIÓN DE CONTACTO</h3><?php echo $this->infopage->info_pagina_informacion_contacto_footer ?>
                            </div>
                            <div class="redes-contactenos"><span>Síguenos En:</span>
                                <?php if ($this->infopage->info_pagina_facebook) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_twitter) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_instagram) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_pinterest) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_youtube) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_linkdn) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_google) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_flickr) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
                                        <i class="fab fa-flickr"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="informacion-contacto-noresponsive text-right">
                            <div class="informacion-contacto text-right">
                                <h3>INFORMACIÓN DE CONTACTO</h3><?php echo $this->infopage->info_pagina_informacion_contacto_footer ?>
                            </div>
                            <div class="redes-contactenos"><span>Síguenos En:</span>
                                <?php if ($this->infopage->info_pagina_facebook) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_twitter) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_instagram) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_pinterest) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_youtube) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_linkdn) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_google) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_flickr) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
                                        <i class="fab fa-flickr"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <form method="POST" action="/page/contactenos/enviar" onsubmit="return miFuncion(this)">


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombre:" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="E-mail:" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <input type="number" max="9999999999" min="1000000000" name="telefono" class="form-control" id="inputEmail4" placeholder="Teléfono:" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <input type="text" name="ciudad" class="form-control" id="inputEmail4" placeholder="Ciudad:" required>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <textarea style="resize:none;" class="form-control" name="mensaje" id="" rows="4" placeholder="Mensaje:" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check" required>
                                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                    <label class="form-check-label" for="gridCheck">
                                        Política de <a href="#" data-toggle="modal" data-target="#modalPolíticas"> manejo de datos.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LfeqpAUAAAAANvnKLrd1MIOGb6585JWIfA4oJJ-"></div>
                            <div class="boton-contactenos  text-center"><button type="submit" class="btn btn-primary">Enviar</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalPolíticas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?php echo ($this->politica->contenido_titulo); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo ($this->politica->contenido_descripcion); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- <?php /* echo $this->content */; ?> -->



<script>
    function miFuncion(a) {
        var response = grecaptcha.getResponse();

        if (response.length == 0) {
            alert("Captcha no verificado");
            return false;
            event.preventDefault();
        } else {
            return true;
        }
    }
</script>
<!-- <div class="mapa">
    <script type="text/javascript">
        setValuesMap('<?php echo $this->infopage->info_pagina_latitud ?>', '<?php echo $this->infopage->info_pagina_longitud ?>', true, 18);
        google.maps.event.addDomListener(window, 'load', initializeMap);
    </script>
    <div id="map" style="width:100%; height:100%;display: inline-block;"></div>
</div> -->