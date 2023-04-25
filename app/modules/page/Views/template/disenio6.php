<!-- <div class="clasificados">
    <div class="imagen" align="center"><img src="/images/<?php echo $contenido->contenido_imagen ?>" alt=""></div>
    <div><?php echo $contenido->contenido_descripcion ?></div>
    <?php if ($contenido->contenido_enlace) { ?>
        <div align="center"><a href="<?php echo $contenido->contenido_enlace ?>" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="blank" <?php } ?> class="btn btn-primary"><i class="fas fa-plus"></i> Ver más</a></div>
    <?php } ?>
</div> -->
<div class="clasificados">
    <!-- <div class="imagen" align="center"><img src="/images/<?php echo $contenido->contenido_imagen ?>" alt=""></div> -->
    <p><?php echo $contenido->contenido_titulo ?></p>
    <hr>
    <?php if ($contenido->contenido_enlace) { ?>
        <div class="contenedor-btn"><a href="<?php echo $contenido->contenido_enlace ?>" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="blank" <?php } ?> class="btn btn-primary">Ver más</a></div>
    <?php } ?>
</div>