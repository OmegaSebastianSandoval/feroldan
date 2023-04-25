<?php 
/**
* clase que genera la insercion y edicion  de preguntas en la base de datos
*/
class Administracion_Model_DbTable_Preguntas extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'preguntas';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'pregunta_id';

	/**
	 * insert recibe la informacion de un pregunta y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$pregunta_encuesta = $data['pregunta_encuesta'];
		$pregunta_pregunta = $data['pregunta_pregunta'];
		$pregunta_texto = $data['pregunta_texto'];
		$pregunta_tipo = $data['pregunta_tipo'];
		$pregunta_obligatoria = $data['pregunta_obligatoria'];
		$pregunta_ancho = $data['pregunta_ancho'];
		$pregunta_seccion = $data['pregunta_seccion'];
		$query = "INSERT INTO preguntas( pregunta_encuesta, pregunta_pregunta, pregunta_texto, pregunta_tipo, pregunta_obligatoria, pregunta_ancho,pregunta_seccion) VALUES ( '$pregunta_encuesta', '$pregunta_pregunta', '$pregunta_texto', '$pregunta_tipo', '$pregunta_obligatoria', '$pregunta_ancho','$pregunta_seccion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un pregunta  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$pregunta_encuesta = $data['pregunta_encuesta'];
		$pregunta_pregunta = $data['pregunta_pregunta'];
		$pregunta_texto = $data['pregunta_texto'];
		$pregunta_tipo = $data['pregunta_tipo'];
		$pregunta_obligatoria = $data['pregunta_obligatoria'];
		$pregunta_ancho = $data['pregunta_ancho'];
		$pregunta_seccion = $data['pregunta_seccion'];
		$query = "UPDATE preguntas SET  pregunta_encuesta = '$pregunta_encuesta', pregunta_pregunta = '$pregunta_pregunta', pregunta_texto = '$pregunta_texto', pregunta_tipo = '$pregunta_tipo', pregunta_obligatoria = '$pregunta_obligatoria', pregunta_ancho = '$pregunta_ancho', pregunta_seccion='$pregunta_seccion' WHERE pregunta_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}