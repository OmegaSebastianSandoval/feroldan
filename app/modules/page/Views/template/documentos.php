<div class="row <?php if($contenedor->contenido_columna_alineacion == 2){ ?>justify-content-center text-center<?php } else if($contenedor->contenido_columna_alineacion == 3){ ?> justify-content-end text-right<?php } else { ?> justify-content-start text-left<?php } ?> <?php if($contenedor->contenido_columna_espacios == 2 || $contenedor->contenido_columna_espacios == 4  ){ ?> no-gutters <?php } ?>">
    <div id="archor-<?php echo $contenedor->contenido_id; ?>"></div>
    <div class="docs-container docs-container-<?php echo $contenedor->contenido_id; ?> <?php echo $contenedor->contenido_columna; ?> my-4 <?php if ($contenedor->contenido_caja == 1) { echo 'caja-tipografica'; } ?>" style="<?php if($contenedor->contenido_top){ echo ' padding-top:'.$contenedor->contenido_top.'px; ';} ?><?php if($contenedor->contenido_bottom){ echo ' padding-bottom: '.$contenedor->contenido_bottom.'px; ';} ?><?php if($contenedor->contenido_left){ echo ' padding-left:'.$contenedor->contenido_left.'px; ';} ?><?php if($contenedor->contenido_right){ echo ' padding-right:'.$contenedor->contenido_right.'px; ';} ?>">
        <div class="row mx-0">
            <div class="col-12 docs-header" data-id="docs-<?php echo $contenedor->contenido_id; ?>" style="background: <?php echo $contenedor->contenido_fondo_color; ?>;">
            <div class="row w-100">
                <div class="col-10">
                    <h3><?php echo $contenedor->contenido_titulo; ?></h3>
                </div>
                <div class="col-2">
                    <div class="iconos">
                        <i class="fas fa-arrow-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-12">
            <div class="row items-docs-row">
                <?php foreach ($rescontenido['hijos'] as $hijos) { ?>
                <?php $docs = $hijos['detalle']; ?>
                    <?php if(!$docs->contenido_archivo){ ?>
                    <div class="col-12 mb-3">
                        <div class="row">
                        <div class="col-12 doc-item-theme" data-id="docs-<?php echo $docs->contenido_id; ?>" style="background: <?php echo $docs->contenido_fondo_color; ?>;">
                            <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-9 pl-4">
                                <h4><?php echo $docs->contenido_titulo; ?></h4>
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-center">
                                <img class="img-docs" src="/skins/page/images/down.png" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="col-12 cont-docs" style="padding-left: 35px; padding-right: 35px;" id="docs-<?php echo $docs->contenido_id; ?>">
                            <div class="row docs">
                            <?php foreach ($hijos['hijos'] as $ddoc2) { ?>
                            <?php $d = $ddoc2['nietos'] ?>
                                <?php if(!$d->contenido_archivo){ ?>
                                <div class="col-12 doc-item-theme my-2" data-id="docs-<?php echo $d->contenido_id; ?>" style="background: <?php echo $d->contenido_fondo_color; ?>;">
                                    <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-9 pl-4">
                                        <h4><?php echo $d->contenido_titulo; ?></h4>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end align-items-center">
                                        <img class="img-docs" src="/skins/page/images/down.png" alt="">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 cont-docs mb-2" style="padding-left: 35px; padding-right: 35px;" id="docs-<?php echo $d->contenido_id; ?>">
                                    <div class="row docs">
                                    <?php foreach ($ddoc2['detalle'] as $r2) { ?>
                                        <?php $r = $r2['subsubnietos'] ?>
                                        <?php if(!$r->contenido_archivo){ ?>
                                        <div class="col-12 doc-item-theme my-2" data-id="docs-<?php echo $r->contenido_id; ?>" style="background: <?php echo $r->contenido_fondo_color; ?>;">
                                            <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col-9 pl-4">
                                                <h4><?php echo $r->contenido_titulo; ?></h4>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end align-items-center">
                                                <img class="img-docs" src="/skins/page/images/down.png" alt="">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-12 cont-docs mb-2" style="padding-left: 35px; padding-right: 35px;" id="docs-<?php echo $r->contenido_id; ?>">
                                            <div class="row docs">
                                            <?php foreach ($ddoc2['subnietos'] as $r3) { ?>
                                                <?php foreach($r3['subsubnietos'] as $r1){ ?>
                                                <?php if (!$r1->contenido_icono) { ?>
                                                    <div class="col-12 doc">
                                                    <div class="row d-flex justify-content-start align-items-center">
                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                
                                                                <div class="col-10">
                                                                    <h5><?php echo $r1->contenido_titulo; ?></h5>
                                                                </div>
                                                                <?php if ($r1->contenido_archivo) { ?>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                    <a href="/files/<?php echo $r1->contenido_archivo ?>" target="_blank">
                                                                        <i class="far fa-file-pdf" aria-hidden="true"></i>
                                                                    </a>
                                                                    </div>
                                                                <?php } ?>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-12 doc" style="border-radius: 0 0 10px 10px;">
                                                    <div class="row d-flex justify-content-end align-items-center">
                                                        <?php if ($r1->contenido_archivo) { ?>
                                                        <div class="col-1 d-flex justify-content-end">
                                                            
                                                            <a href="/files/<?php echo $r1->contenido_archivo ?>" target="_blank"><img class="img-docs ml-auto" src="/images/<?php echo $r1->contenido_icono ?>" alt="" style="width: 70px;"></a>
                                                        </div>
                                                        <?php } ?>
                                                        <div class="col-11">
                                                        <h5 style="color: var(--cian); font-family: 'mont-semi-bold';"><?php echo $r1->contenido_titulo; ?></h5>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <?php if (!$r->contenido_icono) { ?>
                                            <div class="col-12 doc">
                                            <div class="row d-flex justify-content-start align-items-center">
                                                <div class="col-10">
                                                    
                                                <h5><?php echo $r->contenido_titulo; ?></h5>
                                                </div>
                                                <?php if ($r->contenido_archivo) { ?>
                                                <div class="col-2 d-flex justify-content-end">
                                                    <a href="/files/<?php echo $r->contenido_archivo ?>" target="_blank"><i class="far fa-file-pdf" aria-hidden="true"></i></a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-12 doc" style="border-radius: 0 0 10px 10px;">
                                            <div class="row d-flex justify-content-end align-items-center">
                                                <?php if ($r->contenido_archivo) { ?>
                                                <div class="col-1 d-flex justify-content-end">
                                                    <a href="/files/<?php echo $r->contenido_archivo ?>" target="_blank"><img class="img-docs ml-auto" src="/images/<?php echo $r->contenido_icono ?>" alt="" style="width: 70px;"></a>
                                                </div>
                                                <?php } ?>
                                                <div class="col-11">
                                                    
                                                <h5 style="color: var(--cian); font-family: 'mont-semi-bold';"><?php echo $r->contenido_titulo; ?></h5>
                                                </div>
                                            </div>
                                            </div>
                                        <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <?php if (!$d->contenido_icono) { ?>
                                    <div class="col-12 doc">
                                        <div class="row d-flex justify-content-start align-items-center">
                                            <a href="/files/<?php echo $d->contenido_archivo ?>" target="_blank" class="col-12">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <h5><?php echo $d->contenido_titulo; ?></h5>
                                                    </div>
                                                    <?php if ($d->contenido_archivo) { ?>
                                                        <div class="col-2 d-flex justify-content-end">
                                                            <i class="far fa-file-pdf" aria-hidden="true"></i>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-12 doc" style="border-radius: 0 0 10px 10px;">
                                    <div class="row d-flex justify-content-end align-items-center">
                                        <?php if ($d->contenido_archivo) { ?>
                                        <div class="col-1 d-flex justify-content-end">
                                            <a href="/files/<?php echo $d->contenido_archivo ?>" target="_blank"><img class="img-docs ml-auto" src="/images/<?php echo $d->contenido_icono ?>" alt="" style="width: 70px;"></a>
                                        </div>
                                        <?php } ?>
                                        <div class="col-11">
                                        <h5 style="color: var(--cian); font-family: 'mont-semi-bold';"><?php echo $d->contenido_titulo; ?></h5>
                                        </div>
                                    </div>
                                    </div>
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="col-12 mb-3">
                        <div class="row pl-3 d-flex justify-content-center align-items-center">
                        <div class="col-12 doc-item-file">
                            <div class="row d-flex justify-content-center align-items-center">
                            <a target="_blank" href="/files/<?php echo $docs->contenido_archivo; ?>" class="col-12">
                                <div class="row">
                                <div class="col-9 pl-4">
                                    <h4><?php echo $docs->contenido_titulo; ?></h4>
                                </div>
                                <div class="col-3 p-0 d-flex justify-content-end align-items-center">
                                    <i class="far fa-file-pdf mr-5" aria-hidden="true"></i>
                                </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
</div>