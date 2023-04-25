<?php 
/**
* clase que genera la insercion y edicion  de opciones en la base de datos
*/
class Administracion_Model_DbTable_Opciones extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'opciones';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'opcion_id';

	/**
	 * insert recibe la informacion de un opciones y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$opcion_opcion = $data['opcion_opcion'];
		$opcion_pregunta = $data['opcion_pregunta'];
		$query = "INSERT INTO opciones( opcion_opcion, opcion_pregunta) VALUES ( '$opcion_opcion', '$opcion_pregunta')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un opciones  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$opcion_opcion = $data['opcion_opcion'];
		$opcion_pregunta = $data['opcion_pregunta'];
		$query = "UPDATE opciones SET  opcion_opcion = '$opcion_opcion', opcion_pregunta = '$opcion_pregunta' WHERE opcion_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}