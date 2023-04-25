<?php 

/**
*
*/

class Page_bienestarsocialController extends Page_mainController
{

	public function indexAction()
	{
        $contenidoModel = new Page_Model_DbTable_Contenido();
		$this->_view->bienestar = $this->template->getContentseccion(11);
	}

}