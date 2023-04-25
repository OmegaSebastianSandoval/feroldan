<?php 
/**
* clase que genera la insercion y edicion  de Encuestas en la base de datos
*/
class Administracion_Model_DbTable_Encuesta extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'encuesta';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'encuesta_id';

	/**
	 * insert recibe la informacion de un Encuesta y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$encuesta_nombre = $data['encuesta_nombre'];
		$encuesta_fecha1 = $data['encuesta_fecha1'];
		$encuesta_fecha2 = $data['encuesta_fecha2'];
		$encuesta_banner = $data['encuesta_banner'];
		$query = "INSERT INTO encuesta( encuesta_nombre, encuesta_fecha1, encuesta_fecha2, encuesta_banner) VALUES ( '$encuesta_nombre', '$encuesta_fecha1', '$encuesta_fecha2', '$encuesta_banner')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Encuesta  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$encuesta_nombre = $data['encuesta_nombre'];
		$encuesta_fecha1 = $data['encuesta_fecha1'];
		$encuesta_fecha2 = $data['encuesta_fecha2'];
		$encuesta_banner = $data['encuesta_banner'];
		$query = "UPDATE encuesta SET  encuesta_nombre = '$encuesta_nombre', encuesta_fecha1 = '$encuesta_fecha1', encuesta_fecha2 = '$encuesta_fecha2', encuesta_banner = '$encuesta_banner' WHERE encuesta_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}