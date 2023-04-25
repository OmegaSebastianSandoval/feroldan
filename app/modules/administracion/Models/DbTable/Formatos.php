<?php 
/**
* clase que genera la insercion y edicion  de formatos en la base de datos
*/
class Administracion_Model_DbTable_Formatos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'formatos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'formato_id';

	/**
	 * insert recibe la informacion de un formatos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$formato_nombre = $data['formato_nombre'];
		$formato_archivo = $data['formato_archivo'];
		$formato_seccion = $data['formato_seccion'];
		$query = "INSERT INTO formatos( formato_nombre, formato_archivo, formato_seccion) VALUES ( '$formato_nombre', '$formato_archivo', '$formato_seccion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un formatos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$formato_nombre = $data['formato_nombre'];
		$formato_archivo = $data['formato_archivo'];
		$formato_seccion = $data['formato_seccion'];
		$query = "UPDATE formatos SET  formato_nombre = '$formato_nombre', formato_archivo = '$formato_archivo', formato_seccion = '$formato_seccion' WHERE formato_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}