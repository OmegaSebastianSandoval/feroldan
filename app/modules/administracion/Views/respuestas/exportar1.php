<div class="container">
		<table width="100%" border="1">
			<tr>
				<th>Preguntas</th>
				<th>Opciones Respuestas</th>
				<th>Contador de respuestas</th>
			</tr>
			<?php foreach ($this->respuestas as $key => $value): ?>
				<tr>
					<td><?php echo $value->pregunta_pregunta; ?></td>
					<td><?php echo $value->respuesta_valor; ?></td>
					<td><?php echo $value->total; ?></td>
				</tr>
			<?php endforeach ?>
		</table>
</div>