<div class="container-fluid">
	<div class="text-right">
		<a class="btn btn-success" href="/administracion/preguntascategoria/manage">Crear Nuevo</a>
	</div>
	<form action="<?php echo $this->route; ?>" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-xs-6">
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo" value="<?php echo $this->getObjectVariable($this->filters, 'titulo') ?>"></input>
                </div>
                
                <div class="form-group col-xs-3">
                    <label> </label>
                    <button type="submit" class="btn btn-block btn-primary">Filtrar</button>
                </div>
                <div class="form-group col-xs-3">
                    <label> </label>
                    <a class="btn btn-block btn-info" href="<?php echo $this->route; ?>?cleanfilter=1" >Limpiar Filtro</a>
                </div>
            </div>
        </div>
    </form>
	<div>
		<table class=" table table-striped  table-hover table-administrator text-left">
			<thead>
				<tr>
					<td>Titulo</td>
					<td width="100">Orden</td>
					<td width="250"></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->lists as $content){ ?>
				<?php $id =  $content->categoria_id; ?>
					<tr>
						<td><?=$content->nombre;?></td>
						<td>
							<input type="hidden" id="<?= $id; ?>" value="<?= $ciudades->orden; ?>"></input>
							<button class="up_table btn btn-primary btn-xs"><i class="glyphicon glyphicon-chevron-up"></i></button>
							<button class="down_table btn btn-primary btn-xs"><i class="glyphicon glyphicon-chevron-down"></i></button>
						</td>
						<td class="text-right">
							<div>
								<a class="btn btn-primary btn-xs" href="<?php echo $this->route;?>/manage?id=<?= $id ?>"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
								<a class="btn btn-info btn-xs" href="/administracion/preguntas?content=<?= $id ?>"><i class="glyphicon glyphicon-pencil"></i> Preguntas</a>
								<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal<?= $id ?>" ><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
							</div>
							<!-- Modal -->
							<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  	<div class="modal-dialog" role="document">
							    	<div class="modal-content">
							      		<div class="modal-header">
							        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        		<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
							      	</div>
							      	<div class="modal-body">
							        	<div class="">¿Esta seguro de eliminar este registro?</div>
							      	</div>
								      <div class="modal-footer">
								        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								        	<a class="btn btn-danger" href="<?php echo $this->route;?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf;?>" >Eliminar</a>
								      </div>
							    	</div>
							  	</div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>">
	<input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order">
	<div align="center">
		<ul class="pagination">
	    <?php
	    	$url = $this->route;
	        if ($this->totalpages > 1) {
	            if ($this->page != 1)
	                echo '<li><a href="'.$url.'?page='.($this->page-1).'"> &laquo; Anterior </a></li>';
	            for ($i=1;$i<=$this->totalpages;$i++) {
	                if ($this->page == $i)
	                    echo '<li class="active"><a class="paginaactual">'.$this->page.'</a></li>';
	                else
	                    echo '<li><a href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
	            }
	            if ($this->page != $this->totalpages)
	                echo '<li><a href="'.$url.'?page='.($this->page+1).'">Siguiente &raquo;</a></li>';
	        }
	  ?>
	  </ul>
	</div>
</div>