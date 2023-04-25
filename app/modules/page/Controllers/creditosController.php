<?php 

/**
*
*/

class Page_creditosController extends Page_mainController
{

	public function indexAction()
	{
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$this->_view->creditos = $contenidoModel->getList("contenido_seccion = '8'", "orden ASC");
	}

}