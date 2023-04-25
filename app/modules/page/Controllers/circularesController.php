<?php 

/**
*
*/

class Page_circularesController extends Page_mainController
{

	public function indexAction()
	{
        $formatoModel = new Page_Model_DbTable_Formatos();
        $this->_view->circulares = $formatoModel->getList("formato_seccion = '3'", "orden ASC");
        $this->_view->circularesdocs = $this->template->getContentseccion(16);
	}

}