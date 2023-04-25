<?php
if($_GET['prueba']==1){ print_r($_SESSION); }
$infodatos = $_SESSION['infodatos'];
?>
<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Enviar Clasificados</h2></div>
</div>
<div class="formularioclasificado">
    <div class="container">
        <div class="filtro text-left d-none">
            <form action="/page/clasificados/enviarclasificado" method="GET">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text"  name="id" class="form-control" id="inputEmail4" placeholder="Número de Cédula del Asociado" required>
                    </div>
                    <div class="col-sm-6"><button type="submit" class="btn btn-primary"> <i class="fas fa-search-plus"></i>Buscar</button></div>
                </div>
            </form>
        </div> </br>
        <?php if ($this->buscar or 1==1) { ?>
            <form class="text-left" enctype="multipart/form-data" method="post" action="/page/clasificados/insert" data-toggle="validator">
                <div class="content-dashboard">
                    <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
                    <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
                    <?php if ($this->content->clasificados_id) { ?>
                        <input type="hidden" name="id" id="id" value="<?= $this->content->clasificados_id; ?>" />
                    <?php }?>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="clasificados_documento"  class="control-label">Documento</label>
                            <label class="input-group">
                                <input type="text"  value="<?php echo $infodatos->NIT; ?>" name="clasificados_documento" id="clasificados_documento" class="form-control"  readonly >
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_nombreusuario"  class="control-label">Nombre </label>
                            <label class="input-group">
                                <input type="text" value="<?php echo $infodatos->NOMBRES." ".$infodatos->APELLIDOS; ?>" name="clasificados_nombreusuario" id="clasificados_nombreusuario" class="form-control"  readonly >
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-6 form-group">
                            <label for="clasificados_correo"  class="control-label">Correo</label>
                            <label class="input-group">
                                <input type="text" value="<?php echo $infodatos->email2; ?>" name="clasificados_correo" id="clasificados_correo" class="form-control"  required >
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_telefono"  class="control-label">Teléfono</label>
                            <label class="input-group">
                                <input type="text" value="<?php echo $infodatos->TEL1; ?>" name="clasificados_telefono" id="clasificados_telefono" class="form-control"   >
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="clasificados_nombre"  class="control-label">Título de Clasificado</label>
                            <label class="input-group">
                                <input type="text" value="<?= $this->content->clasificados_nombre; ?>" name="clasificados_nombre" id="clasificados_nombre" class="form-control"  required >
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="clasificados_descripcion" class="form-label" >Descripción</label>
                            <textarea style="resize:none;" name="clasificados_descripcion" id="clasificados_descripcion"   class="form-control tinyeditor" rows="10"   ><?= $this->content->clasificados_descripcion; ?></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="clasificados_imagen" >Imagen</label>
                            <input type="file" name="clasificados_imagen" id="clasificados_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
                            <div class="help-block with-errors"></div>
                            <?php if($this->content->clasificados_imagen) { ?>
                                <div id="imagen_clasificados_imagen">
                                    <img src="/images/<?= $this->content->clasificados_imagen; ?>"  class="img-thumbnail thumbnail-administrator" />
                                    <div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('clasificados_imagen','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_imagen1" >Imagen 1</label>
                            <input type="file" name="clasificados_imagen1" id="clasificados_imagen1" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
                            <div class="help-block with-errors"></div>
                            <?php if($this->content->clasificados_imagen1) { ?>
                                <div id="imagen_clasificados_imagen1">
                                    <img src="/images/<?= $this->content->clasificados_imagen1; ?>"  class="img-thumbnail thumbnail-administrator" />
                                    <div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('clasificados_imagen1','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_imagen2" >Imagen 2</label>
                            <input type="file" name="clasificados_imagen2" id="clasificados_imagen2" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
                            <div class="help-block with-errors"></div>
                            <?php if($this->content->clasificados_imagen2) { ?>
                                <div id="imagen_clasificados_imagen2">
                                    <img src="/images/<?= $this->content->clasificados_imagen2; ?>"  class="img-thumbnail thumbnail-administrator" />
                                    <div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('clasificados_imagen2','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_imagen3" >Imagen 3</label>
                            <input type="file" name="clasificados_imagen3" id="clasificados_imagen3" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
                            <div class="help-block with-errors"></div>
                            <?php if($this->content->clasificados_imagen3) { ?>
                                <div id="imagen_clasificados_imagen3">
                                    <img src="/images/<?= $this->content->clasificados_imagen3; ?>"  class="img-thumbnail thumbnail-administrator" />
                                    <div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('clasificados_imagen3','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6 form-group">
                            <label for="clasificados_imagen4" >Imagen 4</label>
                            <input type="file" name="clasificados_imagen4" id="clasificados_imagen4" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
                            <div class="help-block with-errors"></div>
                            <?php if($this->content->clasificados_imagen4) { ?>
                                <div id="imagen_clasificados_imagen4">
                                    <img src="/images/<?= $this->content->clasificados_imagen4; ?>"  class="img-thumbnail thumbnail-administrator" />
                                    <div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('clasificados_imagen4','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="botones-acciones">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
        <?php } else if($this->cedula) {?>
            <div align="center" class="alert alert-danger">Ustes no se encuentra asociado a Feroldan</div>
        <?php } ?>
    </div>
</div>