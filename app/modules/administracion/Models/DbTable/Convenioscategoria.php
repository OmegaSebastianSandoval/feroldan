<?php 
/**
* clase que genera la insercion y edicion  de convenioscategoria en la base de datos
*/
class Administracion_Model_DbTable_Convenioscategoria extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'convenios_categoria';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'convenios_categoria_id';

	/**
	 * insert recibe la informacion de un convenioscategoria y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$convenios_categoria_nombre = $data['convenios_categoria_nombre'];
		$convenios_categoria_imagen = $data['convenios_categoria_imagen'];
		$convenios_categoria_descripcion = $data['convenios_categoria_descripcion'];
		$query = "INSERT INTO convenios_categoria( convenios_categoria_nombre, convenios_categoria_imagen, convenios_categoria_descripcion) VALUES ( '$convenios_categoria_nombre', '$convenios_categoria_imagen', '$convenios_categoria_descripcion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un convenioscategoria  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$convenios_categoria_nombre = $data['convenios_categoria_nombre'];
		$convenios_categoria_imagen = $data['convenios_categoria_imagen'];
		$convenios_categoria_descripcion = $data['convenios_categoria_descripcion'];
		$query = "UPDATE convenios_categoria SET  convenios_categoria_nombre = '$convenios_categoria_nombre', convenios_categoria_imagen = '$convenios_categoria_imagen', convenios_categoria_descripcion = '$convenios_categoria_descripcion' WHERE convenios_categoria_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}