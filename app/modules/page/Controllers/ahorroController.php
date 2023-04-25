<?php 

/**
*
*/

class Page_ahorroController extends Page_mainController
{

	public function indexAction()
	{
        $contenidoModel = new Page_Model_DbTable_Contenido();
		$this->_view->ahorro = $this->template->getContentseccion(10);
	}

}