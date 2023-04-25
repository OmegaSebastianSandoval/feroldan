<div class="container">
		<table width="100%" border="1">
			<tr>
				<th>ID encuesta</th>
				<th>Encuesta</th>
				<th>ID Pregunta</th>
				<th>Pregunta</th>
				<th>Usuario</th>
				<th>Respuesta</th>
				<th>Fecha</th>
			</tr>
			<?php foreach ($this->respuestas as $key => $value): ?>
				<tr>
					<td><?php echo $value->pregunta_encuesta; ?></td>
					<td><?php echo $this->encuesta_nombre; ?></td>
					<td><?php echo $value->pregunta_id; ?></td>
					<td><?php echo $value->pregunta_pregunta; ?></td>
					<td><?php echo $value->respuesta_usuario; ?></td>
					<td><?php echo $value->respuesta_valor; ?></td>
					<td><?php echo $value->respuesta_fecha; ?></td>
				</tr>
			<?php endforeach ?>
		</table>
</div>