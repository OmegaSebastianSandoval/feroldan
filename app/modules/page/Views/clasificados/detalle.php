<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Clsificados</h2></div>
</div>
<div class="detalle-producto">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-7">
                <div class="caja-imagenes" >
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="imagenes-producto">
                                <?php if($this->producto->clasificados_imagen){ ?>
                                    <div class="imagen"  ><img src="/images/<?php echo $this->producto->clasificados_imagen ?>" alt=""></div>
                                <?php } ?>
                                <?php if($this->producto->clasificados_imagen1){ ?>
                                    <div class="imagen" ><img src="/images/<?php echo $this->producto->clasificados_imagen1 ?>" alt=""></div>
                                <?php } ?>
                                <?php if($this->producto->clasificados_imagen2){ ?>
                                    <div class="imagen" ><img src="/images/<?php echo $this->producto->clasificados_imagen2 ?>" alt=""></div>
                                <?php } ?>
                                <?php if($this->producto->clasificados_imagen3){ ?>
                                    <div class="imagen" ><img src="/images/<?php echo $this->producto->clasificados_imagen3 ?>" alt=""></div>
                                <?php } ?>
                                <?php if($this->producto->clasificados_imagen4){ ?>
                                    <div class="imagen" ><img src="/images/<?php echo $this->producto->clasificados_imagen4 ?>" alt=""></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="imagen-grande" >
                                <div id="imagen-full"><img src="/images/<?php echo $this->producto->clasificados_imagen ?>" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5">
                <div><h2><?php echo $this->producto->clasificados_nombre ?></h2></div>
                <div class="introduccion"> <?php echo $this->producto->clasificados_descripcion ?></div>
                <div><b>Publicado por:</b> <?php echo $this->producto->clasificados_nombreusuario ?></div>
                <div><b>Tel:</b> <?php echo $this->producto->clasificados_telefono ?></div>
                <div><b>Correo:</b> <?php echo $this->producto->clasificados_correo ?></div>
            </div>
        </div>
    </div>
</div>
<script>
$(".imagenes-producto .imagen").click(function(){
    var imagen = $(this).children("img").attr("src");
    $("#imagen-full").children("img").attr("src",imagen);
});
</script>