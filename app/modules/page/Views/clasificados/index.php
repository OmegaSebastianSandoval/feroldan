<div class="titulo-internas" style="background-image:url(/skins/page/images/fondo2.png)">
    <div align="center"><h2>Clasificados</h2></div>
</div>
<div class="clasificados-interna">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <tr><h2>Categorias</h2></tr>
                        </tr>	
                    </thead>
                    <?php foreach ($this->categoria as $key => $categoria) {?>
                        <tbody>
                            <tr  <?php if($this->activo == $categoria->categorias_id){ ?>class="activo"<?php } ?>>
                                <th><a href="/page/clasificados?id=<?php echo $categoria->categorias_id; ?>"><?php echo $categoria->categorias_nombre ?></a></th>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <div class="boton-enviarclasificado"><a href="/page/clasificados/enviarclasificado">Envianos tu Clasificado <i class="far fa-address-card"></i></a></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
                <?php if (count($this->clasificados)==0) { ?>
                    <div align="center" class="alert alert-danger">No hay productos disponibles</div>
                <?php } ?>
				<div class="row">
					<?php foreach ($this->clasificados as $key => $producto) { ?>
						<div class="col-sm-12 col-ms-6 col-lg-4">
							<a href="/page/clasificados/detalle?id=<?php echo $producto->clasificados_id; ?>">
								<div class="imagen-producto"> <img src="/images/<?php echo $producto->clasificados_imagen ?>" alt=""> </div>
							</a>
							<div class="descripcion-producto">
								<div> <h4><?php echo $producto->clasificados_nombre ?></h4></div>
								<div class="introduccion"> <?php echo $producto->clasificados_introduccion ?> </div>
							</div>
						</div>
					<?php } ?>
				</div>
            </div>
        </div>
    </div>
</div>