<div class="container" style="margin-bottom: 53px;">
	<div class="row" align="center">
		<div class="col-6">
			<img src="/images/Imagen1.png" style="max-width:300px;">
		</div>
		<div class="col-6">
			<img src="/images/Imagen2.png" style="max-width:300px;">
		</div>
	</div>
</div>
<form method="post" action="/page/encuesta/guardar">
	<div class="container">
		<?php $i=0; ?>
		<div class="row">
			<?php foreach ($this->preguntas as $pregunta): ?>
				<?php $i++; ?>
				<?php if ($pregunta->pregunta_seccion!="" and $pregunta->pregunta_seccion!=$anterior): ?>
					<div class="seccion_encuesta"><?php echo $pregunta->pregunta_seccion; ?></div>
					<div class="separador_seccion col-md-12"></div>
				<?php endif ?>
				
				
					<div class="col-md-<?php echo $pregunta->pregunta_ancho; ?>">
						<div class="bloque_pregunta">	
							<?php
								$pregunta1 = $pregunta->pregunta_pregunta;
								$pregunta1 = str_replace("<p>","",$pregunta1);
								$pregunta1 = str_replace("</p>","",$pregunta1);
							?>
							<h4 class="titulo_pregunta"><?php echo $i; ?>. <?php echo $pregunta1; ?></h4>
							<h5 class="texto_pregunta"><?php echo $pregunta->pregunta_texto; ?></h5>
							<div class="separador_pregunta"></div>
							<?php
								$tipo = $pregunta->pregunta_tipo;
								$id = $pregunta->pregunta_id;
								$requerido="";
								if($pregunta->pregunta_obligatorio=="1"){
									$requerido="required";
								}
								if($tipo==1){ //texto
									echo '<input name="pregunta'.$id.'" class="form-control" type="text" value="" '.$requerido.' />';
								}
								if($tipo==2){ //numero
									echo '<input name="pregunta'.$id.'" class="form-control" type="number" min="0" value="" '.$requerido.' />';
								}
								if($tipo==3){ //fecha
									echo '<input name="pregunta'.$id.'" class="form-control" type="date" value="" '.$requerido.' />';
								}
								if($tipo==4){ //Area
									echo '<textarea name="pregunta'.$id.'" class="form-control" rows="4" '.$requerido.' ></textarea>';
								}
								if($tipo==5){ //menu
									?>
									<select name="pregunta<?php echo $id;?>" class="form-control" <?php echo $requerido; ?> >
										<option value=""></option>
										<?php foreach ($pregunta->opciones as $key => $value): ?>
											<option value="<?php echo $value->opcion_opcion; ?>"><?php echo $value->opcion_opcion; ?></option>
										<?php endforeach ?>
									</select>
									<?php
								}
								if($tipo==6){ //si no
									echo '<label class="col-md-3 offset-md-3 text-center">SI <input name="pregunta'.$id.'"  type="radio" value="SI" '.$requerido.' /></label>';
									echo '<label class="col-md-3 text-center">NO <input name="pregunta'.$id.'"  type="radio" value="NO" '.$requerido.' /></label>';
								}
								if($tipo==7){
									foreach ($pregunta->opciones as $key => $value){
										echo '<label class="text-center col-md-3">'.$value->opcion_opcion.' <input name="pregunta'.$id.'" type="radio" value="'.$value->opcion_opcion.'" '.$requerido.' /></label>';
									}
								}
								if($tipo==8){
									echo '<input id="pregunta'.$id.'" name="pregunta'.$id.'" type="hidden" value="" '.$requerido.' />';
									foreach ($pregunta->opciones as $key => $value){
										$i++;
									?>
										<label class="text-center col-md-3"><?php echo $value->opcion_opcion; ?> <input id="pregunta<?php echo $id; ?>_<?php echo $i; ?>"  type="radio" value="<?php echo $value->opcion_opcion ?>" <?php echo $requerido; ?> onclick="llenar('pregunta<?php echo $id; ?>');" /></label>
									<?php
									}
								}
							?>
							<br><br>
						</div>
					</div>
					<?php $anterior = $pregunta->pregunta_seccion; ?>
			<?php endforeach ?>
		</div>

			<input type="hidden" name="encuesta" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="usuario" value="<?php echo $this->usuario; ?>">
	</div>
	<div class="container-fluid no-padding">
		<div class="col-md-12 text-center div_enviar"><button type="submit" class="btn btn-primary">Enviar encuesta</button></div>
	</div>
	<br>
</form>

<script type="text/javascript">
    function llenar(id){
        var res = "";
        var i = 0;
        var ninguno = 0;
        var res_ninguno="";
        for(i=0;i<=50;i++){
            if(document.getElementById(id+'_'+i)){
                if(document.getElementById(id+'_'+i).checked===true){
                    res+= document.getElementById(id+'_'+i).value+", ";
                }
            }
        }
        res = res.substring(0, res.length - 2);
        if(ninguno==1){
            res=res_ninguno;
        }
        document.getElementById(id).value=res;
    }
</script>