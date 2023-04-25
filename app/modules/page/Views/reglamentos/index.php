<!-- <div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Reglamentos</h2></div>
</div> -->
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div class="container">
        <div align="left">
            <h2 class="ml-4">Reglamentos</h2>
        </div>

    </div>
</div>
<div class="mt-4 mb-4">
<?php echo $this->reglamentosdocs; ?>
</div>

<!--

<div class="formatos">
    <div class="container">
        <ul class="titulo-formatos">
            <li><h4>Documentos</h4></li>
        </ul>
        <?php foreach ($this->reglamentos as $key => $formato) { ?>
            <ul>
                <li>
                    <a href="/files/<?php echo $formato->formato_archivo?>" target="blank">
                        <div class="row">
                            <div class="col-10 nombre" style="padding-top: 5px;"><span><?php echo $formato->formato_nombre;?></span></div>
                            <div class="col-2"><?php if ($formato->formato_archivo) { ?>
                                <i class="fas fa-file-download"></i><?php }?> 
                            </div> 
                        </div>
                    </a>
                </li>
            </ul>
        <?php } ?>
    </div>
</div>

-->