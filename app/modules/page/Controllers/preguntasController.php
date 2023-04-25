<?php 

/**
*
*/

class Page_preguntasController extends Page_mainController
{

	public function indexAction()
	{
		$contentModel = new Page_Model_DbTable_Content();
		$preguntasModel = new Page_Model_DbTable_Preguntas();
		$categoriasModel = new Page_Model_DbTable_Categoriapreguntas();
		$id = $this->_getSanitizedParam("content");
		$this->_view->bannerprincipal = $contentModel->getList(" content_section = 'Banner Preguntas' AND content_state = 1","orden ASC");
		$this->_view->contenidos = $categoriasModel->getList("","orden ASC");
		$this->_view->preguntas= $preguntasModel->getList("categoria = '$id'","orden ASC");
	}

}