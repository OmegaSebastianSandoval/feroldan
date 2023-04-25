<!-- <div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Convenios</h2></div>
</div> -->
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
  <div class="container">
    <div align="left">
      <h2 class="mb-4">Convenios</h2>
    </div>

  </div>
</div>
<div class="convenios">
  <div class="container">
    <div class="row">
      <?php foreach ($this->categorias as $key => $convenios) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4 convenio-interna">
          <div class="seccion-convenios">
            <div><img src="/images/<?php echo $convenios["detalle"]->convenios_categoria_imagen; ?>" alt=""></div>
            <h2><a><?php echo $convenios["detalle"]->convenios_categoria_nombre; ?></a></h2>
            <?php foreach ($convenios["convenios"] as $key2 => $convenio) { ?>
              <a data-toggle="modal" data-target="#convenio<?php echo $convenio->convenios_id ?>">
                <div class="lista"><?php echo $convenio->convenios_nombre ?></div>
              </a>
              <div class="modal fade" id="convenio<?php echo $convenio->convenios_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header modal-header-convenios">
                      <h5 class="modal-title modal-titulo-convenio" id="exampleModalLabel"><?php echo $convenio->convenios_nombre; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-sm-12">
                        <div class="imagen-modal"><img src="/images/<?php echo $convenio->convenios_imagen; ?>" alt=""></div>
                      </div>
                      <div class="col-sm-12"><?php echo $convenio->convenios_descripcion ?></div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>