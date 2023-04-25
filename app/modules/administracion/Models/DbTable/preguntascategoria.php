<?php 
/**
* 
*/
class Administracion_Model_DbTable_Preguntascategoria extends Db_Table
{
	protected $_name = 'categoriapreguntas';
	protected $_id = 'categoria_id';


	public function insert($data){
		
		$title = $data['title'];
		$query = "INSERT INTO categoriapreguntas(nombre) VALUES ('$title')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}
	public function update($data,$id){
		
		$title = $data['title'];
		$query = "UPDATE categoriapreguntas SET nombre ='$title' WHERE categoria_id = '".$id."'";
		$res = $this->_conn->query($query);  
	}
}