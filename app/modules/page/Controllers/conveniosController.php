<?php 

/**
*
*/

class Page_conveniosController extends Page_mainController
{

	public function indexAction()
	{
		$conveniosModel = new Page_Model_DbTable_Convenios();
		$convenioscategoriaModel = new Page_Model_DbTable_Convenioscategoria();
        $categorias = $convenioscategoriaModel->getList("", "orden ASC");
		$array = array();
		foreach ($categorias as $key => $categoria) {
			$identificador = $categoria->convenios_categoria_id;
			$array[$key] = []; 
			$array[$key]['detalle'] = $categoria;
			$array[$key]['convenios'] = $conveniosModel->getList("convenios_categoria = '$identificador'", "orden ASC");
		}
		$this->_view->categorias = $array;
	}
}