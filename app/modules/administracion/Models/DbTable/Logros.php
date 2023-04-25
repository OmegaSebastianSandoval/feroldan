<?php 
/**
* clase que genera la insercion y edicion  de logros en la base de datos
*/
class Administracion_Model_DbTable_Logros extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'logros';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'logros_id';

	/**
	 * insert recibe la informacion de un logros y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$logros_nombre = $data['logros_nombre'];
		$logros_imagen = $data['logros_imagen'];
		$logros_descripcion = $data['logros_descripcion'];
		$logros_final = $data['logros_final'];
		$logros_fecha = $data['logros_fecha'];
		$query = "INSERT INTO logros( logros_nombre, logros_imagen, logros_descripcion, logros_final, logros_fecha) VALUES ( '$logros_nombre', '$logros_imagen', '$logros_descripcion', '$logros_final', '$logros_fecha')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un logros  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$logros_nombre = $data['logros_nombre'];
		$logros_imagen = $data['logros_imagen'];
		$logros_descripcion = $data['logros_descripcion'];
		$logros_final = $data['logros_final'];
		$logros_fecha = $data['logros_fecha'];
		$query = "UPDATE logros SET  logros_nombre = '$logros_nombre', logros_imagen = '$logros_imagen', logros_descripcion = '$logros_descripcion', logros_final = '$logros_final', logros_fecha = '$logros_fecha' WHERE logros_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}