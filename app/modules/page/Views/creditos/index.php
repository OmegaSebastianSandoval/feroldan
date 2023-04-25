
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div class="container">
        <div align="left">
            <h2 class=" ml-4">Créditos</h2>
        </div>

    </div>
</div>
<div class="creditos">
    <div class="container">
        <div class="row">
            <?php foreach ($this->creditos as $key => $credito) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
                    <div><img src="/images/<?php echo $credito->contenido_imagen ?>" alt="Imagen <?php echo $credito->contenido_titulo ?>"></div>
                    <div align="center">
                        <h2><?php echo $credito->contenido_titulo ?></h2>
                    </div>
                    <div align="center" class="vermas-credito" data-id="<?php echo $credito->contenido_id ?>">Ver Más  <i class="fas fa-plus ml-1"></i></div>
                    <div class="descripcion-credito" id="informacion<?php echo $credito->contenido_id ?>">
                        <div><?php echo $credito->contenido_descripcion ?></div>
                        <?php if ($credito->contenido_archivo) { ?>
                            <div class="archivo" align="center"><a href="/files/<?php echo $credito->contenido_archivo ?>" target="blank">Descargar Archivo</a></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    $(".vermas-credito").on("click", function() {

        var descripcion = "#informacion" + $(this).attr("data-id");
        if ($(descripcion).is(":visible")) {
            $(descripcion).hide(300);
            $(this).children("i").removeClass("fas fa-minus");
            $(this).children("i").addClass("fas fa-plus");
        } else {
            $(descripcion).show(300);
            $(this).children("i").removeClass("fas fa-plus");
            $(this).children("i").addClass("fas fa-minus");
        }
    });
</script>